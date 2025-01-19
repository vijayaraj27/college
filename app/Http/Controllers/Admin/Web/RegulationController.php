<?php
namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Traits\FileUploader;
use Illuminate\Support\Str;
use Auth;
use App\Models\Regulation;
use Toastr;


class RegulationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('Regulation', 1);
        $this->route = 'admin.regulation';
        $this->view = 'admin.web.regulation';
        $this->path = 'regulation';
        $this->access = 'regulation';
        $this->middleware('permission:'.$this->access.'-view|'.$this->access.'-create|'.$this->access.'-edit|'.$this->access.'-delete', ['only' => ['index','show']]);
        $this->middleware('permission:'.$this->access.'-create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->access.'-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->access.'-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;
        $data['rows'] = Regulation::orderBy('name', 'asc')->get();
        return view($this->view.'.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'name' => 'required|max:191|unique:regulation,name',
        ]);
        // Insert Data
        $regulation = new Regulation;
        $regulation->name = $request->name;
      //  $regulation->slug = Str::slug($request->title, '-');
       // $regulation->description = $request->description;
        $regulation->save();
        Toastr::success(__('msg_created_successfully'), __('msg_success'));
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Regulation $regulation)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Regulation $regulation)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regulation $regulation)
    {
        // Field Validation
        $request->validate([
            'name' => 'required|max:191|unique:regulation,name,'.$regulation->id,
        ]);
        // Update Data
        $regulation->name = $request->name;
     //   $regulation->slug = Str::slug($request->title, '-');
     //   $regulation->description = $request->description;
        $regulation->status = $request->status;
        $regulation->save();
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulation $regulation)
    {
        // Delete Data
        $regulation->delete();
        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));
        return redirect()->back();
    }
}