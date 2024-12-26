<?php
namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Models\Web\CallToAction;
use App\Models\Web\Testimonial;
use Illuminate\Http\Request;
use App\Models\Web\AboutUs;
use App\Models\Web\Homeabout; // Add the Homeabout model
use App\Models\Web\Feature;
use App\Models\Web\Slider;
use App\Models\Language;

class HomeController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Check if the current page is the homepage
        $isHomepage = $request->route()->getName() === 'home';

        // Sliders
        $data['sliders'] = Slider::where('language_id', Language::version()->id)
                           ->where('status', '1')
                            ->where('department_id', '0')
                            ->orderBy('id', 'asc')
                            ->get();
        // Features
        $data['features'] = Feature::where('language_id', Language::version()->id)
                            ->where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();
        // About Us or Home About based on the page
        if ($isHomepage) {
            $data['about'] = Homeabout::where('language_id', Language::version()->id)->first();
        } else {
            $data['about'] = AboutUs::where('language_id', Language::version()->id)->first();
        }
        // Call To Action
        $data['callToAction'] = CallToAction::where('language_id', Language::version()->id)
                            ->where('status', '1')
                            ->first();
        // Testimonials                                
        $data['testimonials'] = Testimonial::where('language_id', Language::version()->id)
                            ->where('status', '1')
                            ->where('department_id', '0')
                            ->orderBy('id', 'desc')
                            ->get();
        return view('web.index', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setCookie(Request $request)
    {
        if (Cookie::get('sidebar') != 'navbar-collapsed') {
            Cookie::queue(Cookie::make('sidebar', 'navbar-collapsed', 60 * 60 * 24 * 365));
        } else {
            Cookie::queue(Cookie::make('sidebar', 'navbar-expeded', 60 * 60 * 24 * 365));
        }
        return response()->json(['data' => Cookie::get('sidebar')]);
    }
}