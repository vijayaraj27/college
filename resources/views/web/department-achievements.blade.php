@extends('web.layouts.master')
@section('title', $department->title . ' - Achievements')
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
                                <h2>Achievements - {{$department->short_title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Achievements</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Achievements Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Achievements</h2>
                            {{--    
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
                                            <img src="{{ asset('uploads/achievements/' . $data->imageFile) }}" alt="Achievements" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->staffAchievements)
                                    @php
                                        $staffAchievements = $decodeJson($data->staffAchievements);
                                    @endphp
                                    @if($staffAchievements && is_array($staffAchievements))
                                        <div class="inner-column">
                                            <h4>Staff Achievements</h4>
                                            <ul class="achievement-list">
                                                @foreach($staffAchievements as $achievement)
                                                    @if(is_string($achievement))
                                                        <li>{{ $achievement }}</li>
                                                    @elseif(is_array($achievement))
                                                        <li>{{ implode(', ', $achievement) }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endif
                                
                                @if($data->studentAchievements)
                                    @php
                                        $studentAchievements = $decodeJson($data->studentAchievements);
                                    @endphp
                                    @if($studentAchievements && is_array($studentAchievements))
                                        <div class="inner-column">
                                            <h4>Student Achievements</h4>
                                            <ul class="achievement-list">
                                                @foreach($studentAchievements as $achievement)
                                                    @if(is_string($achievement))
                                                        <li>{{ $achievement }}</li>
                                                    @elseif(is_array($achievement))
                                                        <li>{{ implode(', ', $achievement) }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Achievements information for {{$department->title}} is being updated. Please check back later.</p>
                                </div>
                            @endif

                            --}}

                        </div>
                        <div class="col-lg-3">
                            @include('web.components.department-sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End Achievements Detail -->
    </main>
    <!-- main-area-end -->
@endsection
