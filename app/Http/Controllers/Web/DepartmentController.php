<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web\Department;
use App\Models\Language;
use App\Models\Web\Slider;
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
    public function show($slug)
    {
        try {
            // Get the department details
            $department = Department::where('slug', $slug)
                                    ->where('status', '1')
                                    ->firstOrFail();
            // Get sliders related to the department
            $sliders = Slider::where('language_id', Language::version()->id)
                             ->where('department_id', $department->id) // Filter by department ID
                             ->where('status', '1')
                             ->orderBy('id', 'asc')
                             ->get();
            // Pass department and sliders data to the view
            $data = [
                'department' => $department,
                'sliders' => $sliders
            ];
            return view('web.department-single', $data);
        } catch (\Exception $e) {
            // Log or display the error message
            dd($e->getMessage());
        }
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
