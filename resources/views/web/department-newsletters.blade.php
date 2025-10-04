@extends('web.layouts.master')
@section('title', $department->title . ' - Newsletter')
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
                                <h2>Newsletter - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Newsletter Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Newsletter</h2>
                            
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
                                            <img src="{{ asset('uploads/newsletters/' . $data->imageFile) }}" alt="Newsletter" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->newsletterDetails)
                                    @php
                                        $newsletterDetails = $decodeJson($data->newsletterDetails);
                                    @endphp
                                    @if($newsletterDetails && is_array($newsletterDetails))
                                        <div class="inner-column">
                                            <h4>Newsletter Issues</h4>
                                            <div class="newsletters-list">
                                                @foreach($newsletterDetails as $newsletter)
                                                    @if(is_array($newsletter))
                                                        <div class="newsletter-item">
                                                            <h5>{{ $newsletter['title'] ?? '' }}</h5>
                                                            <p><strong>Issue:</strong> {{ $newsletter['issue'] ?? '' }}</p>
                                                            <p><strong>Date:</strong> {{ $newsletter['date'] ?? '' }}</p>
                                                            <p>{{ $newsletter['description'] ?? '' }}</p>
                                                            @if(isset($newsletter['file']))
                                                                <a href="{{ asset('uploads/newsletters/' . $newsletter['file']) }}" class="btn btn-primary" download>Download Newsletter</a>
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
                                    <p>Newsletter information for {{$department->title}} is being updated. Please check back later.</p>
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
        <!--End Newsletter Detail -->
    </main>
    <!-- main-area-end -->
@endsection
