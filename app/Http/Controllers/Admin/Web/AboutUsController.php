<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\AboutUs;
use App\Models\Language;
use Toastr;
use Auth;
class AboutUsController extends Controller
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
        $this->title    = trans_choice('module_about_us', 1);
        $this->route    = 'admin.about-us';
        $this->view     = 'admin.web.about-us';
        $this->path     = 'about-us';
        $this->access   = 'about-us';
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
  //$query = AboutUs::where('language_id', Language::version()->id);
  $query = AboutUs::query();
    if(Auth::user()->department_id == 0){
        //$query->where('department_id', 0);
        $query->where('departmentId', 1);
    } else {
        $query->where('departmentId', 1);
       // $query->where('department_id', Auth::user()->department_id);
    }
    $row =  $query->first();

    $data['programmeEducationalObjectives'] = json_decode($row->programmeEducationalObjectives, true);
    $data['programmeOutcomes'] = json_decode($row->programmeOutcomes, true);
    $data['programmeSpecificOutcomes'] = json_decode($row->programmeSpecificOutcomes, true);
    $data['row'] = $query->first();
    //dd(Auth::user()->department_id);
    return view($this->view.'.index', $data);
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    print_r($request->all()); //exit;
    // Field Validation
    $request->validate([
        'sectionAbout.image_file' => 'nullable',
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

    $id = $request->id;

    if ($id == -1) {
        // Insert Data
        $aboutUs = new AboutUs;
    } else {
        // Update Data
        $aboutUs = AboutUs::find($id);
    }

    // About Section
    $aboutUs->label = $request->sectionAbout['title'];
    $aboutUs->description = $request->sectionAbout['description'];
    
    // Vision, Mission, Core Values
    $aboutUs->vision_desc = $request->vision;
    $aboutUs->mission_desc = $request->mission;
    $aboutUs->core_values = $request->coreValue;

    // Programme Outcomes (store as JSON)
    $aboutUs->programmeEducationalObjectives = json_encode($request->programmeEducationalObjectives, JSON_UNESCAPED_UNICODE);
    $aboutUs->programmeOutcomes = json_encode($request->programmeOutcomes, JSON_UNESCAPED_UNICODE);
    $aboutUs->programmeSpecificOutcomes = json_encode($request->programmeSpecificOutcomes, JSON_UNESCAPED_UNICODE);
  
    // Contact Information
    $aboutUs->contact_name = $request->contact['name'];
    $aboutUs->contact_email = $request->contact['email'];
    $aboutUs->contact_phone = $request->contact['phone'];

    // Handle images (if any are uploaded)
    if ($request->hasFile('sectionAbout.image_file')) {
        $aboutUs->attach = $this->uploadImage($request, 'sectionAbout.image_file', $this->path, null, 800);
    }
    
    // Handle other fields as necessary
    $aboutUs->save();

    Toastr::success(__('msg_updated_successfully'), __('msg_success'));
    return redirect()->back();
}

}
