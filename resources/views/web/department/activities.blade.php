@extends('web.layouts.department')

@section('page-icon', 'fa-calendar-check')
@section('page-description', 'Engaging Learning and Development Programs')

@section('main-content')
<!-- Activities Section -->
<section class="section-padding">
    <div class="container">
        <!-- Page Title and Description -->
        @if(!empty($data->title))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h1 class="page-title">{{ $data->title }}</h1>
                @if(!empty($data->description))
                <p class="page-description">{!! $data->description !!}</p>
                @endif
            </div>
        </div>
        @endif

        <!-- Activity Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/activities/' . $data->imageFile) }}" 
                     alt="Department Activities" 
                     class="img-fluid rounded shadow-lg activity-banner">
            </div>
        </div>
        @endif

        <!-- Department Activities -->
        @if(!empty($data->departmentActivity))
        @php
            $departmentActivities = is_string($data->departmentActivity) ? json_decode($data->departmentActivity, true) : $data->departmentActivity;
        @endphp
        @if(is_array($departmentActivities) && count($departmentActivities) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="activities-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-calendar-check-o text-primary"></i> Department Activities
                    </h2>
                    <div class="activities-timeline">
                        @foreach($departmentActivities as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-5">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['activities']) && is_array($yearData['activities']))
                                <div class="activities-list">
                                    @foreach($yearData['activities'] as $activity)
                                    <div class="activity-item p-4 mb-3 border rounded">
                                        <div class="activity-content">
                                            <div class="activity-header">
                                                <h5 class="activity-title">
                                                    <i class="fa fa-graduation-cap text-primary"></i>
                                                    {{ $activity['programmeTitle'] ?? 'Activity' }}
                                                </h5>
                                                <span class="activity-date badge badge-info">
                                                    <i class="fa fa-clock-o"></i> {{ $activity['duration'] ?? 'Date not specified' }}
                                                </span>
                                            </div>
                                            <div class="activity-details">
                                                @if(!empty($activity['teacherName']))
                                                <p class="activity-teacher">
                                                    <strong>Teacher:</strong> {{ $activity['teacherName'] }}
                                                </p>
                                                @endif
                                                @if(!empty($activity['organizer']))
                                                <p class="activity-organizer">
                                                    <strong>Organizer:</strong> {{ $activity['organizer'] }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Student Participation -->
        @if(!empty($data->studentParticipation))
        @php
            $studentParticipation = is_string($data->studentParticipation) ? json_decode($data->studentParticipation, true) : $data->studentParticipation;
        @endphp
        @if(is_array($studentParticipation) && count($studentParticipation) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="activities-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-users text-success"></i> Student Participation
                    </h2>
                    <div class="participation-timeline">
                        @foreach($studentParticipation as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-5">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['participations']) && is_array($yearData['participations']))
                                <div class="participations-list">
                                    @foreach($yearData['participations'] as $participation)
                                    <div class="participation-item p-4 mb-3 border rounded">
                                        <div class="participation-content">
                                            <div class="participation-header">
                                                <h5 class="participation-title">
                                                    <i class="fa fa-trophy text-warning"></i>
                                                    {{ $participation['eventName'] ?? 'Event' }}
                                                </h5>
                                                <span class="participation-date badge badge-success">
                                                    <i class="fa fa-calendar"></i> {{ $participation['eventDate'] ?? 'Date not specified' }}
                                                </span>
                                            </div>
                                            <div class="participation-details">
                                                @if(!empty($participation['conductedBy']))
                                                <p class="participation-organizer">
                                                    <strong>Conducted By:</strong> {{ $participation['conductedBy'] }}
                                                </p>
                                                @endif
                                                @if(!empty($participation['nameOfTheStudentsParticipated']))
                                                <div class="students-list">
                                                    <strong>Students Participated:</strong>
                                                    <p class="students-names">{{ $participation['nameOfTheStudentsParticipated'] }}</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Inter Institute Events Winning Prize -->
        @if(!empty($data->interInstituteEventsWinningPrize))
        @php
            $winningEvents = is_string($data->interInstituteEventsWinningPrize) ? json_decode($data->interInstituteEventsWinningPrize, true) : $data->interInstituteEventsWinningPrize;
        @endphp
        @if(is_array($winningEvents) && count($winningEvents) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="activities-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-trophy text-warning"></i> Inter Institute Events - Winning Prizes
                    </h2>
                    <div class="winning-events-timeline">
                        @foreach($winningEvents as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-5">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['events']) && is_array($yearData['events']))
                                <div class="events-list">
                                    @foreach($yearData['events'] as $event)
                                    <div class="event-item p-4 mb-3 border rounded bg-light">
                                        <div class="event-content">
                                            <div class="event-header">
                                                <h5 class="event-title">
                                                    <i class="fa fa-star text-warning"></i>
                                                    {{ $event['eventName'] ?? 'Event' }}
                                                </h5>
                                                <span class="event-prize badge badge-warning">
                                                    <i class="fa fa-trophy"></i> {{ $event['prize'] ?? 'Prize' }}
                                                </span>
                                            </div>
                                            <div class="event-details">
                                                @if(!empty($event['studentName']))
                                                <p class="event-student">
                                                    <strong>Student:</strong> {{ $event['studentName'] }}
                                                </p>
                                                @endif
                                                @if(!empty($event['organizedBy']))
                                                <p class="event-organizer">
                                                    <strong>Organized By:</strong> {{ $event['organizedBy'] }}
                                                </p>
                                                @endif
                                                @if(!empty($event['date']))
                                                <p class="event-date">
                                                    <strong>Date:</strong> {{ $event['date'] }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Industrial Visits -->
        @if(!empty($data->industrialVisit))
        @php
            $industrialVisits = is_string($data->industrialVisit) ? json_decode($data->industrialVisit, true) : $data->industrialVisit;
        @endphp
        @if(is_array($industrialVisits) && count($industrialVisits) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="activities-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-industry text-info"></i> Industrial Visits
                    </h2>
                    <div class="industrial-visits-list">
                        @foreach($industrialVisits as $visit)
                        <div class="visit-item p-4 mb-3 border rounded">
                            <div class="visit-content">
                                <div class="visit-header">
                                    <h5 class="visit-title">
                                        <i class="fa fa-building text-primary"></i>
                                        {{ $visit['nameOftheIndustry'] ?? 'Industrial Visit' }}
                                    </h5>
                                    <span class="visit-duration badge badge-info">
                                        <i class="fa fa-clock-o"></i> {{ $visit['Duration'] ?? 'Duration not specified' }}
                                    </span>
                                </div>
                                <div class="visit-details">
                                    @if(!empty($visit['semester']))
                                    <p class="visit-semester">
                                        <strong>Semester:</strong> {{ $visit['semester'] }}
                                    </p>
                                    @endif
                                    @if(!empty($visit['staffAccompanied']))
                                    <p class="visit-staff">
                                        <strong>Staff Accompanied:</strong> {{ $visit['staffAccompanied'] }}
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
        @if(empty($data->departmentActivity) && empty($data->studentParticipation) && empty($data->interInstituteEventsWinningPrize) && empty($data->industrialVisit))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-calendar fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Activities Available</h3>
                    <p class="text-muted">Activity information will be updated soon.</p>
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