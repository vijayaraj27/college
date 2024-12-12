<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Placements;
use App\Models\Language;
use Toastr;
use Auth;
class PlacementsController extends Controller
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
        $this->title    = trans_choice('Placements', 1);
        $this->route    = 'admin.placements';
        $this->view     = 'admin.web.placements';
        $this->path     = 'placements';
        $this->access   = 'placements';
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

            $data['placements'] = Placements::all(); // Example: Fetch all placements.

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

        $query = Placements::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();
        //$data['studentPlaced'] = json_decode($data['row']['studentPlaced'], true);
        $data['studentPlaced'] = $data['row'] ? json_decode($data['row']['studentPlaced'], true) : [];

     //  echo '<pre>';print_r($data['row']['studentPlaced']);exit;
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
        $Placements = Placements::where('departmentId', $request->departmentId)->first();

        if ($Placements) {
            $message = 'Record updated successfully';
        } else {
            $Placements = new Placements;
            $Placements->departmentId = $request->departmentId;
            $Placements->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            //echo "Two "; exit;
            // Handle the image upload if the file exists
            if ($request->hasFile('imageFile')) {            
                $Placements->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }

            $Placements->title = $request->title;
            $Placements->description = $request->description;            
        }else if($request->section === 'student-placed'){
            $Placements->studentPlaced = json_encode($request->studentPlaced, JSON_UNESCAPED_UNICODE);
        }       
        $Placements->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}