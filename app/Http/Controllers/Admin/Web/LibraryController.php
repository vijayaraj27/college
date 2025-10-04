<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Library;
use Auth;
use Toastr;

class LibraryController extends Controller
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
        $this->title    = trans_choice('Library', 1);
        $this->route    = 'admin.library';
        $this->view     = 'admin.web.library';
        $this->path     = 'library';
        $this->access   = 'library';
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

            $data['library'] = Library::all(); // Example: Fetch all library.

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

        $query = Library::query();
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
        $Library = Library::where('departmentId', $request->departmentId)->first();

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

        if ($Library) {
            $message = 'Record updated successfully';
        } else {
            $Library = new Library;
            $Library->departmentId = $request->departmentId;
            $Library->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            
            if ($request->hasFile('imageFile')) {            
                $Library->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }
            
            $Library->title = $request->title;
            $Library->description = $request->description;            

        }else if($request->section === 'sectionAbout'){
            if ($request->hasFile('imageFile2')) {            
                $Library->imageFile2 = $this->uploadImage($request, 'imageFile2', $this->path, null, 800);                 
            }
            
            $Library->title2 = $request->title2;
            $Library->description2 = $request->description2;  
        }else if($request->section === 'record'){
            $Library->record = json_encode($request->record, JSON_UNESCAPED_UNICODE);
        }       
        $Library->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}