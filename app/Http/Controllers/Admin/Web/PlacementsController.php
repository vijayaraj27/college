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

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

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
            // Get data from request - handle both array and JSON string formats
            $studentPlacedData = $request->input('studentPlaced', []);
            
            // If it's a string, try to decode it
            if (is_string($studentPlacedData) && !empty($studentPlacedData)) {
                $decoded = json_decode($studentPlacedData, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $studentPlacedData = $decoded;
                } else {
                    // If decode fails, try getting from raw POST
                    $rawPost = $_POST ?? [];
                    if (isset($rawPost['studentPlaced']) && is_array($rawPost['studentPlaced'])) {
                        $studentPlacedData = $rawPost['studentPlaced'];
                    }
                }
            }
            
            // If still not array, try raw POST directly
            if (!is_array($studentPlacedData) || empty($studentPlacedData)) {
                $rawPost = $_POST ?? [];
                if (isset($rawPost['studentPlaced'])) {
                    if (is_array($rawPost['studentPlaced'])) {
                        $studentPlacedData = $rawPost['studentPlaced'];
                    } elseif (is_string($rawPost['studentPlaced'])) {
                        $decoded = json_decode($rawPost['studentPlaced'], true);
                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                            $studentPlacedData = $decoded;
                        }
                    }
                }
            }
            
            // Process ALL data - iterate through every entry
            $processedData = [];
            
            if (is_array($studentPlacedData) && !empty($studentPlacedData)) {
                // Re-index years to handle any gaps
                foreach (array_values($studentPlacedData) as $yearData) {
                    if (is_array($yearData) && isset($yearData['year']) && !empty(trim($yearData['year']))) {
                        $yearEntry = [
                            'year' => trim($yearData['year']),
                            'placements' => []
                        ];
                        
                        // Process ALL placements - iterate through ALL keys
                        if (isset($yearData['placements']) && is_array($yearData['placements'])) {
                            // Use array_values to ensure we get ALL entries regardless of index gaps
                            $placements = array_values($yearData['placements']);
                            
                            foreach ($placements as $placement) {
                                if (is_array($placement)) {
                                    $studentRegNumber = isset($placement['studentRegNumber']) ? trim($placement['studentRegNumber']) : '';
                                    $studentName = isset($placement['studentName']) ? trim($placement['studentName']) : '';
                                    $companyName = isset($placement['companyName']) ? trim($placement['companyName']) : '';
                                    
                                    // Add placement if it has at least one non-empty field
                                    if (!empty($studentRegNumber) || !empty($studentName) || !empty($companyName)) {
                                        $yearEntry['placements'][] = [
                                            'studentRegNumber' => $studentRegNumber,
                                            'studentName' => $studentName,
                                            'companyName' => $companyName
                                        ];
                                    }
                                }
                            }
                        }
                        
                        // Only add year if it has placements
                        if (!empty($yearEntry['placements'])) {
                            $processedData[] = $yearEntry;
                        }
                    }
                }
            }
            
            $Placements->studentPlaced = json_encode($processedData, JSON_UNESCAPED_UNICODE);
        }       
        $Placements->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}