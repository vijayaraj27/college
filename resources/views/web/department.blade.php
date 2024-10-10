@extends('web.layouts.master')
@section('title', __('Department'))
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Department</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Department') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- course-area -->
        <section class="shop-area pt-120 pb-120 p-relative " data-animation="fadeInUp animated" data-delay=".2s">
            <div class="container">
                <div class="row align-items-center">
                    @foreach($departments as $department)
                        @foreach($department as $dept)
                            <div class="col-lg-4 col-md-6 ">
                                <div class="courses-item mb-30 hover-zoomin">
                                    <div class="thumb fix">
                                        <a href="#">
                                            <img src="{{ asset('uploads/course/couress_img_2_1692962832.jpg') }}"  alt="Course"> 
                                        </a>
                                    {{--<a href="{{ route('department.single', ['slug' => $department->slug]) }}">
                                            <img src="{{ asset('uploads/course/'.$department->attach) }}" alt="Course"> 
                                        </a>  --}}
                                    </div>
                                    <div class="courses-content w-100">                                    
                                        <div class="cat"><i class="fal fa-graduation-cap"></i> {{ $dept->shortcode }}</div>
                                        <h3><a href="#">{{ $dept->title }}</a></h3>
                                        {{-- <p>{!! str_limit(strip_tags($dept->description), 120, ' ...') !!}</p> --}}
                                        <a href="{{ route('department.single', ['slug' => $dept->slug]) }}" class="readmore">{{ __('btn_read_more') }} <i class="fal fa-long-arrow-right"></i></a>    
                                        {{----}}
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('web/img/icon/cou-icon.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
        <!-- course-area-end -->
    </main>
    <!-- main-area-end -->
@endsection