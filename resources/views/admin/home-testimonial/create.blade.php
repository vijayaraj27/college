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
                            <i class="fas fa-info-circle"></i> This will create a testimonial for the <strong>Home Page</strong>.
                        </div>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <form action="{{ route($route.'.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('field_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_name') }}
                                    </div>
                                </div>

                                <!-- Designation -->
                                <div class="form-group col-md-6">
                                    <label for="designation">{{ __('field_designation') }}</label>
                                    <input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation') }}">
                                </div>

                                <!-- Rating -->
                                <div class="form-group col-md-6">
                                    <label for="rating">{{ __('field_rating') }}</label>
                                    <select class="form-control" name="rating" id="rating">
                                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                                    </select>
                                </div>

                                <!-- Photo -->
                                <div class="form-group col-md-6">
                                    <label for="attach">{{ __('field_photo') }} <span>*</span></label>
                                    <input type="file" class="form-control" name="attach" id="attach" accept="image/*" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_photo') }}
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group col-md-12">
                                    <label for="description">{{ __('field_description') }} <span>*</span></label>
                                    <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description') }}</textarea>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_description') }}
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
