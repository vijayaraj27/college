<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Web\Department;
use App\Models\Language;
use App\Models\Web\Slider;
use App\Models\Web\Testimonial;

use DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     ** @param  string  $slug
     * @param  string  $subpage
     * 
     */
    public function index()
    {
       try {
            $data['departments'] =Department::where('status', 1)->get();
            //  dd($departments);
            //  $treeView = $this->buildTreeView($departments);
            //  dd($data);  //exit;
            return view('web.department', ['departments' => $data]);
        } catch (\Exception $e) {
            // Log or display the error message
           dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($slug)
    // {
    //     try {
    //         // Get the department details
    //         $department = Department::where('slug', $slug)
    //                                 ->where('status', '1')
    //                                 ->firstOrFail();
    //         // Get sliders related to the department
    //         $sliders = Slider::where('language_id', Language::version()->id)
    //                          ->where('department_id', $department->id) // Filter by department ID
    //                          ->where('status', '1')
    //                          ->orderBy('id', 'asc')
    //                          ->get();
    //         // Pass department and sliders data to the view
    //         $data = [
    //             'department' => $department,
    //             'sliders' => $sliders
    //         ];
    //         return view('web.department-single', $data);
    //     } catch (\Exception $e) {
    //         // Log or display the error message
    //         dd($e->getMessage());
    //     }
    // }

    public function show($departmentSlug, $section = 'about')
    {
        // Fetch department by slug
        $department = Department::where('slug', $departmentSlug)->firstOrFail();

        // Section to table mapping
        $tableMapping = [
            'about'           => 'department_about_us',
            'achievements'    => 'department_achievements',
            'activities'      => 'department_activities',
            'courses'         => 'department_courses',
            'events'          => 'department_events',
            'faculties'       => 'department_faculties',
            'infrastructures' => 'department_infrastructures',
            'libraries'       => 'department_libraries',
            'magazines'       => 'department_magazines',
            'newsletters'     => 'department_newsletters',
            'placements'      => 'department_placements',
            'publications'    => 'department_publications',
            'research'        => 'department_research',
            'syllabus'        => 'department_syllabus',
            'videos'          => 'department_videos'
        ];

        // Validate section
        if (!array_key_exists($section, $tableMapping)) {
            abort(404, 'Invalid section.');
        }

        // Fetch table data
        $tableName = $tableMapping[$section];
        $data = DB::table($tableName)
            ->where('departmentId', $department->id)
            ->first();

        // Common data
        $sliders = Slider::where('language_id', Language::version()->id)->get();
        $testimonials = Testimonial::where('language_id', Language::version()->id)
            ->where('status', '1')
            ->where('department_id', '0')
            ->orderBy('id', 'desc')
            ->get();

        // Safe extraction helper
        $getValue = fn($obj, $key, $default = null) =>
            (is_object($obj) && property_exists($obj, $key) && !empty($obj->$key)) ? $obj->$key : $default;

        // Prepare response
        $response = [
            'data'                         => $data,
            'section'                      => $section,
            'sliders'                      => $sliders,
            'testimonials'                 => $testimonials,
            'departmentSectionImage'       => json_decode($getValue($data, 'departmentSectionImage', '[]'), true),
            'sectionAbout'                 => json_decode($getValue($data, 'sectionAbout', '[]'), true),
            'vision'                       => $getValue($data, 'vision', ''),
            'mission'                      => $getValue($data, 'mission', ''),
            'coreValue'                    => $getValue($data, 'coreValue', ''),
            'programmeEducationalObjectives' => json_decode($getValue($data, 'programmeEducationalObjectives', '[]'), true),
            'programmeOutcomes'            => json_decode($getValue($data, 'programmeOutcomes', '[]'), true),
            'programmeSpecificOutcomes'    => json_decode($getValue($data, 'programmeSpecificOutcomes', '[]'), true),
            'contact'                      => json_decode($getValue($data, 'contact', '[]'), true),
            'department'                   => $department,
        ];

        // Add section-specific data based on the current section
        if ($data) {
            switch ($section) {
                case 'achievements':
                    $response['staffAchievements'] = json_decode($getValue($data, 'staffAchievements', '[]'), true);
                    $response['studentAchievements'] = json_decode($getValue($data, 'studentAchievements', '[]'), true);
                    $response['studentAchievementsTableFormat'] = json_decode($getValue($data, 'studentAchievementsTableFormat', '[]'), true);
                    $response['studentAchievementsAppeciationList'] = json_decode($getValue($data, 'studentAchievementsAppeciationList', '[]'), true);
                    break;
                    
                case 'activities':
                    $response['departmentActivity'] = json_decode($getValue($data, 'departmentActivity', '[]'), true);
                    $response['studentParticipation'] = json_decode($getValue($data, 'studentParticipation', '[]'), true);
                    $response['interInstituteEventsWinningPrize'] = json_decode($getValue($data, 'interInstituteEventsWinningPrize', '[]'), true);
                    $response['industrialVisit'] = json_decode($getValue($data, 'industrialVisit', '[]'), true);
                    break;
                    
                case 'events':
                    $response['eventDetails'] = json_decode($getValue($data, 'eventDetails', '[]'), true);
                    break;
                    
                case 'faculties':
                    $response['teachingStaff'] = json_decode($getValue($data, 'teachingStaff', '[]'), true);
                    $response['nonTeachingStaff'] = json_decode($getValue($data, 'nonTeachingStaff', '[]'), true);
                    break;
                    
                case 'infrastructures':
                    $response['buildings'] = json_decode($getValue($data, 'buildings', '[]'), true);
                    break;
                    
                case 'libraries':
                    $response['record'] = json_decode($getValue($data, 'record', '[]'), true);
                    break;
                    
                case 'magazines':
                    $response['magazines'] = json_decode($getValue($data, 'magazines', '[]'), true);
                    break;
                    
                case 'newsletters':
                    $response['newsletter'] = json_decode($getValue($data, 'newsletter', '[]'), true);
                    break;
                    
                case 'placements':
                    $response['studentPlaced'] = json_decode($getValue($data, 'studentPlaced', '[]'), true);
                    break;
                    
                case 'publications':
                    $response['patent'] = json_decode($getValue($data, 'patent', '[]'), true);
                    $response['bookChapter'] = json_decode($getValue($data, 'bookChapter', '[]'), true);
                    $response['journalPublication'] = json_decode($getValue($data, 'journalPublication', '[]'), true);
                    $response['conferenceList'] = json_decode($getValue($data, 'conferenceList', '[]'), true);
                    break;
                    
                case 'research':
                    $response['phdHoldersList'] = json_decode($getValue($data, 'phdHoldersList', '[]'), true);
                    $response['annaUniversityRecognizedSuperviorsNameList'] = json_decode($getValue($data, 'annaUniversityRecognizedSuperviorsNameList', '[]'), true);
                    $response['listOfCandidatesPursuingPhdUnderDepartmentSupervisors'] = json_decode($getValue($data, 'listOfCandidatesPursuingPhdUnderDepartmentSupervisors', '[]'), true);
                    $response['listOfDepartmentFacultiesPursuingPhd'] = json_decode($getValue($data, 'listOfDepartmentFacultiesPursuingPhd', '[]'), true);
                    $response['phdAwardedUnderDepartmentSupervisor'] = json_decode($getValue($data, 'phdAwardedUnderDepartmentSupervisor', '[]'), true);
                    $response['supervisor'] = json_decode($getValue($data, 'supervisor', '[]'), true);
                    $response['funds'] = json_decode($getValue($data, 'funds', '[]'), true);
                    $response['valueAddedGroup'] = json_decode($getValue($data, 'valueAddedGroup', '[]'), true);
                    break;
                    
                case 'syllabus':
                    $response['regulation'] = json_decode($getValue($data, 'regulation', '[]'), true);
                    $response['questionBank'] = json_decode($getValue($data, 'questionBank', '[]'), true);
                    $response['syllabus'] = json_decode($getValue($data, 'syllabus', '[]'), true);
                    break;
                    
                case 'videos':
                    $response['videos'] = json_decode($getValue($data, 'videos', '[]'), true);
                    break;
            }
        }

        // Choose view based on section
        $viewPath = match ($section) {
            'about'           => 'web.department.about',
            'achievements'    => 'web.department.achievements',
            'activities'      => 'web.department.activities',
            'courses'         => 'web.department.courses',
            'events'          => 'web.department.events',
            'faculties'       => 'web.department.faculties',
            'infrastructures' => 'web.department.infrastructures',
            'libraries'       => 'web.department.libraries',
            'magazines'       => 'web.department.magazines',
            'newsletters'     => 'web.department.newsletters',
            'placements'      => 'web.department.placements',
            'publications'    => 'web.department.publications',
            'research'        => 'web.department.research',
            'syllabus'        => 'web.department.syllabus',
            'videos'          => 'web.department.videos',
            default           => 'web.department.about',
        };

        return view($viewPath, $response);
    }
    
    // Common function to handle Add/Update
    public function storeOrUpdate(Request $request, $section, $departmentId)
    {
        // Define the table name dynamically based on section
        $table = 'department_' . $section;

        // Validate if table exists in the schema
        if (!Schema::hasTable($table)) {
            return response()->json(['error' => 'Invalid section provided.'], 400);
        }

        // Validation rules based on table structure
        $rules = $this->getValidationRules($section);

        // Validate input
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Check if record exists for the department
        $record = DB::table($table)->where('departmentId', $departmentId)->first();

        // Prepare data to insert or update
        $data = $request->except('_method', '_token'); // Exclude Laravel's hidden fields
        $data['departmentId'] = $departmentId;
        $data['updatedAt'] = now(); // Add updated timestamp

        if ($record) {
            // Update if the record exists
            DB::table($table)->where('departmentId', $departmentId)->update($data);
            return response()->json(['message' => 'Data updated successfully']);
        } else {
            // Insert new record
            $data['createdAt'] = now(); // Add created timestamp
            DB::table($table)->insert($data);
            return response()->json(['message' => 'Data added successfully']);
        }
    }

    // Function to define validation rules based on section
    protected function getValidationRules($section)
    {
        $rules = [];

        switch ($section) {
            case 'about_us':
                $rules = [
                    'slider' => 'required|json',
                    'sectionAbout' => 'required|json',
                    'vision' => 'required|string',
                    'mission' => 'required|string',
                    'coreValue' => 'required|string',
                    'departmentSectionImage' => 'required|json',
                    'testimonial' => 'nullable|json',
                    'programmeEducationalObjectives' => 'nullable|json',
                    'programmeOutcomes' => 'nullable|json',
                    'programmeSpecificOutcomes' => 'nullable|json',
                    'contact' => 'nullable|json'
                ];
                break;

            case 'faculties':
                $rules = [
                    'facultyName' => 'required|string',
                    'designation' => 'required|string',
                    'experience' => 'required|integer',
                    'departmentId' => 'required|integer',
                    'qualification' => 'required|string',
                    'publication' => 'nullable|json',
                    'awards' => 'nullable|json'
                ];
                break;

            case 'activities':
                $rules = [
                    'title' => 'required|string',
                    'imageFile' => 'required|string',
                    'description' => 'required|string',
                    'departmentActivity' => 'required|json',
                    'studentParticipation' => 'required|json',
                    'interInstituteEventsWinningPrize' => 'nullable|json'
                ];
                break;


            case 'research':
                $rules = [
                    'title' => 'required|string',
                    'imageFile' => 'required|string',
                    'description' => 'required|string',
                    'phdHoldersList' => 'required|json',
                    'annaUniversityRecognizedSuperviorsNameList' => 'required|json',
                    'listOfCandidatesPursuingPhdUnderDepartmentSupervisors' => 'required|json',
                    'listOfDepartmentFacultiesPursuingPhd' => 'required|json',
                    'phdAwardedUnderDepartmentSupervisor' => 'required|json',
                    'supervisor' => 'nullable|json',
                    'funds' => 'nullable|json',
                    'valueAddedGroup' => 'nullable|json'
                ];
                break;

            case 'publications':
                $rules = [
                    'title' => 'required|string',
                    'imageFile' => 'nullable|string',
                    'description' => 'nullable|string',
                    'patent' => 'nullable|json',
                    'bookChapter' => 'nullable|json',
                    'journalPublication' => 'nullable|json',
                    'conferenceList' => 'nullable|json'
                ];
                break;

            case 'infrastructures':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'imageFile' => 'required|string',
                    'facilities' => 'nullable|json'
                ];
                break;

            case 'libraries':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'imageFile' => 'nullable|string',
                    'libraryDetails' => 'required|json'
                ];
                break;

            case 'newsletters':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'imageFile' => 'nullable|string',
                    'newsletterDetails' => 'required|json'
                ];
                break;

            case 'magazines':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'imageFile' => 'nullable|string',
                    'magazineDetails' => 'required|json'
                ];
                break;

            case 'placements':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'placementStatistics' => 'required|json',
                    'imageFile' => 'nullable|string'
                ];
                break;

            case 'events':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'eventDetails' => 'required|json',
                    'imageFile' => 'nullable|string'
                ];
                break;

            case 'syllabus':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'syllabusDetails' => 'required|json',
                    'imageFile' => 'nullable|string'
                ];
                break;

            case 'videos':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'videoUrl' => 'required|string',
                    'imageFile' => 'nullable|string'
                ];
                break;

            case 'achievements':
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'videoUrl' => 'required|string',
                    'imageFile' => 'nullable|string',
                    'staffAchievements' => 'nullable|json',
                    'studentAchievements' => 'nullable|json',
                    'studentAchievementsTableFormat' => 'nullable|json',
                    'studentAchievementsAppeciationList' => 'nullable|json'
                ];
                break;

            // Add cases for other sections here

            default:
                $rules = [
                    'title' => 'required|string',
                    'description' => 'required|string',
                ];
                break;
        }

        return $rules;
    }

    public function showFaculty($slug, $subpage="faculty")
    {
        try {
            $data['sliders'] = Slider::where('language_id', Language::version()->id)
            ->where('status', '1')
            ->orderBy('id', 'asc')
            ->get();
           // echo "test"; exit;
            // Retrieve the department
            $data['department'] = Department::where('slug', $slug)
                ->where('status', '1')
                ->firstOrFail();
                //echo "test"; print_r($data);  exit;
            // Retrieve additional data for the subpage if needed
            // For example, you might have a different model for subpages
            // Pass data to the view
            return view('web.department-faculty', $data);
        } catch (\Exception $e) {
            // Log or display the error message
            dd($e->getMessage());
        }
    }
}
