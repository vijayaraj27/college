<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Activities;
use Toastr;

class ActivitiesController extends Controller
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
        $this->title    = trans_choice('Activities', 1);
        $this->route    = 'admin.activities';
        $this->view     = 'admin.web.activities';
        $this->path     = 'activities';
        $this->access   = 'activities';
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

            $data['activities'] = Activities::all(); // Example: Fetch all coursematerials.

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

        $query = Activities::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();       
        
            $data['departmentActivity'] = isset($data['row']['departmentActivity']) && is_string($data['row']['departmentActivity']) 
            ? array_values(json_decode($data['row']['departmentActivity'], true) ?? []) 
            : [];


            $data['studentParticipation'] = isset($data['row']['studentParticipation']) && is_string($data['row']['studentParticipation']) 
            ? array_values(json_decode($data['row']['studentParticipation'], true) ?? []) 
            : [];

            $data['interInstituteEventsWinningPrize'] = isset($data['row']['interInstituteEventsWinningPrize']) && is_string($data['row']['interInstituteEventsWinningPrize']) 
            ? array_values(json_decode($data['row']['interInstituteEventsWinningPrize'], true) ?? []) 
            : [];
            

            $data['industrialVisit'] = isset($data['row']['industrialVisit']) && is_string($data['row']['industrialVisit']) 
            ? array_values(json_decode($data['row']['industrialVisit'], true) ?? []) 
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
        $Activities = Activities::where('departmentId', $request->departmentId)->first();

        if ($Activities) {
            $message = 'Record updated successfully';
        } else {
            $Activities = new Activities;
            $Activities->departmentId = $request->departmentId;
            $Activities->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            if ($request->hasFile('imageFile')) {            
                $Activities->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }
            $Activities->title = $request->title;
            $Activities->description = $request->description;            
        }else if($request->section === 'departmentActivity'){
            $Activities->departmentActivity = json_encode($request->departmentActivity, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'studentParticipation'){
            $Activities->studentParticipation = json_encode($request->studentParticipation, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'interInstituteEventsWinningPrize'){
            $Activities->interInstituteEventsWinningPrize = json_encode($request->interInstituteEventsWinningPrize, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'industrialVisit'){
            $Activities->industrialVisit = json_encode($request->industrialVisit, JSON_UNESCAPED_UNICODE);
        }     
        $Activities->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}