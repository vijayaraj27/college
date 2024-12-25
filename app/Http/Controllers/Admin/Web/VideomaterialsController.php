<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Videomaterials;
use App\Models\Language;
use Toastr;
use Auth;
class VideomaterialsController extends Controller
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
        $this->title    = trans_choice('Videomaterials', 1);
        $this->route    = 'admin.videomaterials';
        $this->view     = 'admin.web.videomaterials';
        $this->path     = 'videomaterials';
        $this->access   = 'videomaterials';
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

            $data['videomaterials'] = Videomaterials::all(); // Example: Fetch all videomaterials.

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

        $query = Videomaterials::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();       
      $data['videos'] = isset($data['row']['videos']) && is_string($data['row']['videos']) 
      ? array_values(json_decode($data['row']['videos'], true) ?? []) 
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
        $Videomaterials = Videomaterials::where('departmentId', $request->departmentId)->first();

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

        if ($Videomaterials) {
            $message = 'Record updated successfully';
        } else {
            $Videomaterials = new Videomaterials;
            $Videomaterials->departmentId = $request->departmentId;
            $Videomaterials->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            //echo "Two "; exit;
            // Handle the image upload if the file exists
            if ($request->hasFile('imageFile')) {            
                $Videomaterials->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }

            $Videomaterials->title = $request->title;
            $Videomaterials->description = $request->description;            
        }else if($request->section === 'videos'){
            $Videomaterials->videos = json_encode($request->videos, JSON_UNESCAPED_UNICODE);
        }       
        $Videomaterials->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}