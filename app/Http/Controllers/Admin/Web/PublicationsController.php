<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Publications;

use Toastr;

class PublicationsController extends Controller
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
        $this->title    = trans_choice('Publications', 1);
        $this->route    = 'admin.publications';
        $this->view     = 'admin.web.publications';
        $this->path     = 'publications';
        $this->access   = 'publications';
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

            $data['publications'] = Publications::all(); // Example: Fetch all publications.

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

        $query = Publications::query();
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
        $Publications = Publications::where('departmentId', $request->departmentId)->first();

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

        if ($Publications) {
            $message = 'Record updated successfully';
        } else {
            $Publications = new Publications;
            $Publications->departmentId = $request->departmentId;
            $Publications->designationId = 1;
            $message = 'Record created successfully';
        }

        if($request->section === 'basic'){
            
            if ($request->hasFile('imageFile')) {            
                $Publications->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);                 
            }
            
            $Publications->title = $request->title;
            $Publications->description = $request->description;            

        }else if($request->section === 'sectionAbout'){
            if ($request->hasFile('imageFile2')) {            
                $Publications->imageFile2 = $this->uploadImage($request, 'imageFile2', $this->path, null, 800);                 
            }
            
            $Publications->title2 = $request->title2;
            $Publications->description2 = $request->description2;  
        }else if($request->section === 'patent'){
            $Publications->patent = json_encode($request->patent, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'bookchapter'){
            $Publications->bookChapter = json_encode($request->bookChapter, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'journalpublication'){
            $Publications->journalPublication = json_encode($request->journalPublication, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'conferenceList'){
            $Publications->conferenceList = json_encode($request->conferenceList, JSON_UNESCAPED_UNICODE);
        }        
        $Publications->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}