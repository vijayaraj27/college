<?php
namespace App\Http\Controllers\Admin\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Web\Activities;
use Toastr;
use Auth;

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

        if (Auth::user()->department_id != 0 && $request->departmentId != Auth::user()->department_id) {
            Toastr::error(__("Sorry you can't edit some other information without their access"), __('msg_error'));
            return redirect()->back();
        }

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
            // Get data and process to ensure ALL entries are captured
            $departmentActivityData = $request->input('departmentActivity', []);
            
            // Handle JSON string if needed
            if (is_string($departmentActivityData) && !empty($departmentActivityData)) {
                $decoded = json_decode($departmentActivityData, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $departmentActivityData = $decoded;
                }
            }
            
            // Process and normalize
            $processedData = [];
            if (is_array($departmentActivityData) && !empty($departmentActivityData)) {
                foreach (array_values($departmentActivityData) as $yearData) {
                    if (is_array($yearData) && isset($yearData['year']) && !empty(trim($yearData['year']))) {
                        $yearEntry = [
                            'year' => trim($yearData['year']),
                            'activities' => []
                        ];
                        
                        if (isset($yearData['activities']) && is_array($yearData['activities'])) {
                            foreach (array_values($yearData['activities']) as $activity) {
                                if (is_array($activity)) {
                                    $teacherName = isset($activity['teacherName']) ? trim($activity['teacherName']) : '';
                                    $programmeTitle = isset($activity['programmeTitle']) ? trim($activity['programmeTitle']) : '';
                                    $organizer = isset($activity['organizer']) ? trim($activity['organizer']) : '';
                                    $duration = isset($activity['duration']) ? trim($activity['duration']) : '';
                                    
                                    if (!empty($teacherName) || !empty($programmeTitle) || !empty($organizer) || !empty($duration)) {
                                        $yearEntry['activities'][] = [
                                            'teacherName' => $teacherName,
                                            'programmeTitle' => $programmeTitle,
                                            'organizer' => $organizer,
                                            'duration' => $duration
                                        ];
                                    }
                                }
                            }
                        }
                        
                        if (!empty($yearEntry['activities'])) {
                            $processedData[] = $yearEntry;
                        }
                    }
                }
            }
            
            $Activities->departmentActivity = json_encode($processedData, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'studentParticipation'){
            // Get data and process to ensure ALL entries are captured
            $studentParticipationData = $request->input('studentParticipation', []);
            
            // Handle JSON string if needed
            if (is_string($studentParticipationData) && !empty($studentParticipationData)) {
                $decoded = json_decode($studentParticipationData, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $studentParticipationData = $decoded;
                }
            }
            
            // Process and normalize
            $processedData = [];
            if (is_array($studentParticipationData) && !empty($studentParticipationData)) {
                foreach (array_values($studentParticipationData) as $yearData) {
                    if (is_array($yearData) && isset($yearData['year']) && !empty(trim($yearData['year']))) {
                        $yearEntry = [
                            'year' => trim($yearData['year']),
                            'participations' => []
                        ];
                        
                        if (isset($yearData['participations']) && is_array($yearData['participations'])) {
                            foreach (array_values($yearData['participations']) as $participation) {
                                if (is_array($participation)) {
                                    $eventDate = isset($participation['eventDate']) ? trim($participation['eventDate']) : '';
                                    $eventName = isset($participation['eventName']) ? trim($participation['eventName']) : '';
                                    $conductedBy = isset($participation['conductedBy']) ? trim($participation['conductedBy']) : '';
                                    $nameOfTheStudentsParticipated = isset($participation['nameOfTheStudentsParticipated']) ? trim($participation['nameOfTheStudentsParticipated']) : '';
                                    
                                    if (!empty($eventDate) || !empty($eventName) || !empty($conductedBy) || !empty($nameOfTheStudentsParticipated)) {
                                        $yearEntry['participations'][] = [
                                            'eventDate' => $eventDate,
                                            'eventName' => $eventName,
                                            'conductedBy' => $conductedBy,
                                            'nameOfTheStudentsParticipated' => $nameOfTheStudentsParticipated
                                        ];
                                    }
                                }
                            }
                        }
                        
                        if (!empty($yearEntry['participations'])) {
                            $processedData[] = $yearEntry;
                        }
                    }
                }
            }
            
            $Activities->studentParticipation = json_encode($processedData, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'interInstituteEventsWinningPrize'){
            // Get data and process to ensure ALL entries are captured
            $interInstituteData = $request->input('interInstituteEventsWinningPrize', []);
            
            // Handle JSON string if needed
            if (is_string($interInstituteData) && !empty($interInstituteData)) {
                $decoded = json_decode($interInstituteData, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $interInstituteData = $decoded;
                }
            }
            
            // Process and normalize
            $processedData = [];
            if (is_array($interInstituteData) && !empty($interInstituteData)) {
                foreach (array_values($interInstituteData) as $yearData) {
                    if (is_array($yearData) && isset($yearData['year']) && !empty(trim($yearData['year']))) {
                        $yearEntry = [
                            'year' => trim($yearData['year']),
                            'events' => []
                        ];
                        
                        if (isset($yearData['events']) && is_array($yearData['events'])) {
                            foreach (array_values($yearData['events']) as $event) {
                                if (is_array($event)) {
                                    $eventDate = isset($event['eventDate']) ? trim($event['eventDate']) : '';
                                    $eventName = isset($event['eventName']) ? trim($event['eventName']) : '';
                                    $conductedBy = isset($event['conductedBy']) ? trim($event['conductedBy']) : '';
                                    $nameOfTheStudentsParticipated = isset($event['nameOfTheStudentsParticipated']) ? trim($event['nameOfTheStudentsParticipated']) : '';
                                    $prizeWon = isset($event['prizeWon']) ? trim($event['prizeWon']) : '';
                                    
                                    if (!empty($eventDate) || !empty($eventName) || !empty($conductedBy) || !empty($nameOfTheStudentsParticipated) || !empty($prizeWon)) {
                                        $yearEntry['events'][] = [
                                            'eventDate' => $eventDate,
                                            'eventName' => $eventName,
                                            'conductedBy' => $conductedBy,
                                            'nameOfTheStudentsParticipated' => $nameOfTheStudentsParticipated,
                                            'prizeWon' => $prizeWon
                                        ];
                                    }
                                }
                            }
                        }
                        
                        if (!empty($yearEntry['events'])) {
                            $processedData[] = $yearEntry;
                        }
                    }
                }
            }
            
            $Activities->interInstituteEventsWinningPrize = json_encode($processedData, JSON_UNESCAPED_UNICODE);
        }else if($request->section === 'industrialVisit'){
            // Get data and process to ensure ALL entries are captured
            $industrialVisitData = $request->input('industrialVisit', []);
            
            // Handle JSON string if needed
            if (is_string($industrialVisitData) && !empty($industrialVisitData)) {
                $decoded = json_decode($industrialVisitData, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $industrialVisitData = $decoded;
                }
            }
            
            // Process and normalize (flat array, not grouped by year)
            $processedData = [];
            if (is_array($industrialVisitData) && !empty($industrialVisitData)) {
                foreach (array_values($industrialVisitData) as $visit) {
                    if (is_array($visit)) {
                        $nameOftheIndustry = isset($visit['nameOftheIndustry']) ? trim($visit['nameOftheIndustry']) : '';
                        $semester = isset($visit['semester']) ? trim($visit['semester']) : '';
                        $staffAccompanied = isset($visit['staffAccompanied']) ? trim($visit['staffAccompanied']) : '';
                        $Duration = isset($visit['Duration']) ? trim($visit['Duration']) : '';
                        
                        if (!empty($nameOftheIndustry) || !empty($semester) || !empty($staffAccompanied) || !empty($Duration)) {
                            $processedData[] = [
                                'nameOftheIndustry' => $nameOftheIndustry,
                                'semester' => $semester,
                                'staffAccompanied' => $staffAccompanied,
                                'Duration' => $Duration
                            ];
                        }
                    }
                }
            }
            
            $Activities->industrialVisit = json_encode($processedData, JSON_UNESCAPED_UNICODE);
        }     
        $Activities->save();
        Toastr::success(__($message), __('msg_success'));
        return redirect()->back();
    }
}