@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('create') }}</h5>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> This will create a slider for the <strong>Home Page</strong>.
                        </div>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <form action="{{ route($route.'.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Title -->
                                <div class="form-group col-md-6">
                                    <label for="title">{{ __('field_title') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_title') }}
                                    </div>
                                </div>

                                <!-- Sub Title -->
                                <div class="form-group col-md-6">
                                    <label for="sub_title">{{ __('field_sub_title') }}</label>
                                    <textarea class="form-control" name="sub_title" id="sub_title" rows="3">{{ old('sub_title') }}</textarea>
                                </div>

                                <!-- Button Text -->
                                <div class="form-group col-md-6">
                                    <label for="button_text">{{ __('field_button_text') }}</label>
                                    <input type="text" class="form-control" name="button_text" id="button_text" value="{{ old('button_text') }}">
                                </div>

                                <!-- Button Link -->
                                <div class="form-group col-md-6">
                                    <label for="button_link">{{ __('field_button_link') }}</label>
                                    <input type="url" class="form-control" name="button_link" id="button_link" value="{{ old('button_link') }}">
                                </div>

                                <!-- Image -->
                                <div class="form-group col-md-6">
                                    <label for="attach">{{ __('field_thumbnail') }} <span>*</span></label>
                                    <input type="file" class="form-control" name="attach" id="attach" accept="image/*" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_thumbnail') }}
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group col-md-6">
                                    <label for="status">{{ __('field_status') }} <span>*</span></label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('status_active') }}</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('status_inactive') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_status') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
