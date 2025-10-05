@extends('web.layouts.department')

@section('page-icon', 'fa-microscope')
@section('page-description', 'Research Activities and Projects')

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

        <!-- Research Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/research/' . $data->imageFile) }}" 
                     alt="Department Research" 
                     class="img-fluid rounded shadow-lg research-banner">
            </div>
        </div>
        @endif

        <!-- PhD Holders List -->
        @if(!empty($data->phdHoldersList))
        @php
            $phdHolders = is_string($data->phdHoldersList) ? json_decode($data->phdHoldersList, true) : $data->phdHoldersList;
        @endphp
        @if(is_array($phdHolders) && count($phdHolders) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="research-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-graduation-cap text-primary"></i> PhD Holders
                    </h2>
                    <div class="phd-holders-grid">
                        @foreach($phdHolders as $index => $holder)
                        <div class="phd-holder-item p-4 mb-4 border rounded">
                            <div class="phd-holder-content">
                                <div class="phd-holder-header">
                                    <h4 class="phd-holder-name">
                                        <i class="fa fa-user text-primary"></i>
                                        {{ $holder['nameOfThePhdHolder'] ?? 'PhD Holder ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($holder['yearOfAward']))
                                    <span class="phd-year badge badge-primary">
                                        <i class="fa fa-calendar"></i> {{ $holder['yearOfAward'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="phd-holder-details">
                                    @if(!empty($holder['facultyUnderWhichPhdAwarded']))
                                    <p class="phd-faculty">
                                        <strong>Faculty:</strong> {{ $holder['facultyUnderWhichPhdAwarded'] }}
                                    </p>
                                    @endif
                                    @if(!empty($holder['areaOfResearch']))
                                    <p class="phd-area">
                                        <strong>Research Area:</strong> {{ $holder['areaOfResearch'] }}
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

        <!-- Anna University Recognized Supervisors -->
        @if(!empty($data->annaUniversityRecognizedSuperviorsNameList))
        @php
            $supervisors = is_string($data->annaUniversityRecognizedSuperviorsNameList) ? json_decode($data->annaUniversityRecognizedSuperviorsNameList, true) : $data->annaUniversityRecognizedSuperviorsNameList;
        @endphp
        @if(is_array($supervisors) && count($supervisors) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="research-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-user-md text-success"></i> Anna University Recognized Supervisors
                    </h2>
                    <div class="supervisors-grid">
                        @foreach($supervisors as $index => $supervisor)
                        <div class="supervisor-item p-4 mb-4 border rounded">
                            <div class="supervisor-content">
                                <div class="supervisor-header">
                                    <h4 class="supervisor-name">
                                        <i class="fa fa-user text-success"></i>
                                        {{ $supervisor['nameOfTheSupervior'] ?? 'Supervisor ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($supervisor['AnnaUniversityRecognitionNo']))
                                    <span class="recognition-no badge badge-success">
                                        <i class="fa fa-certificate"></i> {{ $supervisor['AnnaUniversityRecognitionNo'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="supervisor-details">
                                    @if(!empty($supervisor['areaOfResearch']))
                                    <p class="supervisor-area">
                                        <strong>Research Area:</strong> {{ $supervisor['areaOfResearch'] }}
                                    </p>
                                    @endif
                                    <div class="supervisor-stats">
                                        @if(!empty($supervisor['noofCandidatesUnderDeptResearchCentre']))
                                        <span class="stat-item">
                                            <strong>Dept Research Centre:</strong> {{ $supervisor['noofCandidatesUnderDeptResearchCentre'] }}
                                        </span>
                                        @endif
                                        @if(!empty($supervisor['noofCandidatesUnderOtherUniversity']))
                                        <span class="stat-item">
                                            <strong>Other University:</strong> {{ $supervisor['noofCandidatesUnderOtherUniversity'] }}
                                        </span>
                                        @endif
                                        @if(!empty($supervisor['noofCandidatesPursuingPhd']))
                                        <span class="stat-item">
                                            <strong>Pursuing PhD:</strong> {{ $supervisor['noofCandidatesPursuingPhd'] }}
                                        </span>
                                        @endif
                                    </div>
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

        <!-- PhD Candidates Pursuing -->
        @if(!empty($data->listOfCandidatesPursuingPhdUnderDepartmentSupervisors))
        @php
            $candidates = is_string($data->listOfCandidatesPursuingPhdUnderDepartmentSupervisors) ? json_decode($data->listOfCandidatesPursuingPhdUnderDepartmentSupervisors, true) : $data->listOfCandidatesPursuingPhdUnderDepartmentSupervisors;
        @endphp
        @if(is_array($candidates) && count($candidates) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="research-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-users text-info"></i> PhD Candidates Pursuing
                    </h2>
                    <div class="candidates-grid">
                        @foreach($candidates as $index => $candidate)
                        <div class="candidate-item p-4 mb-3 border rounded">
                            <div class="candidate-content">
                                <div class="candidate-header">
                                    <h4 class="candidate-name">
                                        <i class="fa fa-user text-info"></i>
                                        {{ $candidate['nameOfTheCandidate'] ?? 'Candidate ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($candidate['yearOfRegistration']))
                                    <span class="registration-year badge badge-info">
                                        <i class="fa fa-calendar"></i> {{ $candidate['yearOfRegistration'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="candidate-details">
                                    @if(!empty($candidate['regNo']))
                                    <p class="candidate-reg">
                                        <strong>Registration No:</strong> {{ $candidate['regNo'] }}
                                    </p>
                                    @endif
                                    @if(!empty($candidate['supervisorName']))
                                    <p class="candidate-supervisor">
                                        <strong>Supervisor:</strong> {{ $candidate['supervisorName'] }}
                                    </p>
                                    @endif
                                    @if(!empty($candidate['universityRegistered']))
                                    <p class="candidate-university">
                                        <strong>University:</strong> {{ $candidate['universityRegistered'] }}
                                    </p>
                                    @endif
                                    @if(!empty($candidate['areaOfResearch']))
                                    <p class="candidate-area">
                                        <strong>Research Area:</strong> {{ $candidate['areaOfResearch'] }}
                                    </p>
                                    @endif
                                    @if(!empty($candidate['status']))
                                    <p class="candidate-status">
                                        <strong>Status:</strong> 
                                        <span class="badge badge-success">{{ $candidate['status'] }}</span>
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

        <!-- Department Faculties Pursuing PhD -->
        @if(!empty($data->listOfDepartmentFacultiesPursuingPhd))
        @php
            $facultyPhd = is_string($data->listOfDepartmentFacultiesPursuingPhd) ? json_decode($data->listOfDepartmentFacultiesPursuingPhd, true) : $data->listOfDepartmentFacultiesPursuingPhd;
        @endphp
        @if(is_array($facultyPhd) && count($facultyPhd) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="research-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-chalkboard-teacher text-warning"></i> Faculty Pursuing PhD
                    </h2>
                    <div class="faculty-phd-grid">
                        @foreach($facultyPhd as $index => $faculty)
                        <div class="faculty-phd-item p-4 mb-3 border rounded">
                            <div class="faculty-phd-content">
                                <div class="faculty-phd-header">
                                    <h4 class="faculty-phd-name">
                                        <i class="fa fa-user text-warning"></i>
                                        {{ $faculty['nameOfTheCandidate'] ?? 'Faculty ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($faculty['yearOfRegistration']))
                                    <span class="faculty-year badge badge-warning">
                                        <i class="fa fa-calendar"></i> {{ $faculty['yearOfRegistration'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="faculty-phd-details">
                                    @if(!empty($faculty['regNo']))
                                    <p class="faculty-reg">
                                        <strong>Registration No:</strong> {{ $faculty['regNo'] }}
                                    </p>
                                    @endif
                                    @if(!empty($faculty['supervisorName']))
                                    <p class="faculty-supervisor">
                                        <strong>Supervisor:</strong> {{ $faculty['supervisorName'] }}
                                    </p>
                                    @endif
                                    @if(!empty($faculty['universityRegistered']))
                                    <p class="faculty-university">
                                        <strong>University:</strong> {{ $faculty['universityRegistered'] }}
                                    </p>
                                    @endif
                                    @if(!empty($faculty['areaOfResearch']))
                                    <p class="faculty-area">
                                        <strong>Research Area:</strong> {{ $faculty['areaOfResearch'] }}
                                    </p>
                                    @endif
                                    @if(!empty($faculty['status']))
                                    <p class="faculty-status">
                                        <strong>Status:</strong> 
                                        <span class="badge badge-warning">{{ $faculty['status'] }}</span>
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

        <!-- PhD Awarded Under Department Supervisor -->
        @if(!empty($data->phdAwardedUnderDepartmentSupervisor))
        @php
            $phdAwarded = is_string($data->phdAwardedUnderDepartmentSupervisor) ? json_decode($data->phdAwardedUnderDepartmentSupervisor, true) : $data->phdAwardedUnderDepartmentSupervisor;
        @endphp
        @if(is_array($phdAwarded) && count($phdAwarded) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="research-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-trophy text-success"></i> PhD Awarded Under Department Supervisor
                    </h2>
                    <div class="phd-awarded-grid">
                        @foreach($phdAwarded as $index => $awarded)
                        <div class="phd-awarded-item p-4 mb-3 border rounded">
                            <div class="phd-awarded-content">
                                <div class="phd-awarded-header">
                                    <h4 class="phd-awarded-name">
                                        <i class="fa fa-user text-success"></i>
                                        {{ $awarded['nameOfTheCandidate'] ?? 'PhD Awarded ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($awarded['yearOfAward']))
                                    <span class="award-year badge badge-success">
                                        <i class="fa fa-calendar"></i> {{ $awarded['yearOfAward'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="phd-awarded-details">
                                    @if(!empty($awarded['supervisorName']))
                                    <p class="awarded-supervisor">
                                        <strong>Supervisor:</strong> {{ $awarded['supervisorName'] }}
                                    </p>
                                    @endif
                                    @if(!empty($awarded['university']))
                                    <p class="awarded-university">
                                        <strong>University:</strong> {{ $awarded['university'] }}
                                    </p>
                                    @endif
                                    @if(!empty($awarded['areaOfResearch']))
                                    <p class="awarded-area">
                                        <strong>Research Area:</strong> {{ $awarded['areaOfResearch'] }}
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
        @if(empty($data->phdHoldersList) && empty($data->annaUniversityRecognizedSuperviorsNameList) && empty($data->listOfCandidatesPursuingPhdUnderDepartmentSupervisors) && empty($data->listOfDepartmentFacultiesPursuingPhd) && empty($data->phdAwardedUnderDepartmentSupervisor))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-flask fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Research Information Available</h3>
                    <p class="text-muted">Research information will be updated soon.</p>
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