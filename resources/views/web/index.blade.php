@extends('web.layouts.master')
@section('title', __('navbar_home'))
@section('social_meta_tags')
@if(isset($setting))
<meta property="og:type" content="website">
<meta property='og:site_name' content="{{ $setting->title }}" />
<meta property='og:title' content="{{ $setting->title }}" />
<meta property='og:description' content="{!! str_limit(strip_tags($setting->meta_description), 160, ' ...') !!}" />
<meta property='og:url' content="{{ route('home') }}" />
<meta property='og:image' content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
<meta name="twitter:creator" content="@HiTechParks" />
<meta name="twitter:url" content="{{ route('home') }}" />
<meta name="twitter:title" content="{{ $setting->title }}" />
<meta name="twitter:description" content="{!! str_limit(strip_tags($setting->meta_description), 160, ' ...') !!}" />
<meta name="twitter:image" content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
@endif
@endsection
@section('content')
<!-- main-area -->
<main>
    <!-- slider-area -->
    <section id="home" class="slider-area fix p-relative">
        <div class="slider-active" style="background: #141b22;">
            @foreach($sliders as $slider)
            <div class="single-slider slider-bg"
                style="background-image: url({{ asset('uploads/slider/'.$slider->attach) }}); background-size: cover;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="slider-content s-slider-content mt-130">
                                <h2 data-animation="fadeInUp" data-delay=".4s">{{ $slider->title }}</h2>
                                <p data-animation="fadeInUp" data-delay=".6s">{!! strip_tags($slider->sub_title,
                                    '<b><u><i><br>') !!}</p>
                                @if(isset($slider->button_link))
                                <div class="slider-btn mt-30">
                                    <a href="{{ $slider->button_link }}" target="_blank" class="btn ss-btn mr-15"
                                        data-animation="fadeInLeft" data-delay=".4s">{{ $slider->button_text }} <i
                                            class="fal fa-long-arrow-right"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 p-relative">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- <section id="count">
        <style>
        .hero {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(100, 235, 161, 0.671), rgba(255, 255, 255, 0.5)), url(https://cdn.pixabay.com/photo/2018/08/21/23/29/forest-3622519__340.jpg);
            background-position: center;
            background-size: cover;
            text-align: center;
            position: relative;
        }

        .title {
            width: 60%;
            display: inline-block;
            margin: 150px auto 0;
            color: #000;
            text-align: center;
        }

        .title h1 {
            margin-bottom: 30px;
        }

        .title p {
            font-size: 13px;
            line-height: 22px;
        }

        section#count .row {
            width: 85%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        section#count .col {
            flex-basis: 22%;
            text-align: center;
            color: #555;
        }

        .counter-box {
            width: 100%;
            height: 100%;
            background: #12192c;
            padding: 20px 0;
            border-radius: 10px;
            box-shadow: 0 0 20px -4px #66676c;
            color: #fff;
        }

        h4 {
            color: #fff;
        }

        h2,

        span {
            display: inline-block;
            margin: 15px 0;
            font-size: 50px;
            color: #fff;
        }

        .counter-box .fa {
            font-size: 40px;
            color: rgba(16, 211, 97, 0.603);
            display: block;
        }

        .credit a {
            text-decoration: none;
            color: #000;
        }

        .credit {
            margin-top: 10px;
            text-align: center;
        }
        </style>
        <div class="hero">
            <div class="title">
                <h1>ABOUT COMPANY</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="counter-box">
                        <i class="fa fa-BOOK"></i>
                        <h2 class="counter">215</h2>
                        <h4>PROJECTS</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="counter-box">
                        <i class="fa fa-users"></i>
                        <h2 class="counter">101</h2><span>k</span>
                        <h4>HAPPY CLIENTS</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="counter-box">
                        <i class="fa fa-USER"></i>
                        <h2 class="counter">205</h2>
                        <h4>TRAINED STUDENTS</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="counter-box">
                        <i class="fa fa-globe"></i>
                        <h2 class="counter">105</h2>
                        <h4>VISITED COUNTRIES</h4>
                    </div>
                </div>
            </div>

        </div>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

    </section> -->
    <!-- slider-area-end -->
    {{-- Comment line --}}
    <?php /*  @if(count($features) > 0)
        <!-- service-area -->
        <!-- <section class="service-details-two p-relative">
            <div class="container">
                <div class="row">
                    @foreach($features as $key => $feature)
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="services-box07 @if($key == 1) active @endif">
                            <div class="sr-contner">
                                <div class="icon">
                                    <img src="{{ asset('web/img/icon/sve-icon4.png') }}" alt="icon">
                                </div>
                                <div class="text">
                                    <h5>{{ $feature->title }}</h5>
                                    <p>{!! $feature->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section> -->
        <!-- service-area-end -->
        @endif
    */ ?>
    @isset($about)
    <!-- about-area -->
    <section class="about-area about-p pt-120 pb-120 p-relative fix" style="background: #eff7ff;">
        <div class="animations-02"><img src="{{ asset('web/img/bg/an-img-02.png') }}" alt="About"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="s-about-img p-relative wow fadeInLeft animated" data-animation="fadeInLeft"
                        data-delay=".4s">
                        <img src="{{ asset('uploads/about-us/'.$about->attach) }}" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content s-about-content pl-15 wow fadeInRight animated"
                        data-animation="fadeInRight" data-delay=".4s">
                        <div class="about-title second-title pb-25">
                            <h5><i class="fal fa-graduation-cap"></i> {{ $about->label }}</h5>
                            <h3>{{ $about->title }}</h3>

                            {!! $about->description !!}
                        </div>
                        {{-- {!! strip_tags($about->description, '<a><b><i><u><strong>') !!} --}}
                        {{-- 
                                <div class="about-content2">
                                <div class="row">
                                    <div class="col-md-12 pt-15">
                                        <ul class="green2">
                                            @isset($about->mission_title)
                                            <li>
                                                    <h3>{{ $about->mission_title }}</h3>
                        <div class="abcontent">
                            <div class="text">
                                <p>{!! strip_tags($about->mission_desc, '<a><b><i><u><strong>') !!}</p>
                                {!! $about->mission_desc !!}
                            </div>
                        </div>
                        </li>
                        @endisset
                        @isset($about->vision_title)
                        <li>
                            <h3>{{ $about->vision_title }}</h3>
                            <div class="abcontent">
                                <div class="text">
                                    <p>{!! strip_tags($about->vision_desc, '<a><b><i><u><strong>') !!}</p>
                                    {!! $about->vision_desc !!}
                                </div>
                            </div>
                        </li>
                        @endisset
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        </div>
        </div>
        </div>
    </section>
    {{-- white section --}}
    <section class="section-2 with-bg  pt-120 pb-120" id="feature">
        <div class="container">
            <div class="row align-items-center d-flex flex-wrap">
                <div class="col-lg-4 flex-box p-2 red-bg-home">
                    <div class="section-body">
                        <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="500" style="animation-duration: 1000ms;">Our Mission</h3>
                        <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700"
                            style="animation-duration: 1000ms;">
                            {!! $about->mission_desc !!}
                        </p>
                    </div>
                </div>
                <div class="flex-box col-lg-4 wow fadeInRight animated" data-animation="fadeInRightShorter"
                    data-delay="400" style="animation-duration: 1000ms;">
                    <figure>
                        <img src="{{ asset('uploads/web/mission.jpg') }}" alt="banner" width="332" height="350">
                    </figure>
                </div>
                <div class="flex-box col-lg-4 p-2 green-bg-home">
                    <div class="section-body">
                        <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="500" style="animation-duration: 1000ms;">Core Values</h3>
                        <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700"
                            style="animation-duration: 1000ms;">
                            {!! $about->core_value !!}
                        </p>
                    </div>
                </div>
                <div class="flex-box col-lg-4 wow fadeInRight animated" data-animation="fadeInRightShorter"
                    data-delay="400" style="animation-duration: 1000ms;">
                    <figure>
                        <img src="{{ asset('uploads/web/vision.jpg') }}" alt="banner" width="332" height="350">
                    </figure>
                </div>
                <div class="flex-box col-lg-4 p-2 organe-bg-home">
                    <div class="section-body p-2 ">
                        <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="500" style="animation-duration: 1000ms;">Our Vision</h3>
                        <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700"
                            style="animation-duration: 1000ms;">
                            {!! $about->vision_desc !!}
                        </p>
                    </div>
                </div>
                <div class="flex-box col-lg-4 wow fadeInRight animated" data-animation="fadeInRightShorter"
                    data-delay="400" style="animation-duration: 1000ms;">
                    <figure>
                        <img src="{{ asset('uploads/web/values.jpg') }}" alt="banner" width="332" height="350">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    {{-- bg-parallax --}}
    <section class="section-2 with-bg  pt-120 pb-120" style="background-image: url({{ asset('uploads/web/bg-parallax.jpg') }});background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: 50% 50%;">
        <div class="container bgparallax-effect d-flex flex-wrap justify-content-center">
            <div class="row align-items-center ">
                <div class="col-lg-12 section-2 with-bg p-5 h-auto  pt-120 pb-120">
                    <a href="#specific" class="btn btn-rounded with-border">PSR Replacement Cell</a>
                </div>
            </div>
        </div>
    </section>
    {{-- light blue color section --}}
    <section class="section-2 with-bg  pt-120 pb-120" id="scroll" style="background: #eff7ff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-body">
                        <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="500" style="animation-duration: 1000ms;">Upcoming Events</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                        <ul class="data-list scroll-list" data-autoscroll>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>21</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>22</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>23</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>24</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>25</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight animated" data-animation="fadeInRightShorter" data-delay="400"
                    style="animation-duration: 1000ms;">
                    <div class="section-body">
                        <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="500" style="animation-duration: 1000ms;">Notifications</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                        <ul class="data-list scroll-list" data-autoscroll>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>21</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>22</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>23</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>24</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                            <li>
                                <div class="event-content d-flex">
                                    <div class="date col-1"><strong>25</strong> Nov, 2026</div>
                                    <div class="text pl-10 col-11 align-self-center"><a href="#">
                                            <span class="lineclamp2">Lorem Ipsum is simply dummy text of the printing
                                                Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply
                                                dummy text of the printing </span>
                                        </a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->
    {{-- white section --}}
    <section class="section-2 with-bg  pt-120 pb-120" id="feature">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="section-body">
                        <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="500" style="animation-duration: 1000ms;">800+ Offers till date</h3>
                        <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700"
                            style="animation-duration: 1000ms;">
                            We provide placement to students and helps to achieve recruitments conducted by companies.
                            To expertise our students in order to settle in the recent industrial environment and almost
                            recruit them in Multi-National Companies.
                        </p>
                        <div class="mb-2 wow scrolling-box animated fadeInLeft" data-animation="fadeInLeft"
                            data-delay="900" style="animation-duration: 1000ms;">
                            <a href="#specific" class="btn btn-rounded with-border">PSR Replacement Cell</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight animated" data-animation="fadeInRightShorter" data-delay="400"
                    style="animation-duration: 1000ms;">
                    {{-- <figure>
                            <img src="{{ asset('uploads/about-us/'.$about->attach) }}" alt="banner" width="629"
                    height="455">
                    </figure> --}}
                    <div class="customer-logos">
                        <div class="slide"><img src="{{ asset('uploads/web/client/1.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/2.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/3.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/4.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/5.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/6.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/7.png')}}"></div>
                        <div class="slide"><img src="{{ asset('uploads/web/client/8.png')}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
    /* Slider */
    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }

    .slick-track:before,
    .slick-track:after {
        display: table;
        content: '';
    }

    .slick-track:after {
        clear: both;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }

    [dir='rtl'] .slick-slide {
        float: right;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }
    </style>
    @endisset
    @isset($callToAction)
    <!-- cta-area -->
    <section class="cta-area cta-bg pt-50 pb-50" style="background-color: #008B8B;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated"
                        data-delay=".2s">
                        <h2>{{ $callToAction->title }}</h2>
                        <p>{{ $callToAction->sub_title }}</p>
                    </div>
                </div>
                <div class="col-lg-4 text-right">
                    <div class="cta-btn s-cta-btn wow fadeInRight animated mt-30" data-animation="fadeInDown animated"
                        data-delay=".2s">
                        @if(isset($callToAction->button_link))
                        <a href="{{ $callToAction->button_link }}" target="_blank"
                            class="btn ss-btn smoth-scroll">{{ $callToAction->button_text }} <i
                                class="fal fa-long-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-area-end -->
    @endisset
    @if(count($testimonials) > 0)
    <!-- testimonial-area -->
    <section class="testimonial-area pt-120 pb-115 p-relative fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-active wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                        @foreach($testimonials as $testimonial)
                        <div class="single-testimonial text-center">
                            <div class="qt-img">
                                <img src="{{ asset('web/img/testimonial/qt-icon.png') }}" alt="img">
                            </div>
                            <p>{!! $testimonial->description !!}</p>
                            <div class="testi-author">
                                <img src="{{ asset('uploads/testimonial/'.$testimonial->attach) }}" alt="img">
                            </div>
                            <div class="ta-info">
                                <h6>{{ $testimonial->name }}</h6>
                                <span>{{ $testimonial->designation ?? '' }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
    @endif
</main>

<!-- main-area-end -->
@endsection