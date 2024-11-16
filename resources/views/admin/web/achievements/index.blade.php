@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="bold">Department Achievements</h3>
                    </div>

                    <!-- Department Achievements Main Section -->
                    <div class="card-block">
                        <form id="achievementsForm" class="needs-validation" method="POST" action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" name="sectionAchievements[image_file]" placeholder="Image File" required>
                                    <img alt="Section Achievements Image" width="70" height="70" 
                                        src="{{ isset($sectionAchievements['image_file']) ? $baseurl . 'uploads/about-us/' . $sectionAchievements['image_file'] : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="sectionAchievements[title]" placeholder="Title" required value="{{ $title ?? '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control texteditor" name="sectionAchievements[description]" placeholder="Description" required>{{ $description ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Achievements</button>
                            </div>
                        </form>
                    </div>

                    <!-- Department Achievements - Staff -->
                    <div class="card-header">
                        <h3 class="bold">Department Achievements - Staff</h3>
                    </div>

                    <div class="card-block">
                        <form id="staffAchievementsForm" class="needs-validation" method="POST" action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Staff Achievements Section -->
                                <div id="sectionStaffAchievementsContainer" class="col-md-12">
                                    <h4>Section Staff Achievements</h4>
                                    @if(!empty($sectionStaffAchievementsObjectives))
                                        @foreach($sectionStaffAchievementsObjectives as $index => $objective)
                                            <div class="sectionStaffAchievements-entry row mb-2">
                                                <div class="form-group col-md-9">
                                                    <textarea class="form-control" name="sectionStaffAchievementsObjectives[{{ $index }}]" placeholder="Staff Achievement" required>{{ $objective }}</textarea>
                                                </div>
                                                <div class="form-group col-md-3 text-end">
                                                    <button type="button" class="btn btn-danger removesectionStaffAchievementsBtn" onclick="removeStaffAchievement(this)">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="sectionStaffAchievements-entry row mb-2">
                                            <div class="form-group col-md-9">
                                                <textarea class="form-control" name="sectionStaffAchievementsObjectives[0]" placeholder="Staff Achievement" required></textarea>
                                            </div>
                                            <div class="form-group col-md-3 text-end">
                                                <button type="button" class="btn btn-danger removesectionStaffAchievementsBtn" onclick="removeStaffAchievement(this)">Remove</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="button" id="addStaffAchievementBtn" class="btn btn-info" onclick="addStaffAchievement()">Add Achievement</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Staff Achievements</button>
                            </div>
                        </form>
                    </div>



<!-- Department Achievements - Students -->
<div class="card-header">
    <h3 class="bold">Department Achievements - Students</h3>
</div>

<div class="card-block">
    <form id="studentAchievementsForm" class="needs-validation" method="POST" action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
        @csrf
        <div class="row">
            <!-- Student Achievements Section -->
            <div id="studentAchievementsContainer" class="col-md-12">
                <h4>Student Achievements </h4>
                @if(!empty($studentAchievements))
                    @foreach($studentAchievements as $year => $achievements)
                        <div class="student-year-entry mb-4">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" name="studentAchievements[{{ $loop->index }}][year]" placeholder="Year" value="{{ $year }}" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeYearStaffAcheivements(this)">Remove Year</button>
                                </div>
                            </div>
                            <div class="year-achievements-container">
                                @foreach($achievements as $achievementIndex => $achievement)
                                    <div class="student-achievement-entry row mb-2">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][title]" placeholder="Achievement Title" value="{{ $achievement['title'] }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="file" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][image]" accept="image/*">
                                            <img src="{{ isset($achievement['achievementsImageFile']) ? $baseurl.'uploads/achievements/'.$achievement['achievementsImageFile'] : '' }}" alt="Achievement Image" width="70" height="70">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <textarea class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][description]" placeholder="Achievement Description" required>{{ $achievement['description'] }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removeAchievement(this)">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-info" onclick="addAchievement(this, {{ $loop->index }})">Add Achievement</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="student-year-entry mb-4">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" name="studentAchievements[0][year]" placeholder="Year" required>
                            </div>
                            <div class="form-group col-md-2 text-end">
                                <button type="button" class="btn btn-danger" onclick="removeYearStaffAcheivements(this)">Remove Year</button>
                            </div>
                        </div>
                        <div class="year-achievements-container">
                            <div class="student-achievement-entry row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][title]" placeholder="Achievement Title" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" name="studentAchievements[0][achievements][0][image]" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <textarea class="form-control" name="studentAchievements[0][achievements][0][description]" placeholder="Achievement Description" required></textarea>
                                </div>
                                <div class="form-group col-md-6 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeAchievement(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-info" onclick="addAchievement(this, 0)">Add Achievement</button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-12 text-center mt-4">
                <button type="button" id="addYearStaffAcheivementsBtn" class="btn btn-primary" onclick="addYearStaffAcheivements()">Add Year</button>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Save Student Achievements</button>
        </div>
    </form>
</div>









<!-- Department Achievements - Students -->
<div class="card-header">
    <h3 class="bold">Department Achievements - Students</h3>
</div>

<div class="card-block">
    <form id="studentAchievementsForm" class="needs-validation" method="POST" action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => 'StudentAchievementsTableFormat']) }}">
        @csrf
        <div class="row">
            <!-- Student Achievements Section -->
            <div id="studentAchievementsContainerstudentAchievementsTableFormat" class="col-md-12">
                <h4>Student Achievements </h4>
                @if(!empty($studentAchievements))
                    @foreach($studentAchievements as $year => $achievements)
                        <div class="student-year-entry mb-4">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" name="studentAchievements[{{ $loop->index }}][year]" placeholder="Year" value="{{ $year }}" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeYearStudentAchievements(this)">Remove Year</button>
                                </div>
                            </div>
                            <div class="year-achievements-container">
                                @foreach($achievements as $achievementIndex => $achievement)
                                    <div class="student-achievement-entry row mb-2">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][studentName]" placeholder="Student Name" value="{{ $achievement['studentName'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][eventNature]" placeholder="Event Nature" value="{{ $achievement['eventNature'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][eventName]" placeholder="Event Name" value="{{ $achievement['eventName'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][periodDate]" placeholder="Period Date" value="{{ $achievement['periodDate'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][organizedBy]" placeholder="Organized By" value="{{ $achievement['organizedBy'] }}" required>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <input type="text" class="form-control" name="studentAchievements[{{ $loop->parent->index }}][achievements][{{ $achievementIndex }}][awards]" placeholder="Awards" value="{{ $achievement['awards'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removeAchievement(this)">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-info" onclick="addAchievement(this, {{ $loop->index }})">Add Achievement</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="student-year-entry mb-4">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" name="studentAchievements[0][year]" placeholder="Year" required>
                            </div>
                            <div class="form-group col-md-2 text-end">
                                <button type="button" class="btn btn-danger" onclick="removeYearStudentAchievements(this)">Remove Year</button>
                            </div>
                        </div>
                        <div class="year-achievements-container">
                            <div class="student-achievement-entry row mb-2">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][studentName]" placeholder="Student Name" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][eventNature]" placeholder="Event Nature" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][eventName]" placeholder="Event Name" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][periodDate]" placeholder="Period Date" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][organizedBy]" placeholder="Organized By" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control" name="studentAchievements[0][achievements][0][awards]" placeholder="Awards" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeAchievementstudentAchievementsTableFormat(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-info" onclick="addAchievementstudentAchievementsTableFormat(this, 0)">Add Achievement</button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-12 text-center mt-4">
                <button type="button" id="addYearStudentAchievementsBtn" class="btn btn-primary" onclick="addYearStudentAchievementsstudentAchievementsTableFormat()">Add Year</button>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Save Student Achievements</button>
        </div>
    </form>
</div>

<script>
    // Add a new year
    function addYearStudentAchievementsstudentAchievementsTableFormat() {
        const container = document.getElementById('studentAchievementsContainerstudentAchievementsTableFormat');
        const yearIndex = container.getElementsByClassName('student-year-entry').length;

        const newYear = `
            <div class="student-year-entry mb-4">
                <div class="row">
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="studentAchievements[${yearIndex}][year]" placeholder="Year" required>
                    </div>
                    <div class="form-group col-md-2 text-end">
                        <button type="button" class="btn btn-danger" onclick="removeYearStudentAchievementstf(this)">Remove Year</button>
                    </div>
                </div>
                <div class="year-achievements-container">
                    <div class="student-achievement-entry row mb-2">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][studentName]" placeholder="Student Name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][eventNature]" placeholder="Event Nature" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][eventName]" placeholder="Event Name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][periodDate]" placeholder="Period Date" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][organizedBy]" placeholder="Organized By" required>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][awards]" placeholder="Awards" required>
                        </div>
                        <div class="form-group col-md-2 text-end">
                            <button type="button" class="btn btn-danger" onclick="removeAchievement(this)">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-info" onclick="addAchievementstudentAchievementsTableFormat(this, ${yearIndex})">Add Achievement</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', newYear);
    }

    // Remove a year
    function removeYearStudentAchievementstf(button) {
       
        if (confirm('Are you sure you want to remove this  ?')) {
            button.closest('.student-year-entry').remove();
        }
    }

    // Add a new achievement
    function addAchievementstudentAchievementsTableFormat(button, yearIndex) {
        const container = button.closest('.student-year-entry').querySelector('.year-achievements-container');
        const achievementIndex = container.getElementsByClassName('student-achievement-entry').length;

        const newAchievement = `
            <div class="student-achievement-entry row mb-2">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][studentName]" placeholder="Student Name" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][eventNature]" placeholder="Event Nature" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][eventName]" placeholder="Event Name" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][periodDate]" placeholder="Period Date" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][organizedBy]" placeholder="Organized By" required>
                </div>
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][awards]" placeholder="Awards" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeAchievementstudentAchievementsTableFormat(this)">Remove</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', newAchievement);
    }

    // Remove an achievement
    function removeAchievementstudentAchievementsTableFormat(button) {
        //button.closest('.student-achievement-entry').remove();
        if (confirm('Are you sure you want to remove this ?')) {
            button.closest('.student-achievement-entry').remove();
            
        }
            
    }


</script>















<!-- Student Achievements Appreciation List -->
<div class="card-header">
    <h3 class="bold">Student Achievements Appreciation List</h3>
</div>

<div class="card-block">
    <form id="studentAchievementsAppreciationForm" class="needs-validation" method="POST" action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => 'StudentAchievementsAppreciationTableFormat']) }}">
        @csrf
        <div class="row">
            <!-- Student Achievements Appreciation List Section -->
            <div id="studentAchievementsAppreciationContainer" class="col-md-12">
                <h4>Student Achievements Appreciation List</h4>
                @if(!empty($studentAchievementsAppreciation))
                    @foreach($studentAchievementsAppreciation as $year => $appreciations)
                        <div class="student-achievement-appreciation-year-entry mb-4" id="studentAchievementsAppreciationYearEntry{{ $loop->index }}">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->index }}][year]" placeholder="Year" value="{{ $year }}" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeYearStudentAchievementsAppreciation(this)">Remove Year</button>
                                </div>
                            </div>
                            <div class="year-appreciations-container">
                                @foreach($appreciations as $appreciationIndex => $appreciation)
                                    <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry{{ $loop->parent->index }}_{{ $appreciationIndex }}">
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->parent->index }}][appreciations][{{ $appreciationIndex }}][studentName]" placeholder="Student Name" value="{{ $appreciation['studentName'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->parent->index }}][appreciations][{{ $appreciationIndex }}][yearOfStudent]" placeholder="Year of Student" value="{{ $appreciation['yearOfStudent'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->parent->index }}][appreciations][{{ $appreciationIndex }}][eventName]" placeholder="Event Name" value="{{ $appreciation['eventName'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->parent->index }}][appreciations][{{ $appreciationIndex }}][projectName]" placeholder="Project Name" value="{{ $appreciation['projectName'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->parent->index }}][appreciations][{{ $appreciationIndex }}][supervisor]" placeholder="Supervisor" value="{{ $appreciation['supervisor'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="studentAchievementsAppreciation[{{ $loop->parent->index }}][appreciations][{{ $appreciationIndex }}][status]" placeholder="Status" value="{{ $appreciation['status'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removeAchievementAppreciation(this)">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-info" onclick="addAchievementAppreciation(this, {{ $loop->index }})">Add Appreciation</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="student-achievement-appreciation-year-entry mb-4" id="studentAchievementsAppreciationYearEntry0">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" name="studentAchievementsAppreciation[0][year]" placeholder="Year" required>
                            </div>
                            <div class="form-group col-md-2 text-end">
                                <button type="button" class="btn btn-danger" onclick="removeYearStudentAchievementsAppreciation(this)">Remove Year</button>
                            </div>
                        </div>
                        <div class="year-appreciations-container">
                            <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry0_0">
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[0][appreciations][0][studentName]" placeholder="Student Name" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[0][appreciations][0][yearOfStudent]" placeholder="Year of Student" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[0][appreciations][0][eventName]" placeholder="Event Name" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[0][appreciations][0][projectName]" placeholder="Project Name" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[0][appreciations][0][supervisor]" placeholder="Supervisor" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="studentAchievementsAppreciation[0][appreciations][0][status]" placeholder="Status" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeAchievementAppreciation(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-info" onclick="addAchievementAppreciation(this, 0)">Add Appreciation</button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-12 text-center mt-4">
                <button type="button" id="addYearStudentAchievementsAppreciationBtn" class="btn btn-primary" onclick="addYearStudentAchievementsAppreciation()">Add Year</button>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Save Student Achievements Appreciation</button>
        </div>
    </form>
</div>

<script>
    // Add a new year for Student Achievements Appreciation
    function addYearStudentAchievementsAppreciation() {
        const container = document.getElementById('studentAchievementsAppreciationContainer');
        const yearIndex = container.getElementsByClassName('student-achievement-appreciation-year-entry').length;

        const newYear = `
            <div class="student-achievement-appreciation-year-entry mb-4" id="studentAchievementsAppreciationYearEntry${yearIndex}">
                <div class="row">
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][year]" placeholder="Year" required>
                    </div>
                    <div class="form-group col-md-2 text-end">
                        <button type="button" class="btn btn-danger" onclick="removeYearStudentAchievementsAppreciation(this)">Remove Year</button>
                    </div>
                </div>
                <div class="year-appreciations-container">
                    <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry${yearIndex}_0">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][0][studentName]" placeholder="Student Name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][0][yearOfStudent]" placeholder="Year of Student" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][0][eventName]" placeholder="Event Name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][0][projectName]" placeholder="Project Name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][0][supervisor]" placeholder="Supervisor" required>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][0][status]" placeholder="Status" required>
                        </div>
                        <div class="form-group col-md-2 text-end">
                            <button type="button" class="btn btn-danger" onclick="removeAchievementAppreciation(this)">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-info" onclick="addAchievementAppreciation(this, ${yearIndex})">Add Appreciation</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', newYear);
    }

    // Remove a year from Student Achievements Appreciation
    function removeYearStudentAchievementsAppreciation(button) {          
        if (confirm('Are you sure you want to remove this year and its achievements?')) {
            button.closest('.student-achievement-appreciation-year-entry').remove();
        }
    }

    // Add a new achievement to the year
    function addAchievementAppreciation(button, yearIndex) {
        const container = button.closest('.student-achievement-appreciation-year-entry').querySelector('.year-appreciations-container');
        const appreciationIndex = container.getElementsByClassName('student-achievement-appreciation-entry').length;

        const newAchievement = `
            <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry${yearIndex}_${appreciationIndex}">
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][${appreciationIndex}][studentName]" placeholder="Student Name" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][${appreciationIndex}][yearOfStudent]" placeholder="Year of Student" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][${appreciationIndex}][eventName]" placeholder="Event Name" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][${appreciationIndex}][projectName]" placeholder="Project Name" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][${appreciationIndex}][supervisor]" placeholder="Supervisor" required>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="studentAchievementsAppreciation[${yearIndex}][appreciations][${appreciationIndex}][status]" placeholder="Status" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeAchievementAppreciation(this)">Remove</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', newAchievement);
    }

    // Remove an achievement
    function removeAchievementAppreciation(button) {
       
        if (confirm('Are you sure you want to remove this year and its achievements?')) {
            button.closest('.student-achievement-appreciation-entry').remove();
        }
    }
</script>







 


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content-->

<script>
    // Add a new staff achievement
    function addStaffAchievement() {
        const container = document.getElementById('sectionStaffAchievementsContainer');
        const index = container.getElementsByClassName('sectionStaffAchievements-entry').length;

        const newEntry = `
            <div class="sectionStaffAchievements-entry row mb-2">
                <div class="form-group col-md-9">
                    <textarea class="form-control" name="sectionStaffAchievementsObjectives[${index}]" placeholder="Staff Achievement" required></textarea>
                </div>
                <div class="form-group col-md-3 text-end">
                    <button type="button" class="btn btn-danger removesectionStaffAchievementsBtn" onclick="removeStaffAchievement(this)">Remove</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', newEntry);
    }

    // Remove a staff achievement
    function removeStaffAchievement(button) {
       
        if (confirm('Are you sure you want to remove this ?')) {
            const entry = button.closest('.sectionStaffAchievements-entry');
             entry.remove();
        }
    }



    function addStudentAchievement() {
        const container = document.getElementById('studentAchievementsContainer');
        const year = new Date().getFullYear();
        const index = container.getElementsByClassName('studentAchievement-entry').length;

        const newEntry = `
            <div class="studentAchievement-entry row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="studentAchievements[${year}][${index}][title]" placeholder="Title" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="file" class="form-control" name="studentAchievements[${year}][${index}][achievementsImageFile]">
                </div>
                <div class="form-group col-md-4">
                    <textarea class="form-control" name="studentAchievements[${year}][${index}][description]" placeholder="Description" required></textarea>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', newEntry);
    }


    // Add a new year
function addYearStaffAcheivements() {
    const container = document.getElementById('studentAchievementsContainer');
    const yearIndex = container.getElementsByClassName('student-year-entry').length;

    const newYear = `
        <div class="student-year-entry mb-4">
            <div class="row">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="studentAchievements[${yearIndex}][year]" placeholder="Year" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYearStaffAcheivements(this)">Remove Year</button>
                </div>
            </div>
            <div class="year-achievements-container">
                <div class="student-achievement-entry row mb-2">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][title]" placeholder="Achievement Title" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" class="form-control" name="studentAchievements[${yearIndex}][achievements][0][image]" accept="image/*">
                    </div>
                    <div class="form-group col-md-6">
                        <textarea class="form-control" name="studentAchievements[${yearIndex}][achievements][0][description]" placeholder="Achievement Description" required></textarea>
                    </div>
                    <div class="form-group col-md-6 text-end">
                        <button type="button" class="btn btn-danger" onclick="removeAchievement(this)">Remove</button>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-info" onclick="addAchievement(this, ${yearIndex})">Add Achievement</button>
            </div>
        </div>`;
    container.insertAdjacentHTML('beforeend', newYear);
}

// Remove a year
function removeYearStaffAcheivements(button) {
    if (confirm('Are you sure you want to remove this year and its achievements?')) {
            button.closest('.student-year-entry').remove();
        }
}




// Add a new achievement
function addAchievement(button, yearIndex) {
    const container = button.closest('.student-year-entry').querySelector('.year-achievements-container');
    const achievementIndex = container.getElementsByClassName('student-achievement-entry').length;

    const newAchievement = `
        <div class="student-achievement-entry row mb-2">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][title]" placeholder="Achievement Title" required>
            </div>
            <div class="form-group col-md-6">
                <input type="file" class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][image]" accept="image/*">
            </div>
            <div class="form-group col-md-6">
                <textarea class="form-control" name="studentAchievements[${yearIndex}][achievements][${achievementIndex}][description]" placeholder="Achievement Description" required></textarea>
            </div>
            <div class="form-group col-md-6 text-end">
                <button type="button" class="btn btn-danger" onclick="removeAchievement(this)">Remove</button>
            </div>
        </div>`;
    container.insertAdjacentHTML('beforeend', newAchievement);
}

// Remove an achievement
function removeAchievement(button) {
    if (confirm('Are you sure you want to remove this achievement?')) {
            button.closest('.student-achievement-entry').remove();
        }
}




 

    // Submit form logic (if additional validation is needed)
    document.getElementById('achievementsForm').addEventListener('submit', function(event) {
        // Add any pre-submission logic here
    });

    document.getElementById('staffAchievementsForm').addEventListener('submit', function(event) {
        // Add any pre-submission logic here
    });

    //studentAchievementsForm
    document.getElementById('studentAchievementsForm').addEventListener('submit', function(event) {
        // Add any pre-submission logic here
    });

 
    document.getElementById('studentAchievementsTableFormatForm').addEventListener('submit', function(event) {
        // Add any pre-submission logic here
    });

 
    document.getElementById('studentAppreciationListForm').addEventListener('submit', function(event) {
        // Add any pre-submission logic here
    });

</script>
@endsection