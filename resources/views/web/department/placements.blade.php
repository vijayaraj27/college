@extends('web.layouts.department')

@section('page-icon', 'fa-briefcase')
@section('page-description', 'Career Opportunities and Placements')

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

        <!-- Placement Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/placements/' . $data->imageFile) }}" 
                     alt="Department Placements" 
                     class="img-fluid rounded shadow-lg placement-banner">
            </div>
        </div>
        @endif

        <!-- Placement Statistics -->
        @if(!empty($data->placementStatistics))
        @php
            $placementStats = is_string($data->placementStatistics) ? json_decode($data->placementStatistics, true) : $data->placementStatistics;
        @endphp
        @if(is_array($placementStats) && count($placementStats) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="placement-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-chart-bar text-primary"></i> Placement Statistics
                    </h2>
                    <div class="stats-grid">
                        @foreach($placementStats as $stat)
                        <div class="stat-item p-4 mb-3 border rounded text-center">
                            <div class="stat-content">
                                <h3 class="stat-number">{{ $stat['number'] ?? '0' }}</h3>
                                <p class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Student Placements -->
        @if(!empty($data->studentPlaced))
        @php
            $studentPlacements = is_string($data->studentPlaced) ? json_decode($data->studentPlaced, true) : $data->studentPlaced;
        @endphp
        @if(is_array($studentPlacements) && count($studentPlacements) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="placement-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-graduation-cap text-success"></i> Student Placements
                    </h2>
                    <div class="placements-timeline">
                        @foreach($studentPlacements as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-5">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['placements']) && is_array($yearData['placements']))
                                <div class="placements-list">
                                    @foreach($yearData['placements'] as $placement)
                                    <div class="placement-item p-4 mb-3 border rounded">
                                        <div class="placement-content">
                                            <div class="placement-header">
                                                <h5 class="placement-student">
                                                    <i class="fa fa-user text-primary"></i>
                                                    {{ $placement['studentName'] ?? 'Student' }}
                                                </h5>
                                                <span class="placement-company badge badge-success">
                                                    <i class="fa fa-building"></i> {{ $placement['companyName'] ?? 'Company' }}
                                                </span>
                                            </div>
                                            <div class="placement-details">
                                                @if(!empty($placement['studentRegNumber']))
                                                <p class="placement-reg">
                                                    <strong>Registration Number:</strong> {{ $placement['studentRegNumber'] }}
                                                </p>
                                                @endif
                                                @if(!empty($placement['package']))
                                                <p class="placement-package">
                                                    <strong>Package:</strong> {{ $placement['package'] }}
                                                </p>
                                                @endif
                                                @if(!empty($placement['position']))
                                                <p class="placement-position">
                                                    <strong>Position:</strong> {{ $placement['position'] }}
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

        <!-- Placement Table Format -->
        @if(!empty($data->studentPlaced) && is_string($data->studentPlaced))
        @php
            $placementTable = json_decode($data->studentPlaced, true);
        @endphp
        @if(is_array($placementTable) && count($placementTable) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="placement-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-table text-warning"></i> Placement Records
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Year</th>
                                    <th>Student Name</th>
                                    <th>Registration Number</th>
                                    <th>Company Name</th>
                                    <th>Position</th>
                                    <th>Package</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($placementTable as $yearData)
                                    @if(is_array($yearData) && isset($yearData['year']))
                                        @if(isset($yearData['placements']) && is_array($yearData['placements']))
                                            @foreach($yearData['placements'] as $placement)
                                            <tr>
                                                <td>{{ $yearData['year'] }}</td>
                                                <td>{{ $placement['studentName'] ?? '-' }}</td>
                                                <td>{{ $placement['studentRegNumber'] ?? '-' }}</td>
                                                <td>{{ $placement['companyName'] ?? '-' }}</td>
                                                <td>{{ $placement['position'] ?? '-' }}</td>
                                                <td>
                                                    <span class="badge badge-info">{{ $placement['package'] ?? '-' }}</span>
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

        <!-- No Data Message -->
        @if(empty($data->studentPlaced) && empty($data->placementStatistics))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-briefcase fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Placement Information Available</h3>
                    <p class="text-muted">Placement information will be updated soon.</p>
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