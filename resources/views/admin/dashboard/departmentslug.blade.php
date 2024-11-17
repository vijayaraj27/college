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
                                            <a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/faculties/{{$department->id}}_basic" target="_blank" > <strong>Faculty</strong> </a>         
                                            <ul>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/faculties/{{$department->id}}_teaching-staff" target="_blank"  >Teaching Staff</a> </strong></li>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/faculties/{{$department->id}}_non-teaching-staff" target="_blank"  >Non Teaching Staff</a> </strong></li>
                                                </ul>
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2"  href="{{$baseurl}}admin/web/infrastructures/{{$department->id}}_basic" target="_blank" >Infrastructure</a> </strong> 
                                                <ul>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/infrastructures/{{$department->id}}_buildings" target="_blank"  >Buildings</a> </strong></li>                                                    
                                                </ul>
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/achievements/{{$department->id}}_basic" target="_blank" >Achievements</a> </strong> 
                                            <ul>
                                            <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/achievements/{{$department->id}}_staff-achivements" target="_blank"  >Staff Achievements</a> </strong></li>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/achievements/{{$department->id}}_student-achivements" target="_blank"  >Student Achievements</a> </strong></li>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/achievements/{{$department->id}}_student-achivements-table" target="_blank"  >Student Achievements Table </a> </strong></li>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/achievements/{{$department->id}}_student-achivements-appreciation" target="_blank"  >Student Achievements Appreciation</a> </strong></li>
                                                    
                                                </ul>
                                        </li>
                                        <li>
                                            <strong><a class="btn btn-primary m-2"  href="{{$baseurl}}admin/web/placements/{{$department->id}}_basic" target="_blank"  >Placement</a></strong> 
                                                <ul>
                                                    <li><strong><a class="btn btn-primary m-2" href="{{$baseurl}}admin/web/placements/{{$department->id}}_student_placed" target="_blank"  >Student Placed</a> </strong></li>                                                    
                                                </ul>
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