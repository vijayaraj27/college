@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
           
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Department Section   </h5>
                    </div>
                    <div class="card-block">

                    <h4>{{$department->title}}    </h4>
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            

                            <div class="text-column col-lg-12 col-md-12 col-sm-12 my-5">

                            <ul class="d-flex  flex-column listmargin clearfix list-unstyled">

                                         <li>
                                            <strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/about-us/{{$department->id}}" target="_blank" >About</a>  </strong> 
                                                <ul>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/slider" target="_blank"  >Slider</a> </strong></li>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/testimonial" target="_blank"  >Testimonital</a> </strong></li>
                                                </ul>
                                        </li>
                                    
                                        <li>
                                            <a class="btn btn-primary m-2" href="{{$baseurl}}admin/academic/faculty" target="_blank" > <strong>Faculty</strong> </a>         
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2"  href="{{$baseurl}}admin/web/achievements/{{$department->id}}" target="_blank" >Infrastructure</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Achievements</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Placement</a></strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Video Materials</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Course Materials</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Events</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Newsletter</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Syllabus</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Department Library</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Research</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Publications</a> </strong> 
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" >Activities</a> </strong> 
                                        </li>
                                      
                                    </ul>
 
                       
                           
                            <div class="upper-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                {{--  <figure class="image"><img src="{{ asset('uploads/course/'.$course->attach) }}" alt="Course"></figure> --}}
                                </div>
                            </div>
                             
                        </div>

                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection