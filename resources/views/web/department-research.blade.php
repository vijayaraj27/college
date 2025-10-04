@extends('web.layouts.master')
@section('title', $department->title . ' - Research')
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
                                <h2>Research - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Research</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Research Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Research</h2>
                            
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
                                            <img src="{{ asset('uploads/research/' . $data->imageFile) }}" alt="Research" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->phdHoldersList)
                                    @php
                                        $phdHolders = $decodeJson($data->phdHoldersList);
                                    @endphp
                                    @if($phdHolders && is_array($phdHolders))
                                        <div class="inner-column">
                                            <h4>PhD Holders</h4>
                                            <div class="phd-holders-list">
                                                @foreach($phdHolders as $holder)
                                                    @if(is_array($holder))
                                                        <div class="holder-item">
                                                            <h5>{{ $holder['name'] ?? '' }}</h5>
                                                            <p><strong>Specialization:</strong> {{ $holder['specialization'] ?? '' }}</p>
                                                            <p><strong>University:</strong> {{ $holder['university'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                
                                @if($data->supervisor)
                                    @php
                                        $supervisors = $decodeJson($data->supervisor);
                                    @endphp
                                    @if($supervisors && is_array($supervisors))
                                        <div class="inner-column">
                                            <h4>Research Supervisors</h4>
                                            <div class="supervisors-list">
                                                @foreach($supervisors as $supervisor)
                                                    @if(is_array($supervisor))
                                                        <div class="supervisor-item">
                                                            <h5>{{ $supervisor['name'] ?? '' }}</h5>
                                                            <p><strong>Area:</strong> {{ $supervisor['area'] ?? '' }}</p>
                                                            <p><strong>Students:</strong> {{ $supervisor['students'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Research information for {{$department->title}} is being updated. Please check back later.</p>
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
        <!--End Research Detail -->
    </main>
    <!-- main-area-end -->
@endsection
