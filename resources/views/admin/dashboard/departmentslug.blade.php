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
                        <h5>Department Section </h5>
                    </div>
                    <div class="card-block">

                        <h4>{{$department->title}} </h4>
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">


                            <div class="text-column col-lg-12 col-md-12 col-sm-12 my-5">

                                <ul class="d-flex  flex-column listmargin clearfix list-unstyled">

                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/about-us/{{$department->id}}"
                                                target="_blank">About</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/slider" target="_blank">Slider</a>
                                                </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/testimonial"
                                                        target="_blank">Testimonital</a> </strong></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a class="btn btn-primary m-2"
                                            href="{{$baseurl}}admin/web/faculties/{{$department->id}}_basic"
                                            target="_blank"> <strong>Faculty</strong> </a>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/faculties/{{$department->id}}_teaching-staff"
                                                        target="_blank">Teaching Staff</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/faculties/{{$department->id}}_non-teaching-staff"
                                                        target="_blank">Non Teaching Staff</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/infrastructures/{{$department->id}}_basic"
                                                target="_blank">Infrastructure</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/infrastructures/{{$department->id}}_buildings"
                                                        target="_blank">Buildings</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/achievements/{{$department->id}}_basic"
                                                target="_blank">Achievements</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/achievements/{{$department->id}}_staff-achivements"
                                                        target="_blank">Staff Achievements</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/achievements/{{$department->id}}_student-achivements"
                                                        target="_blank">Student Achievements</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/achievements/{{$department->id}}_student-achivements-table"
                                                        target="_blank">Student Achievements Table </a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/achievements/{{$department->id}}_student-achivements-appreciation"
                                                        target="_blank">Student Achievements Appreciation</a> </strong>
                                            </li>

                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/placements/{{$department->id}}_basic"
                                                target="_blank">Placement</a></strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/placements/{{$department->id}}_student-placed"
                                                        target="_blank">Student Placed</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/videomaterials/{{$department->id}}_basic"
                                                target="_blank">Video Materials</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/videomaterials/{{$department->id}}_videos"
                                                        target="_blank">Video link</a> </strong></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/coursematerials/{{$department->id}}_basic"
                                                target="_blank">Course Materials</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/coursematerials/{{$department->id}}_courses"
                                                        target="_blank">Course link</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2">Events</a> </strong>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/newsletters/{{$department->id}}_basic"
                                                target="_blank">Newsletter</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/newsletters/{{$department->id}}_newsletters"
                                                        target="_blank">Newsletter link</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                target="_blank">Magazines</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_magazines"
                                                        target="_blank">Magazines link</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/syllabus/{{$department->id}}_basic"
                                                target="_blank">Syllabus</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/syllabus/{{$department->id}}_syllabus"
                                                        target="_blank">Syllabus List</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/syllabus/{{$department->id}}_regulation"
                                                        target="_blank">Regulation</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/syllabus/{{$department->id}}_questionBank"
                                                        target="_blank">question
                                                        Bank</a> </strong></li>

                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2"
                                                href="{{$baseurl}}admin/web/library/{{$department->id}}_basic"
                                                target="_blank">Department Library</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/library/{{$department->id}}_sectionAbout"
                                                        target="_blank">Section
                                                        About</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/library/{{$department->id}}_record"
                                                        target="_blank">Department Library Records</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2">Research</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">phd
                                                        Holders List</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">anna
                                                        University Recognized Superviors NameList</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">List Of
                                                        Candidates Pursuing Phd Under Department Supervisors</a>
                                                </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">List Of
                                                        Department Faculties Pursuing Phd</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">phd
                                                        Awarded Under Department Supervisor</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">supervisor</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">Funds</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">Value
                                                        Added Group</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2">Publications</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">patent</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">book
                                                        Chapter</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">journal
                                                        Publication</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">Conference List</a> </strong></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong><a class="btn btn-primary m-2">Activities</a> </strong>
                                        <ul>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">Department Activity</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">Student
                                                        Participation</a> </strong></li>
                                            <li><strong><a class="btn btn-primary m-2"
                                                        href="{{$baseurl}}admin/web/magazines/{{$department->id}}_basic"
                                                        target="_blank">Inter
                                                        Institute Events Winning Prize</a> </strong>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>



                                <div class="upper-box">
                                    <div class="single-item-carousel owl-carousel owl-theme">
                                        {{--  <figure class="image"><img src="{{ asset('uploads/course/'.$course->attach) }}"
                                        alt="Course"></figure> --}}
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