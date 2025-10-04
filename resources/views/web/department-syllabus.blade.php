@extends('web.layouts.master')
@section('title', $department->title . ' - Syllabus')
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
                                <h2>Syllabus - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Syllabus</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Syllabus Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Syllabus</h2>
                            
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
                                            <img src="{{ asset('uploads/syllabus/' . $data->imageFile) }}" alt="Syllabus" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->syllabusDetails)
                                    @php
                                        $syllabusDetails = $decodeJson($data->syllabusDetails);
                                    @endphp
                                    @if($syllabusDetails && is_array($syllabusDetails))
                                        <div class="inner-column">
                                            <h4>Syllabus Documents</h4>
                                            <div class="syllabus-list">
                                                @foreach($syllabusDetails as $syllabus)
                                                    @if(is_array($syllabus))
                                                        <div class="syllabus-item">
                                                            <h5>{{ $syllabus['title'] ?? '' }}</h5>
                                                            <p><strong>Program:</strong> {{ $syllabus['program'] ?? '' }}</p>
                                                            <p><strong>Year:</strong> {{ $syllabus['year'] ?? '' }}</p>
                                                            <p>{{ $syllabus['description'] ?? '' }}</p>
                                                            @if(isset($syllabus['file']))
                                                                <a href="{{ asset('uploads/syllabus/' . $syllabus['file']) }}" class="btn btn-primary" download>Download Syllabus</a>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Syllabus information for {{$department->title}} is being updated. Please check back later.</p>
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
        <!--End Syllabus Detail -->
    </main>
    <!-- main-area-end -->
@endsection
