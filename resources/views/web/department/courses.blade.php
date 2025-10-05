@extends('web.layouts.department')

@section('page-icon', 'fa-book-open')
@section('page-description', 'Comprehensive Course Information')

@section('main-content')
<!-- Courses Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Page Title and Description -->
        @if(!empty($data->title))
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="page-title fw-bold text-primary mb-3 animate-fade-in">{{ $data->title }}</h1>
                @if(!empty($data->description))
                <p class="page-description lead text-muted animate-slide-up">{!! $data->description !!}</p>
                @endif
            </div>
        </div>
        @endif

        <!-- Course Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="course-banner-container animate-fade-in-up">
                    <img src="{{ asset('uploads/courses/' . $data->imageFile) }}" 
                         alt="Department Courses" 
                         class="img-fluid rounded-3 shadow-lg course-banner">
                </div>
            </div>
        </div>
        @endif

        <!-- Undergraduate Programs -->
        @if(!empty($data->undergraduatePrograms))
        @php
            $undergraduatePrograms = is_string($data->undergraduatePrograms) ? json_decode($data->undergraduatePrograms, true) : $data->undergraduatePrograms;
        @endphp
        @if(is_array($undergraduatePrograms) && count($undergraduatePrograms) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="programs-section">
                    <div class="text-center mb-5">
                        <h2 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-graduation-cap me-3"></i> Undergraduate Programs
                        </h2>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($undergraduatePrograms as $index => $program)
                        <div class="col-lg-6 col-xl-4">
                            <div class="program-card p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="program-icon mb-3">
                                    <i class="fas fa-laptop-code fa-3x text-primary"></i>
                                </div>
                                <h4 class="program-title fw-bold text-dark mb-3">
                                    {{ $program['programName'] ?? 'Program ' . ($index + 1) }}
                                </h4>
                                @if(!empty($program['duration']))
                                <div class="program-duration mb-3">
                                    <span class="badge bg-primary rounded-pill px-3 py-2">
                                        <i class="fas fa-clock me-2"></i>{{ $program['duration'] }}
                                    </span>
                                </div>
                                @endif
                                @if(!empty($program['description']))
                                <p class="program-description text-muted lh-lg mb-3">{!! $program['description'] !!}</p>
                                @endif
                                @if(!empty($program['eligibility']))
                                <div class="program-eligibility">
                                    <h6 class="fw-bold text-dark mb-2">Eligibility:</h6>
                                    <p class="text-muted small">{{ $program['eligibility'] }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Postgraduate Programs -->
        @if(!empty($data->postgraduatePrograms))
        @php
            $postgraduatePrograms = is_string($data->postgraduatePrograms) ? json_decode($data->postgraduatePrograms, true) : $data->postgraduatePrograms;
        @endphp
        @if(is_array($postgraduatePrograms) && count($postgraduatePrograms) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="programs-section">
                    <div class="text-center mb-5">
                        <h2 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-user-graduate me-3"></i> Postgraduate Programs
                        </h2>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($postgraduatePrograms as $index => $program)
                        <div class="col-lg-6 col-xl-4">
                            <div class="program-card p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="program-icon mb-3">
                                    <i class="fas fa-microscope fa-3x text-success"></i>
                                </div>
                                <h4 class="program-title fw-bold text-dark mb-3">
                                    {{ $program['programName'] ?? 'Program ' . ($index + 1) }}
                                </h4>
                                @if(!empty($program['duration']))
                                <div class="program-duration mb-3">
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        <i class="fas fa-clock me-2"></i>{{ $program['duration'] }}
                                    </span>
                                </div>
                                @endif
                                @if(!empty($program['description']))
                                <p class="program-description text-muted lh-lg mb-3">{!! $program['description'] !!}</p>
                                @endif
                                @if(!empty($program['eligibility']))
                                <div class="program-eligibility">
                                    <h6 class="fw-bold text-dark mb-2">Eligibility:</h6>
                                    <p class="text-muted small">{{ $program['eligibility'] }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Course Structure -->
        @if(!empty($data->courseStructure))
        @php
            $courseStructure = is_string($data->courseStructure) ? json_decode($data->courseStructure, true) : $data->courseStructure;
        @endphp
        @if(is_array($courseStructure) && count($courseStructure) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="course-structure-section">
                    <div class="text-center mb-5">
                        <h2 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-sitemap me-3"></i> Course Structure
                        </h2>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($courseStructure as $index => $semester)
                        <div class="col-lg-6">
                            <div class="semester-card p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="semester-header mb-4">
                                    <h4 class="semester-title fw-bold text-primary mb-2">
                                        <i class="fas fa-calendar-alt me-2"></i>{{ $semester['semesterName'] ?? 'Semester ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($semester['credits']))
                                    <span class="badge bg-info rounded-pill px-3 py-2">
                                        <i class="fas fa-star me-2"></i>{{ $semester['credits'] }} Credits
                                    </span>
                                    @endif
                                </div>
                                @if(!empty($semester['subjects']) && is_array($semester['subjects']))
                                <div class="subjects-list">
                                    <h6 class="fw-bold text-dark mb-3">Subjects:</h6>
                                    <ul class="list-unstyled">
                                        @foreach($semester['subjects'] as $subject)
                                        <li class="subject-item mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-book text-primary me-3"></i>
                                                <span class="text-muted">{{ $subject }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Admission Requirements -->
        @if(!empty($data->admissionRequirements))
        @php
            $admissionRequirements = is_string($data->admissionRequirements) ? json_decode($data->admissionRequirements, true) : $data->admissionRequirements;
        @endphp
        @if(is_array($admissionRequirements) && count($admissionRequirements) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="admission-section">
                    <div class="text-center mb-5">
                        <h2 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-clipboard-check me-3"></i> Admission Requirements
                        </h2>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($admissionRequirements as $index => $requirement)
                        <div class="col-lg-4 col-md-6">
                            <div class="requirement-card p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="requirement-icon mb-3">
                                    <i class="fas fa-check-circle fa-2x text-success"></i>
                                </div>
                                <h5 class="requirement-title fw-bold text-dark mb-3">
                                    {{ $requirement['title'] ?? 'Requirement ' . ($index + 1) }}
                                </h5>
                                @if(!empty($requirement['description']))
                                <p class="requirement-description text-muted lh-lg mb-0">{!! $requirement['description'] !!}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Career Opportunities -->
        @if(!empty($data->careerOpportunities))
        @php
            $careerOpportunities = is_string($data->careerOpportunities) ? json_decode($data->careerOpportunities, true) : $data->careerOpportunities;
        @endphp
        @if(is_array($careerOpportunities) && count($careerOpportunities) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="career-section">
                    <div class="text-center mb-5">
                        <h2 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-briefcase me-3"></i> Career Opportunities
                        </h2>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($careerOpportunities as $index => $career)
                        <div class="col-lg-3 col-md-6">
                            <div class="career-card p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="career-icon mb-3">
                                    <i class="fas fa-building fa-2x text-warning"></i>
                                </div>
                                <h6 class="career-title fw-bold text-dark mb-2">
                                    {{ $career['title'] ?? 'Career ' . ($index + 1) }}
                                </h6>
                                @if(!empty($career['description']))
                                <p class="career-description text-muted small lh-lg mb-0">{!! $career['description'] !!}</p>
                                @endif
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
        @if(empty($data->undergraduatePrograms) && empty($data->postgraduatePrograms) && empty($data->courseStructure) && empty($data->admissionRequirements) && empty($data->careerOpportunities))
        <div class="row">
            <div class="col-12">
                <div class="no-data-message text-center py-5">
                    <div class="no-data-icon mb-4">
                        <i class="fas fa-book fa-4x text-muted"></i>
                    </div>
                    <h3 class="text-muted mb-3">Course Information Coming Soon</h3>
                    <p class="text-muted lead">We are currently updating our course information. Please check back later.</p>
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