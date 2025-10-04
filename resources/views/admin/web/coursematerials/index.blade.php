@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if($section === 'basic')
                    <div class="card-header">
                        <h3 class="bold">Section Courses Materials</h3>
                    </div>

                    <!-- Department Course Section Main Section -->
                    <div class="card-block">
                        <form id="coursesForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="photo">{{ __('field_photo') }}:
                                        <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span>
                                        <span>*</span></label> <input type="file" class="form-control" name="imageFile"
                                        placeholder="Image File">
                                    <img alt="Section Course Material Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/coursematerials/' . $row->imageFile : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Title </label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" required
                                        value="{{ isset($row->title) ? $row->title : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control texteditor" name="description"
                                        placeholder="Description"
                                        required>{{ isset($row->description) ? $row->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Course Section</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'courses')
                    <!-- Course Materials List -->
                    <div class="card-header">
                        <h3 class="bold">Course Materials List</h3>
                    </div>
                    <div class="card-block">
                        <form id="studentPlacedForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Course Materials List Section -->
                                <div id="studentPlacedContainer" class="col-md-12">
                                    <h4>Course Materials List</h4>
                                    @php
                                    $coursesList = isset($row->courses) ? json_decode($row->courses,
                                    true) : [];
                                    $coursesList = array_values($coursesList ?? []);


                                    @endphp



                                    <div class="student-achievement-appreciation-year-entry mb-4"
                                        id="studentPlacedYearEntry">
                                        <div class="year-appreciations-container">
                                            @if(!empty($coursesList))
                                            @foreach($coursesList as $index => $courses)
                                            <div class="student-achievement-appreciation-entry row mb-2"
                                                id="studentAchievementAppreciationEntry_{{ $index }}">
                                                @foreach(['title' => 'Registration Number', 'pdfLink' => 'Student
                                                Name'] as $key => $placeholder)
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control"
                                                        name="courses[{{ $index }}][{{ $key }}]"
                                                        placeholder="{{ $placeholder }}"
                                                        value="{{ $courses[$key] ?? '' }}" required>
                                                </div>
                                                @endforeach
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeAchievementAppreciation(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                        <!-- Add Course Link Button (Visible Always) -->
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addAchievementAppreciation(this)"><i class="fa fa-plus"></i>
                                                Add Course Link</button>
                                        </div>
                                    </div>
                                    @if(empty($coursesList))
                                    <div class="alert alert-info">
                                        <p>No courses found. Please add a new one.</p>
                                    </div>
                                    @endif




                                </div>




                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Course
                                    list </button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addAchievementAppreciation(button) {
                        const container = document.querySelector('.year-appreciations-container');
                        if (!container) {
                            alert('Container for course links is missing.');
                            return;
                        }

                        // Calculate new index dynamically
                        const appreciationIndex = [...container.querySelectorAll(
                            '.student-achievement-appreciation-entry')].length;

                        const newAchievement = `
                            <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry_${appreciationIndex}">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="courses[${appreciationIndex}][title]" placeholder="Title" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="courses[${appreciationIndex}][pdfLink]" placeholder="Youtube Link" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeAchievementAppreciation(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newAchievement);
                    }



                    // Remove an achievement
                    function removeAchievementAppreciation(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.student-achievement-appreciation-entry').remove();
                        }
                    }
                    </script>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content-->


@endsection