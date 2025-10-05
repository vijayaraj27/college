@extends('web.layouts.department')

@section('page-icon', 'fa-trophy')
@section('page-description', 'Celebrating Excellence and Success')

@section('main-content')
<!-- Achievements Section -->
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

        <!-- Achievement Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="achievement-banner-container animate-fade-in-up">
                    <img src="{{ asset('uploads/achievements/' . $data->imageFile) }}" 
                         alt="Department Achievements" 
                         class="img-fluid rounded-3 shadow-lg achievement-banner">
                </div>
            </div>
        </div>
        @endif

        <!-- Staff Achievements -->
        @if(!empty($data->staffAchievements))
        @php
            $staffAchievements = is_string($data->staffAchievements) ? json_decode($data->staffAchievements, true) : $data->staffAchievements;
        @endphp
        @if(is_array($staffAchievements) && count($staffAchievements) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="achievements-section">
                    <div class="text-center mb-5">
                        <h2 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-users me-3"></i> Staff Achievements
                        </h2>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($staffAchievements as $index => $achievement)
                        <div class="col-lg-6">
                            <div class="achievement-item p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="achievement-content">
                                    <div class="achievement-header d-flex align-items-center mb-3">
                                        <span class="achievement-number badge bg-primary rounded-circle p-3 me-3 fw-bold">{{ $index + 1 }}</span>
                                        <h5 class="achievement-title fw-bold text-dark mb-0">Staff Achievement</h5>
                                    </div>
                                    <div class="achievement-text">
                                        <p class="text-muted lh-lg mb-0">{{ $achievement }}</p>
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

        <!-- Student Achievements -->
        @if(!empty($data->studentAchievements))
        @php
            $studentAchievements = is_string($data->studentAchievements) ? json_decode($data->studentAchievements, true) : $data->studentAchievements;
        @endphp
        @if(is_array($studentAchievements) && count($studentAchievements) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="achievements-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-graduation-cap text-success"></i> Student Achievements
                    </h2>
                    <div class="achievements-timeline">
                        @foreach($studentAchievements as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-4">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['achievements']) && is_array($yearData['achievements']))
                                <div class="achievements-list">
                                    @foreach($yearData['achievements'] as $achievement)
                                    <div class="achievement-item p-3 mb-2 border-left border-success">
                                        <div class="achievement-content">
                                            @if(!empty($achievement['title']))
                                            <h5 class="achievement-title">{{ $achievement['title'] }}</h5>
                                            @endif
                                            @if(!empty($achievement['description']))
                                            <p class="achievement-description mb-0">{!! $achievement['description'] !!}</p>
                                            @endif
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

        <!-- Student Achievements Table Format -->
        @if(!empty($data->studentAchievementsTableFormat))
        @php
            $tableAchievements = is_string($data->studentAchievementsTableFormat) ? json_decode($data->studentAchievementsTableFormat, true) : $data->studentAchievementsTableFormat;
        @endphp
        @if(is_array($tableAchievements) && count($tableAchievements) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="achievements-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-table text-warning"></i> Student Achievements (Table Format)
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Year</th>
                                    <th>Student Name</th>
                                    <th>Event Nature</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Organized By</th>
                                    <th>Awards</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tableAchievements as $yearData)
                                    @if(is_array($yearData) && isset($yearData['year']))
                                        @if(isset($yearData['achievements']) && is_array($yearData['achievements']))
                                            @foreach($yearData['achievements'] as $achievement)
                                            <tr>
                                                <td>{{ $yearData['year'] }}</td>
                                                <td>{{ $achievement['studentName'] ?? '-' }}</td>
                                                <td>{{ $achievement['eventNature'] ?? '-' }}</td>
                                                <td>{{ $achievement['eventName'] ?? '-' }}</td>
                                                <td>{{ $achievement['periodDate'] ?? '-' }}</td>
                                                <td>{{ $achievement['organizedBy'] ?? '-' }}</td>
                                                <td>
                                                    <span class="badge badge-success">{{ $achievement['awards'] ?? '-' }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Student Achievements Appreciation List -->
        @if(!empty($data->studentAchievementsAppeciationList))
        @php
            $appreciationList = is_string($data->studentAchievementsAppeciationList) ? json_decode($data->studentAchievementsAppeciationList, true) : $data->studentAchievementsAppeciationList;
        @endphp
        @if(is_array($appreciationList) && count($appreciationList) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="achievements-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-star text-warning"></i> Student Appreciation List
                    </h2>
                    <div class="appreciation-list">
                        @foreach($appreciationList as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-4">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['appreciations']) && is_array($yearData['appreciations']))
                                <div class="appreciations-grid">
                                    @foreach($yearData['appreciations'] as $appreciation)
                                    <div class="appreciation-item p-3 mb-3 border rounded bg-light">
                                        <div class="appreciation-content">
                                            @if(!empty($appreciation['studentName']))
                                            <h5 class="appreciation-student">
                                                <i class="fa fa-user text-primary"></i> {{ $appreciation['studentName'] }}
                                            </h5>
                                            @endif
                                            @if(!empty($appreciation['achievement']))
                                            <p class="appreciation-text mb-0">{{ $appreciation['achievement'] }}</p>
                                            @endif
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

        <!-- No Data Message -->
        @if(empty($data->staffAchievements) && empty($data->studentAchievements) && empty($data->studentAchievementsTableFormat) && empty($data->studentAchievementsAppeciationList))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-trophy fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Achievements Available</h3>
                    <p class="text-muted">Achievement information will be updated soon.</p>
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