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

        // Check the second slug to determine which table to query
        $tableMapping = [
           'about'          => 'department_about_us',
           'achievements'   => 'department_achievements',
           'activities'     => 'department_activities',
           'events'         => 'department_events',
           'faculties'      => 'department_faculties',
           'infrastructures'=> 'department_infrastructures',
           'libraries'      => 'department_libraries',
           'magazines'      => 'department_magazines',
           'newsletters'    => 'department_newsletters',
           'placements'     => 'department_placements',
           'publications'   => 'department_publications',
           'research'       => 'department_research',
           'syllabus'       => 'department_syllabus',
           'videos'         => 'department_videos'
        ];

        // Use the second slug to determine which table to query
        if (!array_key_exists($section, $tableMapping)) {
           return response()->json(['error' => 'Invalid section'], 404);
        }

        // Query the data from the correct table
        $tableName = $tableMapping[$section];

        $data = DB::table($tableName)
           ->where('departmentId', $department->id)
           ->first();

           $sliders = Slider::where('language_id', Language::version()->id)->get();
           $testimonials = Testimonial::where('language_id', Language::version()->id)
                                        ->where('status', '1')
                                        ->where('department_id', '0')
                                        ->orderBy('id', 'desc')
                                        ->get();

        //  print_r($sliders); exit;
    
       // Helper function to safely decode JSON
       $decodeJson = function($jsonString) {
           if (empty($jsonString)) return null;
           $decoded = json_decode($jsonString, true);
           return is_array($decoded) ? $decoded : null;
       };

       $response = [
                    'data' => $data,
                    'section' => $section,
                    'sliders' => $sliders,
                    'testimonials' => $testimonials,
                    'departmentSectionImage' => $data ? $decodeJson($data->departmentSectionImage ?? '') : null,
                 //   'slider' => json_decode($data->slider, true),
                    'sectionAbout' => $data ? $decodeJson($data->sectionAbout ?? '') : null,
                    'vision' => $data->vision ?? '',
                    'mission' => $data->mission ?? '',
                    'coreValue' => $data->coreValue ?? '',
                   // 'testimonial' => json_decode($data->testimonial, true),
                    'programmeEducationalObjectives' => $data ? $decodeJson($data->programmeEducationalObjectives ?? '') : null,
                    'programmeOutcomes' => $data ? $decodeJson($data->programmeOutcomes ?? '') : null,
                    'programmeSpecificOutcomes' => $data ? $decodeJson($data->programmeSpecificOutcomes ?? '') : null,
                    'contact' => $data ? $decodeJson($data->contact ?? '') : null,
                    'department' => $department,
                    'decodeJson' => $decodeJson // Make helper available in views
                ];

        // Return the appropriate view based on the section
        $viewName = 'web.department-' . $section;
        
        // Check if the specific view exists, otherwise fall back to department-single
        if (view()->exists($viewName)) {
            return view($viewName, $response);
        }
        
        return view('web.department-single', $response);
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
