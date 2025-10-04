@extends('web.layouts.master')
@section('title', $department->title . ' - Activities')
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex p-relative align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Activities - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Activities</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Activities Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Activities</h2>
                            
                            @if(isset($data) && $data)
                                @if($data->title)
                                    <h3>{{ $data->title }}</h3>
                                @endif
                                
                                @if($data->description)
                                    <div class="inner-column">
                                        <p>{!! $data->description !!}</p>
                                    </div>
                                @endif
                                
                                @if($data->imageFile)
                                    <div class="upper-box">
                                        <figure class="image">
                                            <img src="{{ asset('uploads/activities/' . $data->imageFile) }}" alt="Activities" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->departmentActivity)
                                    @php
                                        $departmentActivities = $decodeJson($data->departmentActivity);
                                    @endphp
                                    @if($departmentActivities && is_array($departmentActivities))
                                        <div class="inner-column">
                                            <h4>Department Activities</h4>
                                            <div class="activities-list">
                                                @foreach($departmentActivities as $activity)
                                                    @if(is_array($activity))
                                                        <div class="activity-item">
                                                            <h5>{{ $activity['title'] ?? '' }}</h5>
                                                            <p><strong>Date:</strong> {{ $activity['date'] ?? '' }}</p>
                                                            <p><strong>Organizer:</strong> {{ $activity['organizer'] ?? '' }}</p>
                                                            <p>{{ $activity['description'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                
                                @if($data->studentParticipation)
                                    @php
                                        $studentParticipation = $decodeJson($data->studentParticipation);
                                    @endphp
                                    @if($studentParticipation && is_array($studentParticipation))
                                        <div class="inner-column">
                                            <h4>Student Participation</h4>
                                            <div class="participation-list">
                                                @foreach($studentParticipation as $participation)
                                                    @if(is_array($participation))
                                                        <div class="participation-item">
                                                            <h5>{{ $participation['event'] ?? '' }}</h5>
                                                            <p><strong>Students:</strong> {{ $participation['students'] ?? '' }}</p>
                                                            <p><strong>Date:</strong> {{ $participation['date'] ?? '' }}</p>
                                                            <p>{{ $participation['description'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                
                                @if($data->interInstituteEventsWinningPrize)
                                    @php
                                        $winners = $decodeJson($data->interInstituteEventsWinningPrize);
                                    @endphp
                                    @if($winners && is_array($winners))
                                        <div class="inner-column">
                                            <h4>Prize Winners</h4>
                                            <div class="winners-list">
                                                @foreach($winners as $winner)
                                                    @if(is_array($winner))
                                                        <div class="winner-item">
                                                            <h5>{{ $winner['event'] ?? '' }}</h5>
                                                            <p><strong>Winner:</strong> {{ $winner['name'] ?? '' }}</p>
                                                            <p><strong>Prize:</strong> {{ $winner['prize'] ?? '' }}</p>
                                                            <p><strong>Date:</strong> {{ $winner['date'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Activities information for {{$department->title}} is being updated. Please check back later.</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            @include('web.components.department-sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End Activities Detail -->
    </main>
    <!-- main-area-end -->
@endsection
