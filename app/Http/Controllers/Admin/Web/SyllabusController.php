<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Syllabus;
use App\Models\Language;
use Toastr;
use Auth;
class SyllabusController extends Controller
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
        $this->title    = trans_choice('Syllabus', 1);
        $this->route    = 'admin.syllabus';
        $this->view     = 'admin.web.syllabus';
        $this->path     = 'syllabus';
        $this->access   = 'syllabus';
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

            $data['syllabus'] = Syllabus::all(); // Example: Fetch all syllabus.

            return view($this->view.'.index', $data);
        }


    public function show($slug)
    {
        $result = explode('_', $slug);
        $departmentId = $result[0];
        $section= $result[1];

       // echo $section." 123456 ";

        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;
        $data['baseurl'] = config('app.url');
        $data['departmentId'] = $departmentId;
        $data['section'] = $section;

        $query = Syllabus::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();       
        
            $data['regulation'] = isset($data['row']['regulation']) && is_string($data['row']['regulation']) 
            ? array_values(json_decode($data['row']['regulation'], true) ?? []) 
            : [];


            $data['syllabus'] = isset($data['row']['syllabus']) && is_string($data['row']['syllabus']) 
            ? array_values(json_decode($data['row']['syllabus'], true) ?? []) 
            : [];


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
        $Syllabus = Syllabus::where('departmentId', $request->departmentId)->first();

        if ($Syllabus) {
            $message = 'Record updated successfully';
        } else {
            $Syllabus = new Syllabus;
            $Syllabus->departmentId = $request->departmentId;
            $Syllabus->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            //echo "Two "; exit;
            // Handle the image upload if the file exists
            if ($request->hasFile('imageFile')) {            
                $Syllabus->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }

            $Syllabus->title = $request->title;
            $Syllabus->description = $request->description;            
        }else if($request->section == 'regulation'){
            $Syllabus->regulation = json_encode($request->regulation, JSON_UNESCAPED_UNICODE);
        }else if($request->section == 'questionBank'){
            $Syllabus->questionBank = json_encode($request->questionBank, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'syllabus'){
            $Syllabus->syllabus = json_encode($request->syllabus, JSON_UNESCAPED_UNICODE);
        }       
        $Syllabus->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}