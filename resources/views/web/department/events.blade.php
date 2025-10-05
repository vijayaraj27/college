@extends('web.layouts.department')

@section('page-icon', 'fa-calendar-alt')
@section('page-description', 'Upcoming and Past Department Events')

@section('main-content')
<!-- Events Section -->
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

        <!-- Event Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/events/' . $data->imageFile) }}" 
                     alt="Department Events" 
                     class="img-fluid rounded shadow-lg event-banner">
            </div>
        </div>
        @endif

        <!-- Event Details -->
        @if(!empty($data->eventDetails))
        @php
            $eventDetails = is_string($data->eventDetails) ? json_decode($data->eventDetails, true) : $data->eventDetails;
        @endphp
        @if(is_array($eventDetails) && count($eventDetails) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="events-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-calendar text-primary"></i> Department Events
                    </h2>
                    <div class="events-grid">
                        @foreach($eventDetails as $index => $event)
                        <div class="event-item p-4 mb-4 border rounded">
                            <div class="event-content">
                                <div class="event-image mb-3">
                                    @if(!empty($event['imageFile']))
                                    <img src="{{ asset('uploads/events/' . $event['imageFile']) }}" 
                                         alt="{{ $event['title'] ?? 'Event Image' }}" 
                                         class="img-fluid rounded event-thumbnail">
                                    @endif
                                </div>
                                <div class="event-info">
                                    <h4 class="event-title">
                                        <i class="fa fa-star text-warning"></i>
                                        {{ $event['title'] ?? 'Event ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($event['description']))
                                    <p class="event-description">{!! $event['description'] !!}</p>
                                    @endif
                                    @if(!empty($event['date']))
                                    <div class="event-meta">
                                        <span class="event-date badge badge-info">
                                            <i class="fa fa-calendar"></i> {{ $event['date'] }}
                                        </span>
                                    </div>
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
        @if(empty($data->eventDetails))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-calendar fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Events Available</h3>
                    <p class="text-muted">Event information will be updated soon.</p>
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