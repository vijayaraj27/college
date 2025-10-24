<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web\UpcomingEvent;
use App\Models\Department;
use App\Traits\FileUploader;
use Toastr;

class UpcomingEventController extends Controller
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
        $this->title   = 'Upcoming Event';
        $this->route   = 'admin.upcoming-event';
        $this->view    = 'admin.web.upcoming-event';
        $this->path    = 'upcoming-event';
        $this->access  = 'upcoming-event';

        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;

        $query = UpcomingEvent::query();

        // Filter by department (NULL for home page, ID for specific department)
        if ($request->has('department_id')) {
            if ($request->department_id === 'home') {
                $query->whereNull('department_id');
            } else {
                $query->where('department_id', $request->department_id);
            }
        }

        $data['rows'] = $query->with('department')->orderBy('event_date', 'desc')->get();
        $data['departments'] = Department::where('status', 1)->orderBy('title')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['access'] = $this->access;
        $data['departments'] = Department::where('status', 1)->orderBy('title')->get();

        return view($this->view.'.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191',
            'event_date' => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        // image upload, fit and store inside public folder 
        if($request->hasFile('attach')){
            $file = $this->uploadFile($request, 'attach', $this->path, 800, 600);
        }

        // Insert Data
        $event = new UpcomingEvent;
        $event->department_id = $request->department_id === 'home' ? null : $request->department_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->venue = $request->venue;
        $event->link = $request->link;
        $event->attach = $file ?? null;
        $event->status = $request->status;
        $event->display_order = $request->display_order ?? 0;
        $event->save();

        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UpcomingEvent $upcomingEvent)
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['row']    = $upcomingEvent;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpcomingEvent $upcomingEvent)
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;
        $data['row']    = $upcomingEvent;
        $data['departments'] = Department::where('status', 1)->orderBy('title')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpcomingEvent $upcomingEvent)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191',
            'event_date' => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        // image upload, fit and store inside public folder 
        if($request->hasFile('attach')){
            $file = $this->uploadFile($request, 'attach', $this->path, 800, 600);
            $this->removeFile('uploads/'.$this->path.'/', $upcomingEvent->attach);
        }

        // Update Data
        $upcomingEvent->department_id = $request->department_id === 'home' ? null : $request->department_id;
        $upcomingEvent->title = $request->title;
        $upcomingEvent->description = $request->description;
        $upcomingEvent->event_date = $request->event_date;
        $upcomingEvent->event_time = $request->event_time;
        $upcomingEvent->venue = $request->venue;
        $upcomingEvent->link = $request->link;
        $upcomingEvent->attach = $file ?? $upcomingEvent->attach;
        $upcomingEvent->status = $request->status;
        $upcomingEvent->display_order = $request->display_order ?? 0;
        $upcomingEvent->save();

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpcomingEvent $upcomingEvent)
    {
        // Delete Data
        $this->removeFile('uploads/'.$this->path.'/', $upcomingEvent->attach);
        $upcomingEvent->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}

