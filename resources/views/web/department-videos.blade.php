@extends('web.layouts.master')
@section('title', $department->title . ' - Video Materials')
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
                                <h2>Video Materials - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Materials</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Video Materials Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Video Materials</h2>
                            
                            @if(isset($data) && $data)
                                @if($data->title)
                                    <h3>{{ $data->title }}</h3>
                                @endif
                                
                                @if($data->description)
                                    <div class="inner-column">
                                        <p>{!! $data->description !!}</p>
                                    </div>
                                @endif
                                
                                @if($data->videoUrl)
                                    <div class="video-container">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{ $data->videoUrl }}" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($data->imageFile)
                                    <div class="upper-box">
                                        <figure class="image">
                                            <img src="{{ asset('uploads/videomaterials/' . $data->imageFile) }}" alt="Video Materials" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Video materials for {{$department->title}} are being updated. Please check back later.</p>
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
        <!--End Video Materials Detail -->
    </main>
    <!-- main-area-end -->
@endsection
