<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Research;
use Auth;
use Toastr;

class ResearchController extends Controller
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
        $this->title    = trans_choice('Research', 1);
        $this->route    = 'admin.research';
        $this->view     = 'admin.web.research';
        $this->path     = 'research';
        $this->access   = 'research';
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

            $data['research'] = Research::all(); // Example: Fetch all publications.

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

        $query = Research::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();       
        
            $data['record'] = isset($data['row']['record']) && is_string($data['row']['record']) 
            ? array_values(json_decode($data['row']['record'], true) ?? []) 
            : [];

            //record


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
        $Research = Research::where('departmentId', $request->departmentId)->first();

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

        if ($Research) {
            $message = 'Record updated successfully';
        } else {
            $Research = new Research;
            $Research->departmentId = $request->departmentId;
            $Research->designationId = 1;
            $message = 'Record created successfully';
        }

      //  print_r($request); exit;

        if($request->section === 'basic'){
            
            if ($request->hasFile('imageFile')) {            
                $Research->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }
            
            $Research->title = $request->title;
            $Research->description = $request->description;            

        }else if($request->section === 'sectionAbout'){
            if ($request->hasFile('imageFile2')) {            
                $Research->imageFile2 = $this->uploadImage($request, 'imageFile2', $this->path, null, 800);                 
            }
            
            $Research->title2 = $request->title2;
            $Research->description2 = $request->description2;  
        }else if($request->section === 'phd'){
            $Research->phdHoldersList = json_encode($request->phdHoldersList, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'anna-university'){
            $Research->annaUniversityRecognizedSuperviorsNameList = json_encode($request->annaUniversityRecognizedSuperviorsNameList, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'pursuing-phd'){
            $Research->ListOfCandidatesPursuingPhdUnderDepartmentSupervisors = json_encode($request->ListOfCandidatesPursuingPhdUnderDepartmentSupervisors, JSON_UNESCAPED_UNICODE);
        }else if ($request->section === 'faculties-pursuing-phd') {
            $Research->listOfDepartmentFacultiesPursuingPhd = json_encode($request->ListOfDepartmentFacultiesPursuingPhd, JSON_UNESCAPED_UNICODE); 
        }
        else if($request->section === 'phd-awarded'){
            $Research->phdAwardedUnderDepartmentSupervisor = json_encode($request->phdAwardedUnderDepartmentSupervisor, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'supervisor'){
            $Research->supervisor = json_encode($request->supervisor, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'funds'){
            $Research->funds = json_encode($request->funds, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'value-added-group'){
            $Research->valueAddedGroup = json_encode($request->valueAddedGroup, JSON_UNESCAPED_UNICODE);
        }     
        
 
            $Research->save();
            Toastr::success(__($message), __('msg_success'));
            return redirect()->back();
  
        //return redirect()->back();
    }
}