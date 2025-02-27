@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            @can($access.'-create')
            <div class="col-md-4">
                <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('btn_create') }} {{ $title }}</h5>
                        </div>
                        <div class="card-block">
                            <!-- Form Start -->
                          <div class="form-group">
                                <label for="faculty">{{ __('field_department') }} <span>*</span></label>
                                <select class="form-control" name="department" id="department" required>
                                    <option value="">{{ __('select') }}</option>
                                    @foreach( $departments as $department )
                                    <option value="{{ $department->id }}" @if(old('department') == $department->id) selected @endif>{{ $department->title }}</option>
                                    @endforeach  
                                </select>
                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_faculty') }}
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="title" class="form-label">{{ __('field_title') }} <span>*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('Program') }}" required>
                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_title') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shortcode" class="form-label">{{ __('field_shortcode') }} <span>*</span></label>
                                <input type="text" class="form-control" name="shortcode" id="shortcode" value="{{ old('shortcode') }}" required>
                                <div class="invalid-feedback">
                                  {{ __('required_field') }} {{ __('field_shortcode') }}
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="switch d-inline m-r-10">
                                    <input type="checkbox" id="switch" name="registration" value="1" checked>
                                    <label for="switch" class="cr"></label>
                                </div>
                                <label>{{ __('field_registration') }}</label>
                            </div> --}}
                            <!-- Form End -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @endcan
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_shortcode') }}</th>
                                        <th>{{ __('Department') }}</th>
                                        {{-- <th>{{ __('field_registration') }}</th> --}}
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                              {{--  <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->shortcode }}</td>
                                        <td>{{ $row->department->title ?? '' }}</td>
                                          <td>
                                            @if( $row->registration == 1 )
                                            <span class="badge badge-primary">{{ __('status_open') }}</span>
                                            @else
                                            <span class="badge badge-warning">{{ __('status_close') }}</span>
                                            @endif
                                        </td>  
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can($access.'-edit')
                                            <button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <!-- Include Edit modal -->
                                            @include($view.'.edit')
                                            @endcan
                                            @can($access.'-delete')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->
@endsection