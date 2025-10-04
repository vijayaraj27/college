@extends('web.layouts.master')
@section('title', $department->title . ' - Department Library')
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
                                <h2>Department Library - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Department Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Department Library Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Department Library</h2>
                            
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
                                            <img src="{{ asset('uploads/library/' . $data->imageFile) }}" alt="Department Library" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->libraryDetails)
                                    @php
                                        $libraryDetails = $decodeJson($data->libraryDetails);
                                    @endphp
                                    @if($libraryDetails && is_array($libraryDetails))
                                        <div class="inner-column">
                                            <h4>Library Resources</h4>
                                            <div class="library-resources">
                                                @foreach($libraryDetails as $resource)
                                                    @if(is_array($resource))
                                                        <div class="resource-item">
                                                            <h5>{{ $resource['title'] ?? '' }}</h5>
                                                            <p><strong>Category:</strong> {{ $resource['category'] ?? '' }}</p>
                                                            <p><strong>Count:</strong> {{ $resource['count'] ?? '' }}</p>
                                                            <p>{{ $resource['description'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Department library information for {{$department->title}} is being updated. Please check back later.</p>
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
        <!--End Department Library Detail -->
    </main>
    <!-- main-area-end -->
@endsection
