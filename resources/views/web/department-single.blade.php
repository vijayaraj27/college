@extends('web.layouts.master')
{{-- @section('title', __($department->title)) --}}
@section('content')
    <!-- main-area -->
    <main>
        <section id="home" class="slider-area fix p-relative">
            <div class="slider-active" style="background: #141b22;">
               {{--
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
                @endforeach --}}
            </div>
        </section>  
         <!-- breadcrumb-area -->
         <section class="breadcrumb-area d-flex  p-relative align-items-center">
            <div class="container">
                  <div class="row align-items-center">
                      <div class="col-xl-12 col-lg-12">
                          <div class="breadcrumb-wrap text-left">
                              <div class="breadcrumb-title">
                                  <h2>{{--$department->title--}}</h2>
                              </div>
                          </div>
                      </div>
                      <div class="breadcrumb-wrap2">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                  <li class="breadcrumb-item" ><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                  <li class="breadcrumb-item active" aria-current="page"> {{--$department->title--}}</li>
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
                            <h2>{{--$department->title--}}</h2>
                            <div class="upper-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    {{-- <figure class="image"><img src="{{ asset('uploads/course/'.$course->attach) }}" alt="Course"></figure> --}}
                                </div>
                            </div>
                            <div class="inner-column">
                                  <p>{{-- {!! $department->title !!} --}}</p>  
                                  <p> What is Lorem Ipsum?</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <p>Why do we use it?</p>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                <p>Where does it come from?</p>
                                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                            <p>Where can I get some?</p>
                                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
5
	paragraphs
	words
	bytes
	lists
	Start with 'Lorem
ipsum dolor sit amet...'</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <aside class="sidebar-widget info-column">
                                <div class="inner-column3">
                                    <h3>{{ __('Details') }}</h3>
                                    <ul class="project-info clearfix">
                                        @if(!empty($department->slug))
                                        <li>
                                            <a href="{{ route('department.single', ['slug' => $department->slug ]) }}/faculty"> <strong>{{ __('field_faculty') }} </strong> </a>                                        
                                        </li>
                                        <li>
                                            <strong><a>Infrastructure</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Achievements</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Placement</a></strong> 
                                        </li>
                                        <li>
                                            <strong><a>Video Materials</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Course Materials</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Events</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Newsletter</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Syllabus</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Department Library</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Research</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Publications</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a>Activities</a> </strong> 
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End course Detail -->
    </main>
    <!-- main-area-end -->
@endsection
