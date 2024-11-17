<?php
namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Faculties;
use App\Models\Language;
use Toastr;
use Auth;

class FacultiesController extends Controller
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
        $this->title    = trans_choice('Faculties', 1);
        $this->route    = 'admin.faculties';
        $this->view     = 'admin.web.faculties';
        $this->path     = 'faculties';
        $this->access   = 'faculties';
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
        $data['faculties'] = Faculties::all(); // Example: Fetch all faculties.

        return view($this->view.'.index', $data);
    }

    /**
     * Show a single resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $result = explode('_', $slug);
        $departmentId = $result[0];
        $section = $result[1];

        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;
        $data['baseurl'] = config('app.url');
        $data['departmentId'] = $departmentId;
        $data['section'] = $section;

        $query = Faculties::query();
        $query->where('departmentId', $departmentId);
        $data['row'] =  $query->first();

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
        // Validation Rules
        $rules = [
            'departmentId' => 'required|integer',
            'section' => 'required|string',
            'imageFile' => 'nullable|image|max:2048', // Adjust as necessary
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'teachingStaff' => 'nullable|array',
            'nonTeachingStaff' => 'nullable|array',
        ];
    
        $validated = $request->validate($rules);
    
        // Check if the row exists with the given departmentId
        $Faculties = Faculties::firstOrNew(['departmentId' => $request->departmentId]);
        $message = $Faculties->exists ? 'Record updated successfully' : 'Record created successfully';
    
        // Handle 'basic' section
        if ($request->section === 'basic') {
            if ($request->hasFile('imageFile')) {
                $Faculties->imageFile = $this->uploadImage($request, 'imageFile', $this->path, null, 800);
            }
            $Faculties->title = $request->title;
            $Faculties->description = $request->description;
        }
    
        // Handle 'teaching-staff' section
        elseif ($request->section === 'teaching-staff') {

           
                $Faculties->teachingStaff = json_encode($request->teachingStaffData, JSON_UNESCAPED_UNICODE);

                echo json_encode($request->teachingStaff, JSON_UNESCAPED_UNICODE);
            
        }
    
        // Handle 'non-teaching-staff' section
        elseif ($request->section === 'non-teaching-staff') {
            
                $Faculties->nonTeachingStaff = json_encode($request->nonTeachingStaffData, JSON_UNESCAPED_UNICODE);
             
        }
    
        // Save the record
        $Faculties->save();
    
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
    
}
