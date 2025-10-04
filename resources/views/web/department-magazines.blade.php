@extends('web.layouts.master')
@section('title', $department->title . ' - Course Materials')
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
                                <h2>Course Materials - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Course Materials Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Course Materials</h2>
                            
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
                                            <img src="{{ asset('uploads/magazines/' . $data->imageFile) }}" alt="Course Materials" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->magazineDetails)
                                    @php
                                        $magazineDetails = $decodeJson($data->magazineDetails);
                                    @endphp
                                    @if($magazineDetails && is_array($magazineDetails))
                                        <div class="inner-column">
                                            <h4>Course Materials</h4>
                                            <div class="materials-list">
                                                @foreach($magazineDetails as $material)
                                                    @if(is_array($material))
                                                        <div class="material-item">
                                                            <h5>{{ $material['title'] ?? '' }}</h5>
                                                            <p>{{ $material['description'] ?? '' }}</p>
                                                            @if(isset($material['file']))
                                                                <a href="{{ asset('uploads/magazines/' . $material['file']) }}" class="btn btn-primary" download>Download</a>
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
                                    <p>Course materials for {{$department->title}} are being updated. Please check back later.</p>
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
        <!--End Course Materials Detail -->
    </main>
    <!-- main-area-end -->
@endsection
