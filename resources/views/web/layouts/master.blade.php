<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @if(isset($setting))
    <!-- App Title -->
    <title>@yield('title') | {{ $setting->meta_title ?? '' }}</title>
    <meta name="description" content="{!! str_limit(strip_tags($setting->meta_description), 160, ' ...') !!}">
    <meta name="keywords" content="{!! strip_tags($setting->meta_keywords) !!}">
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}"
        type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}" type="image/x-icon">
    @endif
    @if(empty($setting))
    <!-- App Title -->
    <title>@yield('title')</title>
    @endif
    <!-- Social Meta Tags -->
    <link rel="canonical" href="{{ route('home') }}">
    @yield('social_meta_tags')
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/dripicons.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
    @php
    $version = App\Models\Language::version();
    @endphp
    @if($version->direction == 1)
    <!-- RTL css -->
    <link rel="stylesheet" href="{{ asset('web/css/rtl.css') }}">
    @endif
</head>

<body>
    <!-- header -->
    <header class="header-area header-three">
        <div class="header-top second-header d-none d-md-block">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6 d-none d-lg-block ">
                        {{-- @if(isset($topbarSetting) && $topbarSetting->social_status == 1) --}}
                        <div class="header-social">
                            <div class="marquee">
                                <p class="mb-0">An Autonomous Institution | NBA / NAAC Accredited / IQAC |
                                    An ISO 9001 : 2015 Organisation</p>
                            </div>
                            {{-- <span>
                            @if(isset($socialSetting->facebook))
                            <a href="{{ $socialSetting->facebook }}" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(isset($socialSetting->instagram))
                            <a href="{{ $socialSetting->instagram }}" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            @endif
                            @if(isset($socialSetting->twitter))
                            <a href="{{ $socialSetting->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(isset($socialSetting->linkedin))
                            <a href="{{ $socialSetting->linkedin }}" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(isset($socialSetting->pinterest))
                            <a href="{{ $socialSetting->pinterest }}" target="_blank"><i
                                    class="fab fa-pinterest"></i></a>
                            @endif
                            @if(isset($socialSetting->youtube))
                            <a href="{{ $socialSetting->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            </span> --}}
                            <!--  /social media icon redux -->
                        </div>
                        {{-- @endif --}}
                    </div>
                    <div class="col-lg-5 col-md-5 d-none d-lg-block text-right">
                        <div class="header-cta">
                            <ul>
                                @isset($topbarSetting->phone)
                                <li>
                                    <div class="call-box">
                                        <div class="icon">
                                            <i class="fa fa-phone-square"></i>
                                            {{-- <img src="{{ asset('web/img/icon/phone-call.png') }}" alt="img"> --}}
                                        </div>
                                        <div class="text">
                                            <strong><a
                                                    href="tel:{{ str_replace(' ', '', $topbarSetting->phone ?? '') }}">{{ $topbarSetting->phone ?? '' }}</a></strong>
                                        </div>
                                    </div>
                                </li>
                                @endisset
                                @isset($topbarSetting->email)
                                <li>
                                    <div class="call-box">
                                        <div class="icon">
                                            <i class="fa fa-envelope"></i>
                                            {{-- <img src="{{ asset('web/img/icon/mailing.png') }}" alt="img"> --}}
                                        </div>
                                        <div class="text">
                                            <strong><a
                                                    href="mailto:{{ $topbarSetting->email ?? '' }}">{{ $topbarSetting->email ?? '' }}</a></strong>
                                        </div>
                                    </div>
                                </li>
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-sticky" class="menu-area">
            <div class="container-fluid">
                <div class="second-menu">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            @if(isset($setting))
                            <div class="logo">
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="logo"></a>
                            </div>
                            @endif
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <nav id="mobile-menu">
                                @include('web.layouts.menu')
                            </nav>
                        </div>
                        {{-- <div class="col-xl-3 col-lg-3 text-right d-none d-lg-block text-right text-xl-right">
                            @php 
                            $application = App\Models\ApplicationSetting::status(); 
                            @endphp
                            @isset($application)
                            <div class="login">
                                <ul>
                                    <li>
                                        <div class="second-header-btn">
                                           <a href="{{ route('application.index') }}" target="_blank"
                        class="btn">{{ __('navbar_admission') }}</a>
                    </div>
                    </li>
                    </ul>
                </div>
                @endisset
            </div> --}}
            <div class="col-12">
                <div class="mobile-menu"></div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="text-right text-xl-right">
            <nav id="mobile-menu">
                {{--    <ul>
                     <li class="{{ Request::path() == '/' ? 'current' : '' }}"><a
                    href="{{ route('home') }}">{{ __('navbar_home') }}
                </a></li>
                <li class="{{ Request::is('course*') ? 'current' : '' }}"><a href="{{ route('course') }}">course
                    </a>
                    <ul>
                        <li><a href="{{ route('course') }}">course</a></li>
                        <li class="{{ Request::is('event*') ? 'current' : '' }}"><a
                                href="{{ route('event') }}">{{ __('navbar_event') }}</a></li>
                        <li class="{{ Request::is('faq*') ? 'current' : '' }}"><a
                                href="{{ route('faq') }}">{{ __('navbar_faqs') }}</a>
                            <ul>
                                <li><a href="{{ route('course') }}">course</a></li>
                                <li class="{{ Request::is('event*') ? 'current' : '' }}"><a
                                        href="{{ route('event') }}">{{ __('navbar_event') }}</a></li>
                                <li class="{{ Request::is('faq*') ? 'current' : '' }}"><a
                                        href="{{ route('faq') }}">{{ __('navbar_faqs') }}</a>
                                    <ul>
                                        <li><a href="{{ route('course') }}">course</a></li>
                                        <li class="{{ Request::is('event*') ? 'current' : '' }}"><a
                                                href="{{ route('event') }}">{{ __('navbar_event') }}</a></li>
                                        <li class="{{ Request::is('faq*') ? 'current' : '' }}"><a
                                                href="{{ route('faq') }}">{{ __('navbar_faqs') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('event*') ? 'current' : '' }}"><a
                        href="{{ route('event') }}">{{ __('navbar_event') }}</a></li>
                <li class="{{ Request::is('faq*') ? 'current' : '' }}"><a
                        href="{{ route('faq') }}">{{ __('navbar_faqs') }}</a></li>
                <li class="{{ Request::is('gallery*') ? 'current' : '' }}"><a
                        href="{{ route('gallery') }}">{{ __('navbar_gallery') }}</a></li>
                <li class="{{ Request::is('news*') ? 'current' : '' }}"><a
                        href="{{ route('news') }}">{{ __('navbar_news') }}</a></li>
                </ul> --}}
            </nav>
        </div>
    </div>
    <!-- header-end -->
    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->
    <section id="sp-right-sticky">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div id="sp-right1" class="col-lg-12 ">
                        <div class="sp-column ">
                            <div class="sp-module ">
                                <div class="sp-module-content">
                                    <div class="custom">
                                        <style type="text/css">
                                        .sp-module .sticky-social .main-sticky ul.list-unstyled li a::before {
                                            content: none !important;
                                        }

                                        .sticky-social .main-sticky li.drop-social .brochure li:not(:first-child) {
                                            width: auto;
                                            padding-top: 6px
                                        }

                                        .sticky-social .brochure,
                                        .sticky-social .brochure li:first-child a {
                                            background: #ea2659 !important;
                                            background: linear-gradient(229deg, rgba(235, 29, 83, .75) 0, rgba(235, 29, 83, .75) 100%)
                                        }

                                        .sticky-social .main-sticky li.drop-social .appform li:not(:first-child) {
                                            width: auto;
                                            padding-top: 6px
                                        }

                                        .sticky-social .appform,
                                        .sticky-social .appform li:first-child a {
                                            background: #db6e68 !important;
                                            background: linear-gradient(229deg, #db6e68 0, #db6e68 100%)
                                        }

                                        .sticky-social {
                                            position: fixed;
                                            right: 0;
                                            top: 46vh;
                                            z-index: 9999
                                        }

                                        .sticky-social .main-sticky li {
                                            position: relative
                                        }

                                        .sticky-social .main-sticky li a {
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            height: 42px;
                                            width: 42px;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center;
                                            -webkit-box-orient: vertical;
                                            -webkit-box-direction: normal;
                                            -ms-flex-direction: column;
                                            flex-direction: column;
                                            background: #db6e68;
                                            background: linear-gradient(229deg, #db6e68 0, #db6e68 100%)
                                        }

                                        .sticky-social .main-sticky li img {
                                            width: 22px
                                        }

                                        .sticky-social .main-sticky li:nth-child(1) a {
                                            background: 0 0 !important;
                                            background: linear-gradient(229deg, #9b0f90 0, #9b0f90 100%)
                                        }

                                        .sticky-social .main-sticky li:nth-child(2) a {
                                            background: 0 0 !important;
                                            background: linear-gradient(229deg, #9b0f90 0, #9b0f90 100%)
                                        }

                                        .sticky-social .main-sticky li:nth-child(3) a {
                                            background: 0 0 !important;
                                            background: linear-gradient(229deg, #15a3ec 0, #1f3edd 100%)
                                        }

                                        .sticky-social .main-sticky li:nth-child(4) a {
                                            background: 0 0 !important;
                                        }

                                        .sticky-social .main-sticky li:nth-child(5) a {
                                            background: 0 0 !important;
                                            background: linear-gradient(229deg, #0d2e8c 0, #1f3edd 100%)
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .sub-social-icons {
                                            right: 0
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .whatsapp {
                                            right: -50px
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .phone {
                                            right: -90px
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .brochure {
                                            right: -60px
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .appform {
                                            right: -80px
                                        }

                                        .sticky-social .main-sticky li#whatsapp:hover,
                                        .sticky-social .main-sticky li.drop-social:hover .whatsapp {
                                            height: 50px
                                        }

                                        .sticky-social .main-sticky li.drop-social .whatsapp {
                                            height: 42px
                                        }

                                        .sticky-social .main-sticky li.drop-social .whatsapp li:not(:first-child) {
                                            left: 21%
                                        }

                                        .sticky-social .main-sticky li.drop-social .phone li:not(:first-child) {
                                            width: auto;
                                            padding-top: 10px
                                        }

                                        .sticky-social .main-sticky li.drop-social .phone li:not(:first-child) a,
                                        .sticky-social .main-sticky li.drop-social .brochure li:not(:first-child) a,
                                        .sticky-social .main-sticky li.drop-social .appform li:not(:first-child) a,
                                        .sticky-social .main-sticky li.drop-social .whatsapp li:not(:first-child) a {
                                            color: #fff;
                                            display: contents;
                                            text-decoration: none
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .whatsapp li:not(:first-child) {
                                            bottom: 75%;
                                            width: 100%
                                        }

                                        .sticky-social .main-sticky li.drop-social .whatsapp h3 {
                                            font-size: 15px !important;
                                            margin: 0
                                        }

                                        .sticky-social .main-sticky li.drop-social:hover .whatsapp li:first-child img {
                                            position: relative;
                                            top: 5%
                                        }

                                        .sticky-social .sub-social-icons {
                                            position: relative;
                                            background: #eb1d53;
                                            background: linear-gradient(229deg, #4286f4 0, #4286f4 100%);
                                            position: absolute;
                                            width: 254px;
                                            right: -212px;
                                            top: 0;
                                            -webkit-transition: 1s;
                                            transition: 1s
                                        }

                                        .sticky-social .sub-social-icons li {
                                            display: block;
                                            float: left;
                                            width: 16.6666666667%;
                                            position: relative
                                        }

                                        .sticky-social .drop-social:last-child .sub-social-icons li::after {
                                            position: absolute;
                                            content: '';
                                            border-right: 1px dashed #fff;
                                            height: 22px;
                                            right: 0;
                                            top: 10px
                                        }

                                        .sticky-social .sub-social-icons li:nth-child(1)::after,
                                        .sticky-social .sub-social-icons li:nth-child(6)::after {
                                            display: none
                                        }

                                        .sticky-social .sub-social-icons li a {
                                            background: 0 0 !important
                                        }

                                        .sticky-social .sub-social-icons li img {
                                            width: 19px
                                        }

                                        .sticky-social .whatsapp {
                                            background: #13c856;
                                        }

                                        .sticky-social .whatsapp li:first-child a {
                                            background: #13c856 !important;
                                            background: linear-gradient(229deg, #13c856 0, #13c856 100%) !important
                                        }

                                        .sticky-social .phone,
                                        .sticky-social .phone li:first-child a {
                                            background: #f35609 !important;
                                            background: linear-gradient(229deg, #f35609 0, #f35609 100%)
                                        }

                                        .ee-register-now.right {
                                            right: 5px;
                                            position: fixed;
                                            top: 15vh;
                                            -webkit-transform-origin: 90% 40%;
                                            -moz-transform-origin: 90% 40%;
                                            -ms-transform-origin: 90% 40%;
                                            -o-transform-origin: 90% 40%;
                                            transform-origin: 90% 40%;
                                            -webkit-transform: rotate(270deg);
                                            -moz-transform: rotate(270deg);
                                            -ms-transform: rotate(270deg);
                                            -o-transform: rotate(270deg);
                                            transform: rotate(270deg);
                                            z-index: 9999;
                                            padding: 10px 25px;
                                        }

                                        a.applyNow-button:hover,
                                        a.applyNow-button:focus,
                                        a.applyNow-button:visited {
                                            color: #fff;
                                        }

                                        .ee-register-now.left {
                                            left: 0;
                                            position: fixed;
                                            top: 35vh;
                                            -webkit-transform-origin: 8% 33%;
                                            -moz-transform-origin: 8% 33%;
                                            -ms-transform-origin: 8% 33%;
                                            -o-transform-origin: 8% 33%;
                                            transform-origin: 8% 33%;
                                            z-index: 9999;
                                            transform: rotate(90deg);
                                        }

                                        .applyNow-button {
                                            background-color: #dc3545;
                                            border: 1px solid #dc3545;
                                            font-size: 1.2em;
                                            text-transform: uppercase;
                                            right: 0;
                                            padding: 10px 25px;
                                            color: #fff;
                                            font-weight: 700;
                                            border-radius: 10px 10px 0 0;
                                        }

                                        .applyNow-button:hover {
                                            background-color: #3e4095;
                                            border: 1px solid #3e4095;
                                            transition: 0.3s all;
                                            color: #fff;
                                        }

                                        @media screen and (max-height: 416px) and (orientation: landscape) {

                                            .applyNow-button,
                                            .applyNow-button:focus {
                                                padding: 10px 15px !important;
                                                font-size: 0.6em !important;
                                            }

                                            .ee-register-now.right {
                                                padding: 10px 15px !important;
                                            }
                                        }

                                        @media (max-width: 768px) {
                                            .ee-register-now.right {
                                                top: 20vh;
                                            }
                                        }

                                        .aplusgrade-body:after {
                                            content: '__________';
                                            margin: 10px 0 0 0;
                                            color: transparent;
                                            -webkit-filter: blur(2px);
                                        }

                                        .aplusgradelogo {
                                            border-radius: 50%;
                                            height: 80px;
                                            width: 80px;
                                            background-color: transparent;
                                            text-align: right;
                                            margin-bottom: 20px;
                                            overflow: hidden;
                                            display: inline-block;
                                        }

                                        .aplusgrade {
                                            -webkit-animation-name: aplusgrade;
                                            -webkit-animation-duration: 2.5s;
                                            -webkit-animation-iteration-count: infinite;
                                            -webkit-animation-timing-function: ease-in-out ease-in-out;
                                        }

                                        @-webkit-keyframes aplusgrade {
                                            from {
                                                -webkit-transform: translate(0, 0px);
                                            }

                                            45% {
                                                -webkit-transform: translate(0, 20px);
                                            }

                                            to {
                                                -webkit-transform: translate(0, -0px);
                                            }
                                        }

                                        .sticky-logo-grade {
                                            position: fixed;
                                            left: 0;
                                            bottom: 0;
                                            z-index: 9999;
                                        }
                                        </style>
                                        <script type="text/javascript">
                                        $(window).scroll(function() {
                                            if ($(this).scrollTop() > 0) {
                                                $('.sticky-social').fadeOut();
                                            } else {
                                                $('.sticky-social').fadeIn();
                                            }
                                        });
                                        </script>
                                        <div class="ee-register-now right"><a href="#" target="_blank" rel="noopener"
                                                class="applyNow-button">Apply Now!</a></div>
                                        <div class="sticky-social">
                                            <ul class="list-unstyled main-sticky">
                                                <li class="drop-social"><a href="#"></a>
                                                    <ul class="list-unstyled sub-social-icons whatsapp">
                                                        <li><a><img src="{{ asset('/uploads/icons/whatsapp.svg') }}"
                                                                    alt="Admission" class="img-responsive"></a></li>
                                                        <li><a href="https://api.whatsapp.com/send?phone=+918012530325"
                                                                target="_blank" rel="noopener">
                                                                <h3>Admission Helpline</h3>+91 80125 30325
                                                            </a></li>
                                                        <div class="clearfix">&nbsp;</div>
                                                    </ul>
                                                </li>
                                                <li class="drop-social"><a href="#"></a>
                                                    <ul class="list-unstyled sub-social-icons phone">
                                                        <li><a> <img src="{{ asset('/uploads/icons/call.svg') }}"
                                                                    alt="Admission" class="img-responsive"> </a></li>
                                                        <li><a href="tel:+918012530321">+91 80125 30321</a></li>
                                                    </ul>
                                                </li>
                                                <li class="drop-social" style="top: 4px;">
                                                    <ul class="list-unstyled sub-social-icons">
                                                        <li><a> <img src="{{ asset('/uploads/icons/socialicon.svg') }}"
                                                                    alt="Admission" class="img-responsive"> </a></li>
                                                        <li><a href="https://www.facebook.com/psrengg" target="_blank"
                                                                rel="noopener"> <img
                                                                    src="{{ asset('/uploads/icons/facebook.svg') }}"
                                                                    alt="Facebook" class="img-responsive"> </a></li>
                                                        <li><a href="https://www.instagram.com" target="_blank"
                                                                rel="noopener"> <img
                                                                    src="{{ asset('/uploads/icons/insta.svg') }}"
                                                                    alt="Instagram" class="img-responsive"> </a></li>
                                                        <li><a href="https://www.youtube.com/channel/" target="_blank"
                                                                rel="noopener"> <img
                                                                    src="{{ asset('/uploads/icons/youtube.svg') }}"
                                                                    alt="Youtube" class="img-responsive"> </a></li>
                                                        <li><a href="https://twitter.com/" target="_blank"
                                                                rel="noopener"> <img
                                                                    src="{{ asset('/uploads/icons/twitter.svg') }}"
                                                                    alt="Twitter" class="img-responsive"> </a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="aplusgrade sticky-logo-grade">
        <div class="aplusgradelogo">
            <img src="{{ asset('/web/img/a-plus-grade.png')}}" width="80" alt="A+ Grade in NAAC" />
        </div>
    </div>
    <!-- footer -->
    <footer class="footer-bg footer-p pt-90" style="background-color: #008B8B;">
        <div class="footer-top pb-70">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>{{ __('footer_socials') }}</h2>
                            </div>
                            <div class="footer-social mt-10">
                                @if(isset($socialSetting->facebook))
                                <a href="{{ $socialSetting->facebook }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                @endif
                                @if(isset($socialSetting->instagram))
                                <a href="{{ $socialSetting->instagram }}" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                                @endif
                                @if(isset($socialSetting->twitter))
                                <a href="{{ $socialSetting->twitter }}" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                @endif
                                @if(isset($socialSetting->linkedin))
                                <a href="{{ $socialSetting->linkedin }}" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if(isset($socialSetting->pinterest))
                                <a href="{{ $socialSetting->pinterest }}" target="_blank"><i
                                        class="fab fa-pinterest"></i></a>
                                @endif
                                @if(isset($socialSetting->youtube))
                                <a href="{{ $socialSetting->youtube }}" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>{{ __('footer_links') }}</h2>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    @if (Route::has('student.login'))
                                    <li><a href="{{ route('student.login') }}" target="_blank">{{ __('field_student') }}
                                            {{ __('field_login') }}</a></li>
                                    @endif
                                    @if (Route::has('login'))
                                    <li><a href="{{ route('login') }}" target="_blank">{{ __('field_staff') }}
                                            {{ __('field_login') }}</a></li>
                                    @endif
                                    @php
                                    $application = App\Models\ApplicationSetting::status();
                                    @endphp
                                    @isset($application)
                                    <li><a href="{{ route('application.index') }}"
                                            target="_blank">{{ __('navbar_admission') }}</a></li>
                                    @endisset
                                    @foreach($footer_pages as $footer_page)
                                    <li><a
                                            href="{{ route('page.single', ['slug' => $footer_page->slug]) }}">{{ $footer_page->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>{{ __('footer_contact') }}</h2>
                            </div>
                            <div class="f-contact">
                                <ul>
                                    @isset($topbarSetting->phone)
                                    <li>
                                        <i class="icon fal fa-phone"></i>
                                        <span><a
                                                href="tel:{{ str_replace(' ', '', $topbarSetting->phone ?? '') }}">{{ $topbarSetting->phone ?? '' }}</a></span>
                                    </li>
                                    @endisset
                                    @isset($topbarSetting->email)
                                    <li>
                                        <i class="icon fal fa-envelope"></i>
                                        <span><a
                                                href="mailto:{{ $topbarSetting->email ?? '' }}">{{ $topbarSetting->email ?? '' }}</a></span>
                                    </li>
                                    @endisset
                                    @isset($topbarSetting->address)
                                    <li>
                                        <i class="icon fal fa-map-marker-check"></i>
                                        <span>{{ $topbarSetting->address ?? '' }}</span>
                                    </li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 text-center">
                        @isset($setting->copyright_text)
                        &copy; {!! strip_tags($setting->copyright_text, '<a><b><i><u><strong>') !!}
                                            @endisset
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 text-center text-md-right">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->
    <!-- Script JS -->
    <script src="{{ asset('web/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('web/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web/js/popper.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/js/slick.min.js') }}"></script>
    <script src="{{ asset('web/js/paroller.js') }}"></script>
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script src="{{ asset('web/js/js_isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('web/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web/js/element-in-view.js') }}"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>
    <script src="{{ asset('web/js/jquery.autoscroll.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <!-- Include jQuery -->
    <!-- Include SmartMenus and Bootstrap extensions -->
    {{-- <script src="{{ asset('web/js/jquery.smartmenus.js') }}"></script>
    <script src="{{ asset('web/js/jquery.smartmenus.bootstrap.js') }}"></script> --}}
    <script>
    <!--/* $(function() {
    $('#menu').smartmenus({
    subMenusSubOffsetX: 1,
    subMenusSubOffsetY: -8
    }).smartmenus('enableBootstrap');
    });*/ 
    -->
    </script>
    <script>
    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
        });
    });
    </script>
</body>

</html>