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


    public function show($departmentId,$section="")
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;
        $data['baseurl'] = config('app.url');
        //$query = Achievements::where('language_id', Language::version()->id);
        $query = Achievements::query();
        $query->where('departmentId', $departmentId);
        // if(Auth::user()->department_id == 0){
        //     $query->where('department_id', 0);
        //     $query->where('departmentId', 1);
        // } else {
        //     $query->where('departmentId', 1);
        //    $query->where('department_id', Auth::user()->department_id);
        // }
        $row =  $query->first();


        $data['row'] = $query->first();
        $data['departmentId'] = $departmentId;
        $data['section'] = $section;
        // dd(Auth::user()->department_id);
       // echo '<pre>';print_r($row);exit;
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
        echo '<pre>';print_r($request->all()); exit;

        /*

        // Field Validation
        $request->validate([
            'sectionAbout.image_file' => 'nullable|image',
            'sectionAbout.title' => 'required',
            'sectionAbout.description' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'coreValue' => 'required',
            'programmeEducationalObjectives' => 'required|array',
            'programmeOutcomes' => 'required|array',
            'programmeSpecificOutcomes' => 'required|array',
            'contact.name' => 'required',
            'contact.email' => 'required|email',
            'contact.phone' => 'required',
        ]);

        // Check if the row exists with the given departmentId
        $Achievements = Achievements::where('departmentId', $request->departmentId)->first();


        if ($Achievements) {
            $message = 'Record updated successfully';
        } else {
            $Achievements = new Achievements;
            $Achievements->departmentId = $departmentId;
            $Achievements->designationId = 1;
            $Achievements->slider = '';
            $Achievements->testimonial = '';
            $message = 'Record created successfully';
        }


        // Initialize sectionAbout as an array
        $sectionAbout = $Achievements->sectionAbout ? json_decode($Achievements->sectionAbout, true) : [];

        // Handle the image upload if the file exists
        if ($request->hasFile('sectionAbout.image_file')) {
            $sectionAbout['image_file'] = $this->uploadImage($request, 'sectionAbout.image_file', $this->path, null, 800);
        }

        // Add other fields to sectionAbout
        $sectionAbout['title'] = $request->input('sectionAbout.title');
        $sectionAbout['description'] = $request->input('sectionAbout.description');

        // Assign updated sectionAbout back to the model
        $Achievements->sectionAbout = json_encode($sectionAbout, JSON_UNESCAPED_UNICODE);

        
        // Vision, Mission, Core Values
        $Achievements->vision    = $request->vision;
        $Achievements->mission   = $request->mission;
        $Achievements->coreValue = $request->coreValue;

        $Achievements->departmentSectionImage = json_encode($request->departmentSectionImage, JSON_UNESCAPED_UNICODE);

        // Programme Outcomes (store as JSON)
        $Achievements->programmeEducationalObjectives = json_encode($request->programmeEducationalObjectives, JSON_UNESCAPED_UNICODE);
        $Achievements->programmeOutcomes = json_encode($request->programmeOutcomes, JSON_UNESCAPED_UNICODE);
        $Achievements->programmeSpecificOutcomes = json_encode($request->programmeSpecificOutcomes, JSON_UNESCAPED_UNICODE);
      
        // Contact Information
        $Achievements->contact = json_encode($request->contact, JSON_UNESCAPED_UNICODE);

       // print_r($sectionAbout); exit;
        // Handle other fields as necessary
        $Achievements->save();

 


        Toastr::success(__($message), __('msg_success'));

        return redirect()->back();
        */
    }

   

}
