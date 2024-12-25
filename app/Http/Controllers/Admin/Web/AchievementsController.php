<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Achievements;
use App\Models\Language;
use Toastr;
use Auth;
class AchievementsController extends Controller
{
    use FileUploader;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title    = trans_choice('Achievements', 1);
        $this->route    = 'admin.achievements';
        $this->view     = 'admin.web.achievements';
        $this->path     = 'achievements';
        $this->access   = 'achievements';
        $this->middleware('permission:'.$this->access.'-view');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
        {
            $data['title']  = $this->title;
            $data['route']  = $this->route;
            $data['view']   = $this->view;
            $data['path']   = $this->path;
            $data['access'] = $this->access;
            $data['baseurl'] = config('app.url');

            $data['achievements'] = Achievements::all(); // Example: Fetch all achievements.

            return view($this->view.'.index', $data);
        }


    public function show($slug)
    {
        $result = explode('_', $slug);
        $departmentId = $result[0];
        $section= $result[1];

        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;
        $data['baseurl'] = config('app.url');
        $data['departmentId'] = $departmentId;
        $data['section'] = $section;

        $query = Achievements::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();

        // echo '<pre>';print_r($data['row']);exit;
        return view($this->view.'.index', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $departmentId = null)
    {
 
        // Check if the row exists with the given departmentId
        $Achievements = Achievements::where('departmentId', $request->departmentId)->first();

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

        if ($Achievements) {
            $message = 'Record updated successfully';
        } else {
            $Achievements = new Achievements;
            $Achievements->departmentId = $request->departmentId;
            $Achievements->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            //echo "Two "; exit;
            // Handle the image upload if the file exists
            if ($request->hasFile('imageFile')) {            
                $Achievements->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }

            $Achievements->title = $request->title;
            $Achievements->description = $request->description;            
        }else if($request->section === 'staff-achivements'){
            $Achievements->staffAchievements = json_encode($request->staffAchievements, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'student-achivements'){
            // Get the submitted data
            $studentAchievements = $request->input('studentAchievements');

            // Check if studentAchievements exists and is an array
            if (is_array($studentAchievements)) {
                foreach ($studentAchievements as $yearIndex => $yearData) {
                    // Check if 'achievements' key exists and is an array
                    if (isset($yearData['achievements']) && is_array($yearData['achievements'])) {
                        foreach ($yearData['achievements'] as $achievementIndex => $achievement) {
                            
                            // Construct the dynamic file input name
                            $fileInputName = "studentAchievements.{$yearIndex}.achievements.{$achievementIndex}.image";

                            // Check if the file exists in the request
                            if ($request->hasFile($fileInputName)) {
                                // Call the uploadImage function and get the new file name
                                $uploadedFileName = $this->uploadImage($request, $fileInputName, $this->path, null, 800);

                                // Map the uploaded file name to the 'image' key
                                $studentAchievements[$yearIndex]['achievements'][$achievementIndex]['image'] = $uploadedFileName;
                            }
                        }
                    }
                }
            }
            $Achievements->studentAchievements = json_encode($studentAchievements, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'student-achivements-table'){
            $Achievements->studentAchievementsTableFormat = json_encode($request->studentAchievementsTableFormat, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'student-achivements-appreciation'){
            $Achievements->studentAchievementsAppeciationList = json_encode($request->studentAchievementsAppreciation, JSON_UNESCAPED_UNICODE);
        }

        $Achievements->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}