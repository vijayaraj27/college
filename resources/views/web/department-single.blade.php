@extends('web.layouts.master')
  @section('title', __($department->title)) 
  
 
  @section('content')
    <!-- Your content here -->

 
    <!-- main-area -->
    <main>
        <section id="home" class="slider-area fix p-relative">
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
        </section>  
         <!-- breadcrumb-area -->
         <section class="breadcrumb-area d-flex  p-relative align-items-center">
            <div class="container">
                  
                  <div class="row align-items-center">
                      <div class="col-xl-12 col-lg-12">
                          <div class="breadcrumb-wrap text-left">
                              <div class="breadcrumb-title">
                                  <h2>{{$department->title}}</h2>
                              </div>
                          </div>
                      </div>
                      <div class="breadcrumb-wrap2">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                  <li class="breadcrumb-item" ><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                  <li class="breadcrumb-item active" aria-current="page"> {{$department->title}}</li>
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
 
                            <div class="text-column col-lg-12 col-md-12 col-sm-12">

                            <ul class="d-flex flex-wrap listmargin clearfix">
                                    
                                        <li>
                                            <a class="btn ss-btn mr-10" href="{{ route('department.single', ['slug' => $department->slug ]) }}/faculty"> <strong>{{ __('field_faculty') }} </strong> </a>         
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Infrastructure</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Achievements</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Placement</a></strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Video Materials</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Course Materials</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Events</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Newsletter</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Syllabus</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Department Library</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Research</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Publications</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn ss-btn mr-10" >Activities</a> </strong> 
                                        </li>
                                      
                                    </ul>
 
                       
                            <h2>{{$department->title}}</h2>
                            <div class="upper-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                {{--  <figure class="image"><img src="{{ asset('uploads/course/'.$course->attach) }}" alt="Course"></figure> --}}
                                </div>
                            </div>
                            <div class="inner-column">
                                  <p> {!! $department->title !!} </p>  
                                  <p> {!! $sectionAbout['description'] !!} </p>
                            </div>
                        </div>
            
                    </div>
                </div>  
            </div>    
        </section> 
        <section class="section-2 with-bg  pb-60" id="feature">
            <div class="container">
                <div class="row align-items-center d-flex flex-wrap">
                    <div class="col-lg-4 flex-box p-2 red-bg-home">
                        <div class="section-body">
                            <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="500" style="animation-duration: 1000ms;">Our Mission</h3>
                            <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700" style="animation-duration: 1000ms;">
                                {!! $mission !!} 
                            </p>
                        </div>
                    </div>
                    <div class="flex-box col-lg-4 wow fadeInRight animated"  data-animation="fadeInRightShorter" data-delay="400" style="animation-duration: 1000ms;">
                        <figure>
                            <img src="{{ asset('uploads/web/mission.jpg') }}" alt="banner" width="332" height="350">
                        </figure>
                    </div>
                        <div class="flex-box col-lg-4 p-2 green-bg-home">
                            <div class="section-body">
                                <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="500" style="animation-duration: 1000ms;">Core Values</h3>
                                <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700" style="animation-duration: 1000ms;">
                                    {!! $coreValue !!} 
                                </p>
                            </div>
                    </div>
                    <div class="flex-box col-lg-4 wow fadeInRight animated"  data-animation="fadeInRightShorter" data-delay="400" style="animation-duration: 1000ms;">
                        <figure>
                            <img src="{{ asset('uploads/web/vision.jpg') }}" alt="banner" width="332" height="350">
                        </figure>
                    </div>
                        <div class="flex-box col-lg-4 p-2 organe-bg-home">
                            <div class="section-body p-2 ">
                                <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="500" style="animation-duration: 1000ms;">Our Vision</h3>
                                <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700" style="animation-duration: 1000ms;">
                                    {!! $vision !!} 
                                </p>
                            </div>
                    </div>
                    <div class="flex-box col-lg-4 wow fadeInRight animated"  data-animation="fadeInRightShorter" data-delay="400" style="animation-duration: 1000ms;">
                        <figure>
                            <img src="{{ asset('uploads/web/values.jpg') }}" alt="banner" width="332" height="350">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
{{-- bg-parallax --}}
        @if(count($testimonials) > 0)
        <!-- testimonial-area -->
        <section class="testimonial-area pt-60 pb-115 p-relative fix">
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
        <!--End course Detail -->
    </main>
    <!-- main-area-end -->

@endsection
