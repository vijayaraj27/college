<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web\NotificationBoard;
use App\Models\Department;
use App\Traits\FileUploader;
use Toastr;

class NotificationBoardController extends Controller
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
        $this->title   = 'Notification';
        $this->route   = 'admin.notification-board';
        $this->view    = 'admin.web.notification-board';
        $this->path    = 'notification-board';
        $this->access  = 'notification-board';

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

        $query = NotificationBoard::query();

        // Filter by department (NULL for home page, ID for specific department)
        if ($request->has('department_id')) {
            if ($request->department_id === 'home') {
                $query->whereNull('department_id');
            } else {
                $query->where('department_id', $request->department_id);
            }
        }

        $data['rows'] = $query->with('department')->orderBy('notification_date', 'desc')->get();
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
            'notification_date' => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        // File upload
        if($request->hasFile('attach')){
            $file = $this->uploadFile($request, 'attach', $this->path, null, null, 5120); // 5MB max
        }

        // Insert Data
        $notification = new NotificationBoard;
        $notification->department_id = $request->department_id === 'home' ? null : $request->department_id;
        $notification->title = $request->title;
        $notification->description = $request->description;
        $notification->notification_date = $request->notification_date;
        $notification->link = $request->link;
        $notification->attach = $file ?? null;
        $notification->is_new = $request->is_new ?? 0;
        $notification->status = $request->status;
        $notification->display_order = $request->display_order ?? 0;
        $notification->save();

        Toastr::success(__('msg_created_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(NotificationBoard $notificationBoard)
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['row']    = $notificationBoard;

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotificationBoard $notificationBoard)
    {
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;
        $data['row']    = $notificationBoard;
        $data['departments'] = Department::where('status', 1)->orderBy('title')->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotificationBoard $notificationBoard)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191',
            'notification_date' => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        // File upload
        if($request->hasFile('attach')){
            $file = $this->uploadFile($request, 'attach', $this->path, null, null, 5120);
            $this->removeFile('uploads/'.$this->path.'/', $notificationBoard->attach);
        }

        // Update Data
        $notificationBoard->department_id = $request->department_id === 'home' ? null : $request->department_id;
        $notificationBoard->title = $request->title;
        $notificationBoard->description = $request->description;
        $notificationBoard->notification_date = $request->notification_date;
        $notificationBoard->link = $request->link;
        $notificationBoard->attach = $file ?? $notificationBoard->attach;
        $notificationBoard->is_new = $request->is_new ?? 0;
        $notificationBoard->status = $request->status;
        $notificationBoard->display_order = $request->display_order ?? 0;
        $notificationBoard->save();

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotificationBoard $notificationBoard)
    {
        // Delete Data
        $this->removeFile('uploads/'.$this->path.'/', $notificationBoard->attach);
        $notificationBoard->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}

