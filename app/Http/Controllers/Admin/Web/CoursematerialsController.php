<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Coursematerials;
use App\Models\Language;
use Toastr;
use Auth;
class CoursematerialsController extends Controller
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
        $this->title    = trans_choice('Coursematerials', 1);
        $this->route    = 'admin.coursematerials';
        $this->view     = 'admin.web.coursematerials';
        $this->path     = 'coursematerials';
        $this->access   = 'coursematerials';
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

            $data['coursematerials'] = Coursematerials::all(); // Example: Fetch all coursematerials.

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

        $query = Coursematerials::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();       
        
            $data['courses'] = isset($data['row']['courses']) && is_string($data['row']['courses']) 
            ? array_values(json_decode($data['row']['courses'], true) ?? []) 
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
        $Coursematerials = Coursematerials::where('departmentId', $request->departmentId)->first();

        if ($Coursematerials) {
            $message = 'Record updated successfully';
        } else {
            $Coursematerials = new Coursematerials;
            $Coursematerials->departmentId = $request->departmentId;
            $Coursematerials->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            //echo "Two "; exit;
            // Handle the image upload if the file exists
            if ($request->hasFile('imageFile')) {            
                $Coursematerials->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }

            $Coursematerials->title = $request->title;
            $Coursematerials->description = $request->description;            
        }else if($request->section === 'courses'){
            $Coursematerials->courses = json_encode($request->courses, JSON_UNESCAPED_UNICODE);
        }       
        $Coursematerials->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}