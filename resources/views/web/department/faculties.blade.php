@extends('web.layouts.department')

@section('page-icon', 'fa-users')
@section('page-description', 'Meet Our Faculty Members')

@section('main-content')
</div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
<section class="section-padding">
    <div class="container">
        <!-- Page Title and Description -->
        @if(!empty($data->title))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h1 class="page-title">{{ $data->title }}</h1>
                @if(!empty($data->description))
                <div class="page-description">{!! $data->description !!}</div>
                @endif
            </div>
        </div>
        @endif

        <!-- Faculty Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/faculties/' . $data->imageFile) }}" 
                     alt="Department Faculties" 
                     class="img-fluid rounded shadow-lg faculty-banner">
            </div>
        </div>
        @endif

        <!-- Teaching Staff -->
        @if(!empty($data->teachingStaff))
        @php
            $teachingStaff = is_string($data->teachingStaff) ? json_decode($data->teachingStaff, true) : $data->teachingStaff;
        @endphp
        @if(is_array($teachingStaff) && count($teachingStaff) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="faculties-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-chalkboard-teacher text-primary"></i> Teaching Staff
                    </h2>
                    <div class="faculties-grid">
                        @foreach($teachingStaff as $index => $faculty)
                        <div class="faculty-item p-4 mb-4 border rounded">
                            <div class="faculty-content">
                                <div class="faculty-header">
                                    <h4 class="faculty-name">
                                        <i class="fa fa-user text-primary"></i>
                                        {{ $faculty['faculty'] ?? 'Faculty Member' }}
                                    </h4>
                                    @if(!empty($faculty['qualification']))
                                    <span class="faculty-qualification badge badge-info">
                                        {{ $faculty['qualification'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="faculty-details">
                                    @if(!empty($faculty['email']))
                                    <p class="faculty-email">
                                        <i class="fa fa-envelope text-muted"></i>
                                        <a href="mailto:{{ $faculty['email'] }}">{{ $faculty['email'] }}</a>
                                    </p>
                                    @endif
                                    @if(!empty($faculty['uniqueId']))
                                    <p class="faculty-id">
                                        <i class="fa fa-id-card text-muted"></i>
                                        <strong>ID:</strong> {{ $faculty['uniqueId'] }}
                                    </p>
                                    @endif
                                    @if(!empty($faculty['profileId']))
                                    <p class="faculty-profile">
                                        <i class="fa fa-user-circle text-muted"></i>
                                        <strong>Profile ID:</strong> {{ $faculty['profileId'] }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Non-Teaching Staff -->
        @if(!empty($data->nonTeachingStaff))
        @php
            $nonTeachingStaff = is_string($data->nonTeachingStaff) ? json_decode($data->nonTeachingStaff, true) : $data->nonTeachingStaff;
        @endphp
        @if(is_array($nonTeachingStaff) && count($nonTeachingStaff) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="faculties-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-users text-success"></i> Non-Teaching Staff
                    </h2>
                    <div class="faculties-grid">
                        @foreach($nonTeachingStaff as $index => $staff)
                        <div class="faculty-item p-4 mb-4 border rounded">
                            <div class="faculty-content">
                                <div class="faculty-header">
                                    <h4 class="faculty-name">
                                        <i class="fa fa-user text-success"></i>
                                        {{ $staff['name'] ?? 'Staff Member' }}
                                    </h4>
                                    @if(!empty($staff['qualification']))
                                    <span class="faculty-qualification badge badge-success">
                                        {{ $staff['qualification'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="faculty-details">
                                    @if(!empty($staff['designation']))
                                    <p class="faculty-designation">
                                        <i class="fa fa-briefcase text-muted"></i>
                                        <strong>Designation:</strong> {{ $staff['designation'] }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- No Data Message -->
        @if(empty($data->teachingStaff) && empty($data->nonTeachingStaff))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-users fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Faculty Information Available</h3>
                    <p class="text-muted">Faculty information will be updated soon.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
/* Page-specific styles can be added here */
</style>
@endpush

@push('scripts')
<script>
// Page-specific scripts can be added here
</script>
@endpush