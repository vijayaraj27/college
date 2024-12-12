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
                        <h3 class="bold">Department Placements</h3>
                    </div>

                    <!-- Department Placements Main Section -->
                    <div class="card-block">
                        <form id="placementsForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" name="imageFile" placeholder="Image File" >
                                    <img alt="Section Placements Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/placements/' . $row->imageFile : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
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
                                <button type="submit" class="btn btn-success">Save Placements</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'student-placed')
                    <!-- Student Placements Appreciation List -->
                    <div class="card-header">
                        <h3 class="bold">Student Placements Appreciation List</h3>
                    </div>
                    <div class="card-block">
                        <form id="studentPlacedForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Student Placements Appreciation List Section -->
                                <div id="studentPlacedContainer" class="col-md-12">
                                    <h4>Student Placements Appreciation List</h4>
                                    @php
                                    $studentPlacedList = isset($row->studentPlaced) ? json_decode($row->studentPlaced,
                                    true) : [];

                                    // print_r($studentPlacedList);
                                    @endphp

                                    @if(!empty($studentPlacedList))

                                    <!-- @foreach($studentPlacedList as $year => $placements)
                                    <div class="student-achievement-appreciation-year-entry mb-4"
                                        id="studentPlacedYearEntry{{ $year }}">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="studentPlaced[{{ $year }}][year]" placeholder="Year"
                                                    value="{{ $year }}" readonly>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearStudentPlacementsAppreciation(this)">Remove
                                                    Year</button>
                                            </div>
                                        </div>
                                        <div class="year-appreciations-container">
                                            @foreach($placements as $index => $placement)
                                            <div class="student-achievement-appreciation-entry row mb-2"
                                                id="studentAchievementAppreciationEntry{{ $year }}_{{ $index }}">
                                                @foreach(['studentRegNumber' => 'Registration Number', 'studentName' =>
                                                'Student Name', 'companyName' => 'Company Name'] as $key =>
                                                $placeholder)
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control"
                                                        name="studentPlaced[{{ $year }}][placements][{{ $index }}][{{ $key }}]"
                                                        placeholder="{{ $placeholder }}"
                                                        value="{{ $placement[$key] ?? '' }}" required>
                                                </div>
                                                @endforeach
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeAchievementAppreciation(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addAchievementAppreciation(this, '{{ $year }}')">Add Student
                                                Placement</button>
                                        </div>
                                    </div>
                                    @endforeach -->

                                    @foreach($studentPlacedList as $year => $placements)
                                    <div class="student-achievement-appreciation-year-entry mb-4"
                                        id="studentPlacedYearEntry{{ $year }}">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="studentPlaced[{{ $year }}][year]" placeholder="Year"
                                                    value="{{ $year }}" readonly>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearStudentPlacementsAppreciation(this)">Remove
                                                    Year</button>
                                            </div>
                                        </div>
                                        <div class="year-appreciations-container">
                                            @foreach($placements['placements'] as $index => $placement)
                                            <div class="student-achievement-appreciation-entry row mb-2"
                                                id="studentAchievementAppreciationEntry{{ $year }}_{{ $index }}">
                                                @foreach(['studentRegNumber' => 'Registration Number', 'studentName' =>
                                                'Student Name', 'companyName' => 'Company Name'] as $key =>
                                                $placeholder)
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control"
                                                        name="studentPlaced[{{ $year }}][placements][{{ $index }}][{{ $key }}]"
                                                        placeholder="{{ $placeholder }}"
                                                        value="{{ $placement[$key] ?? '' }}" required>
                                                </div>
                                                @endforeach
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeAchievementAppreciation(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addAchievementAppreciation(this, '{{ $year }}')">Add Student
                                                Placement</button>
                                        </div>
                                    </div>
                                    @endforeach

                                    @else
                                    <div class="alert alert-info">
                                        <p>No student placements found. Please add a new year and achievements.</p>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearStudentPlacementsAppreciationBtn"
                                        class="btn btn-primary" onclick="addYearStudentPlacementsAppreciation()">Add
                                        Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Student Placements
                                    list </button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year
                    function addYearStudentPlacementsAppreciation() {
                        const container = document.getElementById('studentPlacedContainer');
                        const year = new Date().getFullYear();
                        const newYear = `
                            <div class="student-achievement-appreciation-year-entry mb-4" id="studentPlacedYearEntry${year}">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="studentPlaced[${year}][year]" placeholder="Year" value="${year}" readonly>
                                    </div>
                                    <div class="form-group col-md-2 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeYearStudentPlacementsAppreciation(this)">Remove Year</button>
                                    </div>
                                </div>
                                <div class="year-appreciations-container"></div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-info" onclick="addAchievementAppreciation(this, ${year})">Add Student Placement</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year
                    function removeYearStudentPlacementsAppreciation(button) {
                        if (confirm('Are you sure you want to remove this year and its placements?')) {
                            button.closest('.student-achievement-appreciation-year-entry').remove();
                        }
                    }

                    // Add a new achievement
                    function addAchievementAppreciation(button, year) {
                        const container = button.closest('.student-achievement-appreciation-year-entry').querySelector(
                            '.year-appreciations-container');
                        const appreciationIndex = container.getElementsByClassName(
                            'student-achievement-appreciation-entry').length;

                        const newAchievement = `
                            <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry${year}_${appreciationIndex}">
                                ${['studentRegNumber', 'studentName', 'companyName'].map((key, i) => `
                                <div class="form-group col-md-${12 / 3}">
                                    <input type="text" class="form-control" name="studentPlaced[${year}][placements][${appreciationIndex}][${key}]" placeholder="${key.replace(/([A-Z])/g, ' $1')}" required>
                                </div>
                                `).join('')}
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