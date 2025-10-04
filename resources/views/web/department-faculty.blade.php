@extends('web.layouts.master')
@section('title', __($department->title))
@section('content')
    <!-- main-area -->
    <main>
        {{-- <section id="home" class="slider-area fix p-relative">
            <div class="slider-active" style="background: #141b22;">
                @foreach($sliders as $slider)
                <div class="single-slider slider-bg" style="background-image: url({{ asset('uploads/slider/'.$slider->attach) }}); background-size: cover;">
                    <div class="overlay"></div>
                    <div class="container">
                       <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="slider-content s-slider-content mt-130">
                                    <h2 data-animation="fadeInUp" data-delay=".4s">{{ $slider->title }}</h2>
                                    <p data-animation="fadeInUp" data-delay=".6s">{!! strip_tags($slider->sub_title, '<b><u><i><br>') !!}</p>
                                    @if(isset($slider->button_link))
                                    <div class="slider-btn mt-30">     
                                        <a href="{{ $slider->button_link }}" target="_blank" class="btn ss-btn mr-15" data-animation="fadeInLeft" data-delay=".4s">{{ $slider->button_text }} <i class="fal fa-long-arrow-right"></i></a>
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
        </section>   --}}
         <!-- breadcrumb-area -->
         <section class="breadcrumb-area d-flex  p-relative align-items-center">
            <div class="container">
                  <div class="row align-items-center">
                      <div class="col-xl-12 col-lg-12">
                          <div class="breadcrumb-wrap text-left">
                              <div class="breadcrumb-title">
                                  <h2> Faculty of {{$department->title}}</h2>
                              </div>
                          </div>
                      </div>
                      <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                               <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                               @if(isset($department))
            <li class="breadcrumb-item "><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
        @endif
                                  <li class="breadcrumb-item active" aria-current="page">Faculty</a></li>
                            </ol>
                         </nav>
                      </div>
                  </div>
              </div>  
          </section>
          <!-- breadcrumb-area-end -->
        <!-- course Detail -->
       <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title }}</h2>
                            <div class="upper-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    {{-- <figure class="image"><img src="{{ asset('uploads/course/'.$course->attach) }}" alt="Course"></figure> --}}
                                </div>
                            </div>
                            <div class="inner-column">
                                <div class="d-flex flex-wrap justify-content-center  align-items-center">
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-25">
                                        <div class="faculty-box p-3 text-center">
                                        <a href="#">
                                            <div class="photo"><img src="{{asset('uploads/web/faculty/1.jpeg')}}" class="img-fluid"> </div>
                                            <div class="content p-3">
                                            <div class="name"><strong>Dr Raja</strong></div>
                                            <div class="department"><strong>Prof</strong></div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-25">
                                        <div class="faculty-box p-3 text-center">
                                        <a href="#">
                                            <div class="photo"><img src="{{ asset('uploads/web/faculty/1.jpeg')}}" class="img-fluid"> </div>
                                            <div class="content p-3">
                                            <div class="name"><strong>Dr Raja</strong></div>
                                            <div class="department"><strong>Prof</strong></div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-25">
                                        <div class="faculty-box p-3 text-center">
                                        <a href="#">
                                            <div class="photo"><img src="{{ asset('uploads/web/faculty/1.jpeg') }}" class="img-fluid"> </div>
                                            <div class="content p-3">
                                            <div class="name"><strong>Dr Raja</strong></div>
                                            <div class="department"><strong>Prof</strong></div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-25">
                                        <div class="faculty-box p-3 text-center">
                                        <a href="#">
                                            <div class="photo"><img src="{{ asset('uploads/web/faculty/1.jpeg') }}" class="img-fluid"> </div>
                                            <div class="content p-3 mt-2">
                                            <div class="name"><strong>Dr Raja</strong></div>
                                            <div class="department"><strong>Prof</strong></div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            @include('web.components.department-sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End course Detail -->
    </main>
    <!-- main-area-end -->
@endsection
