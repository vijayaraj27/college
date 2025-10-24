@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_add') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-8">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_title') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="department_id">Department <span>*</span></label>
                            <select class="form-control" name="department_id" id="department_id">
                                <option value="home">Home Page</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->title }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} Department
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="event_date">Event Date <span>*</span></label>
                            <input type="date" class="form-control date" name="event_date" id="event_date" value="{{ old('event_date', date('Y-m-d')) }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} Event Date
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="event_time">Event Time</label>
                            <input type="text" class="form-control" name="event_time" id="event_time" value="{{ old('event_time') }}" placeholder="e.g. 10:00 AM">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} Event Time
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" name="venue" id="venue" value="{{ old('venue') }}" placeholder="e.g. Main Auditorium">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} Venue
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="link">External Link</label>
                            <input type="url" class="form-control" name="link" id="link" value="{{ old('link') }}" placeholder="https://example.com">

                            <div class="invalid-feedback">
                              Please enter a valid URL
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="attach">Event Image: <span>{{ __('image_size', ['height' => 600, 'width' => 800]) }}</span></label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} Event Image
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control texteditor" name="description" id="description" rows="5">{{ old('description') }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="display_order">Display Order</label>
                            <input type="number" class="form-control" name="display_order" id="display_order" value="{{ old('display_order', 0) }}">
                            <small class="form-text text-muted">Lower numbers appear first</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">{{ __('field_status') }} <span>*</span></label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>{{ __('status_active') }}</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>{{ __('status_inactive') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_status') }}
                            </div>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
    <script src="{{ asset('dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/mohithg-switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection

