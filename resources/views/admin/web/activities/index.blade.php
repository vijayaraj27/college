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
                        <h3 class="bold">Section Activities </h3>
                    </div>

                    <!-- Department Activities Section Main Section -->
                    <div class="card-block">
                        <form id="ActivitiesForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">l
                                    <label for="photo">{{ __('field_photo') }}:
                                        <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span>
                                        <span>*</span></label> <input type="file" class="form-control" name="imageFile"
                                        placeholder="Image File">
                                    <img alt="Section Activities Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/activities/' . $row->imageFile : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Title </label>
                                    <input type="text" class="form-control" name="title" placeholder="title" required
                                        value="{{ isset($row->title) ? $row->title : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control texteditor" name="description"
                                        placeholder="Description"
                                        required>{{ isset($row->description) ? $row->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Activities Section</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'departmentActivity')
                    <!-- Department Activities -->
                    <div class="card-header">
                        <h3 class="bold">Department Activities</h3>
                    </div>

                    <div class="card-block">
                        <form id="departmentActivityForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Department Activities Section -->
                                <div id="departmentActivitiesContainer" class="col-md-12">
                                    <h4>Department Activities</h4>
                                    @php
                                    // Decode the stored JSON string to an array
                                    $departmentActivities = isset($row->departmentActivity) ?
                                    json_decode($row->departmentActivity, true) : [];

                                    // print_r($departmentActivities);
                                    @endphp

                                    @if(!empty($departmentActivities))
                                    @foreach($departmentActivities as $yearIndex => $activity)
                                    <div class="activity-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $yearIndex }}][year]" placeholder="Year"
                                                    value="{{ $activity['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearActivity(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-activities-container">
                                            @foreach($activity['activities'] as $activityIndex => $activityDetail)
                                            <div class="activity-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][teacherName]"
                                                        placeholder="Name of the Teacher"
                                                        value="{{ $activityDetail['teacherName'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][programmeTitle]"
                                                        placeholder="Title of the Programme"
                                                        value="{{ $activityDetail['programmeTitle'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][organizer]"
                                                        placeholder="Organizer"
                                                        value="{{ $activityDetail['organizer'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][duration]"
                                                        placeholder="Duration" value="{{ $activityDetail['duration'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-12 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeActivity(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addActivity(this, {{ $yearIndex }})">Add Activity</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="activity-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[0][year]" placeholder="Year" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearActivity(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-activities-container">
                                            <div class="activity-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[0][activities][0][teacherName]"
                                                        placeholder="Name of the Teacher" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[0][activities][0][programmeTitle]"
                                                        placeholder="Title of the Programme" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[0][activities][0][organizer]"
                                                        placeholder="Organizer" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[0][activities][0][duration]"
                                                        placeholder="Duration" required>
                                                </div>
                                                <div class="form-group col-md-12 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeActivity(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addActivity(this, 0)">Add Activity</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearActivityBtn" class="btn btn-primary"
                                        onclick="addYearActivity()">Add Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Department Activities</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year for department activities
                    function addYearActivity() {
                        const container = document.getElementById('departmentActivitiesContainer');
                        const yearIndex = container.getElementsByClassName('activity-year-entry').length;

                        const newYear = `
                        <div class="activity-year-entry mb-4">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" name="departmentActivity[${yearIndex}][year]" placeholder="Year" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeYearActivity(this)">Remove Year</button>
                                </div>
                            </div>
                            <div class="year-activities-container">
                                <div class="activity-entry row mb-2">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][0][teacherName]" placeholder="Name of the Teacher" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][0][programmeTitle]" placeholder="Title of the Programme" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][0][organizer]" placeholder="Organizer" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][0][duration]" placeholder="Duration" required>
                                    </div>
                                    <div class="form-group col-md-12 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-info" onclick="addActivity(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Activity</button>
                            </div>
                        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year for department activities
                    function removeYearActivity(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.activity-year-entry').remove();
                        }
                    }

                    // Add a new activity for a specific year
                    function addActivity(button, yearIndex) {
                        const container = button.closest('.activity-year-entry').querySelector(
                            '.year-activities-container');
                        const activityIndex = container.getElementsByClassName('activity-entry').length;

                        const newActivity = `
                            <div class="activity-entry row mb-2">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][${activityIndex}][teacherName]" placeholder="Name of the Teacher" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][${activityIndex}][programmeTitle]" placeholder="Title of the Programme" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][${activityIndex}][organizer]" placeholder="Organizer" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${yearIndex}][activities][${activityIndex}][duration]" placeholder="Duration" required>
                                </div>
                                <div class="form-group col-md-12 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newActivity);
                    }

                    // Remove an activity entry
                    function removeActivity(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.activity-entry').remove();
                        }
                    }
                    </script>
                    @endif



                    @if($section === 'studentParticipation')
                    <!-- Student Participation -->
                    <div class="card-header">
                        <h3 class="bold">Student Participation</h3>
                    </div>

                    <div class="card-block">
                        <form id="studentParticipationForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Student Participation Section -->
                                <div id="studentParticipationContainer" class="col-md-12">
                                    <h4>Student Participation</h4>
                                    @php
                                    // Decode the stored JSON string to an array
                                    $studentParticipation = isset($row->studentParticipation) ?
                                    json_decode($row->studentParticipation, true) : [];
                                    @endphp

                                    @if(!empty($studentParticipation))
                                    @foreach($studentParticipation as $yearIndex => $activity)
                                    <div class="participation-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $yearIndex }}][year]"
                                                    placeholder="Year" value="{{ $activity['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearParticipation(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-participations-container">
                                            @foreach($activity['participations'] as $participationIndex =>
                                            $participationDetail)
                                            <div class="participation-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][eventDate]"
                                                        placeholder="Event Date"
                                                        value="{{ $participationDetail['eventDate'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][eventName]"
                                                        placeholder="Event Name"
                                                        value="{{ $participationDetail['eventName'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][conductedBy]"
                                                        placeholder="Conducted By"
                                                        value="{{ $participationDetail['conductedBy'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][nameOfTheStudentsParticipated]"
                                                        placeholder="Name of the Students Participated"
                                                        value="{{ $participationDetail['nameOfTheStudentsParticipated'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeParticipation(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addParticipation(this, {{ $yearIndex }})">Add
                                                Participation</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="participation-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[0][year]" placeholder="Year" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearParticipation(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-participations-container">
                                            <div class="participation-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control"
                                                        name="studentParticipation[0][participations][0][eventDate]"
                                                        placeholder="Event Date" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[0][participations][0][eventName]"
                                                        placeholder="Event Name" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[0][participations][0][conductedBy]"
                                                        placeholder="Conducted By" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[0][participations][0][nameOfTheStudentsParticipated]"
                                                        placeholder="Name of the Students Participated" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeParticipation(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addParticipation(this, 0)">Add Participation</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearParticipationBtn" class="btn btn-primary"
                                        onclick="addYearParticipation()">Add Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Student Participation</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year for student participation
                    function addYearParticipation() {
                        const container = document.getElementById('studentParticipationContainer');
                        const yearIndex = container.getElementsByClassName('participation-year-entry').length;

                        const newYear = `
        <div class="participation-year-entry mb-4">
            <div class="row">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="studentParticipation[${yearIndex}][year]" placeholder="Year" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYearParticipation(this)">Remove Year</button>
                </div>
            </div>
            <div class="year-participations-container">
                <div class="participation-entry row mb-2">
                    <div class="form-group col-md-3">
                        <input type="date" class="form-control" name="studentParticipation[${yearIndex}][participations][0][eventDate]" placeholder="Event Date" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="studentParticipation[${yearIndex}][participations][0][eventName]" placeholder="Event Name" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="studentParticipation[${yearIndex}][participations][0][conductedBy]" placeholder="Conducted By" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="studentParticipation[${yearIndex}][participations][0][nameOfTheStudentsParticipated]" placeholder="Name of the Students Participated" required>
                    </div>
                    <div class="form-group col-md-2 text-end">
                        <button type="button" class="btn btn-danger" onclick="removeParticipation(this)">Remove</button>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-info" onclick="addParticipation(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Participation</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year for student participation
                    function removeYearParticipation(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.participation-year-entry').remove();
                        }
                    }

                    // Add a new participation for a specific year
                    function addParticipation(button, yearIndex) {
                        const container = button.closest('.participation-year-entry').querySelector(
                            '.year-participations-container');
                        const participationIndex = container.getElementsByClassName('participation-entry').length;

                        const newParticipation = `
                            <div class="participation-entry row mb-2">
                                <div class="form-group col-md-3">
                                    <input type="date" class="form-control" name="studentParticipation[${yearIndex}][participations][${participationIndex}][eventDate]" placeholder="Event Date" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="studentParticipation[${yearIndex}][participations][${participationIndex}][eventName]" placeholder="Event Name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="studentParticipation[${yearIndex}][participations][${participationIndex}][conductedBy]" placeholder="Conducted By" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="studentParticipation[${yearIndex}][participations][${participationIndex}][nameOfTheStudentsParticipated]" placeholder="Name of the Students Participated" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeParticipation(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newParticipation);
                    }

                    // Remove a participation entry
                    function removeParticipation(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.participation-entry').remove();
                        }
                    }
                    </script>
                    @endif




                    @if($section === 'interInstituteEventsWinningPrize')
                    <!-- Inter Institute Events Winning Prize -->
                    <div class="card-header">
                        <h3 class="bold">Inter Institute Events Winning Prize</h3>
                    </div>

                    <div class="card-block">
                        <form id="interInstituteEventsForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Inter Institute Events Section -->
                                <div id="interInstituteEventsContainer" class="col-md-12">
                                    <h4>Inter Institute Events Winning Prize</h4>
                                    @php
                                    // Decode the stored JSON string to an array
                                    $interInstituteEvents = isset($row->interInstituteEventsWinningPrize) ?
                                    json_decode($row->interInstituteEventsWinningPrize, true) : [];
                                    @endphp

                                    @if(!empty($interInstituteEvents))
                                    @foreach($interInstituteEvents as $yearIndex => $event)
                                    <div class="event-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $yearIndex }}][year]"
                                                    placeholder="Year" value="{{ $event['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearEvent(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-events-container">
                                            @foreach($event['events'] as $eventIndex => $eventDetail)
                                            <div class="event-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][eventDate]"
                                                        placeholder="Event Date" value="{{ $eventDetail['eventDate'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][eventName]"
                                                        placeholder="Event Name" value="{{ $eventDetail['eventName'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][conductedBy]"
                                                        placeholder="Conducted By"
                                                        value="{{ $eventDetail['conductedBy'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][nameOfTheStudentsParticipated]"
                                                        placeholder="Name of the Students Participated"
                                                        value="{{ $eventDetail['nameOfTheStudentsParticipated'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][prizeWon]"
                                                        placeholder="Prize Won" value="{{ $eventDetail['prizeWon'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeEvent(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addEvent(this, {{ $yearIndex }})">Add Event</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="event-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[0][year]" placeholder="Year"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearEvent(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-events-container">
                                            <div class="event-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control"
                                                        name="interInstituteEventsWinningPrize[0][events][0][eventDate]"
                                                        placeholder="Event Date" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[0][events][0][eventName]"
                                                        placeholder="Event Name" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[0][events][0][conductedBy]"
                                                        placeholder="Conducted By" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[0][events][0][nameOfTheStudentsParticipated]"
                                                        placeholder="Name of the Students Participated" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[0][events][0][prizeWon]"
                                                        placeholder="Prize Won" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeEvent(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info" onclick="addEvent(this, 0)">Add
                                                Event</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearEventBtn" class="btn btn-primary"
                                        onclick="addYearEvent()">Add Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Event Prize Details</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year for inter institute events winning prize
                    function addYearEvent() {
                        const container = document.getElementById('interInstituteEventsContainer');
                        const yearIndex = container.getElementsByClassName('event-year-entry').length;

                        const newYear = `
        <div class="event-year-entry mb-4">
            <div class="row">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][year]" placeholder="Year" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYearEvent(this)">Remove Year</button>
                </div>
            </div>
            <div class="year-events-container">
                <div class="event-entry row mb-2">
                    <div class="form-group col-md-3">
                        <input type="date" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][0][eventDate]" placeholder="Event Date" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][0][eventName]" placeholder="Event Name" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][0][conductedBy]" placeholder="Conducted By" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][0][nameOfTheStudentsParticipated]" placeholder="Name of the Students Participated" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][0][prizeWon]" placeholder="Prize Won" required>
                    </div>
                    <div class="form-group col-md-2 text-end">
                        <button type="button" class="btn btn-danger" onclick="removeEvent(this)">Remove</button>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-info" onclick="addEvent(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Event</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year for inter institute events winning prize
                    function removeYearEvent(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.event-year-entry').remove();
                        }
                    }

                    // Add a new event for a specific year
                    function addEvent(button, yearIndex) {
                        const container = button.closest('.event-year-entry').querySelector('.year-events-container');
                        const eventIndex = container.getElementsByClassName('event-entry').length;

                        const newEvent = `
        <div class="event-entry row mb-2">
            <div class="form-group col-md-3">
                <input type="date" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][${eventIndex}][eventDate]" placeholder="Event Date" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][${eventIndex}][eventName]" placeholder="Event Name" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][${eventIndex}][conductedBy]" placeholder="Conducted By" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][${eventIndex}][nameOfTheStudentsParticipated]" placeholder="Name of the Students Participated" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][events][${eventIndex}][prizeWon]" placeholder="Prize Won" required>
            </div>
            <div class="form-group col-md-2 text-end">
                <button type="button" class="btn btn-danger" onclick="removeEvent(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newEvent);
                    }

                    // Remove an event entry
                    function removeEvent(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.event-entry').remove();
                        }
                    }
                    </script>
                    @endif



                    @if($section === 'industrialVisit')
                    <div class="card-header">
                        <h3 class="bold">Industrial Visits</h3>
                    </div>
                    <div class="card-block">
                        <form id="industrialVisitForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="industrialVisitContainer">
                                <!-- Dynamic Visits Section -->
                                @foreach($industrialVisit as $index => $visit)
                                <div class="visit-entry row mb-3">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control"
                                            name="industrialVisit[{{ $index }}][nameOftheIndustry]"
                                            placeholder="Industry Name" value="{{ $visit['nameOftheIndustry'] ?? '' }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control"
                                            name="industrialVisit[{{ $index }}][semester]" placeholder="Semester"
                                            value="{{ $visit['semester'] ?? '' }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control"
                                            name="industrialVisit[{{ $index }}][staffAccompanied]"
                                            placeholder="Staff Accompanied"
                                            value="{{ $visit['staffAccompanied'] ?? '' }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control"
                                            name="industrialVisit[{{ $index }}][Duration]" placeholder="Duration"
                                            value="{{ $visit['Duration'] ?? '' }}" required>
                                    </div>
                                    <div class="form-group col-md-12 text-end">
                                        <button type="button" class="btn btn-danger"
                                            onclick="removeVisit(this)">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-info" onclick="addVisit()">Add Visit</button>
                                <button type="submit" class="btn btn-success">Save Visits</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addVisit() {
                        const container = document.getElementById('industrialVisitContainer');
                        const index = container.querySelectorAll('.visit-entry').length;
                        const newVisit = `
                        <div class="visit-entry row mb-3">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="industrialVisit[${index}][nameOftheIndustry]" placeholder="Industry Name" required>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="industrialVisit[${index}][semester]" placeholder="Semester" required>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="industrialVisit[${index}][staffAccompanied]" placeholder="Staff Accompanied" required>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="industrialVisit[${index}][Duration]" placeholder="Duration" required>
                            </div>
                            <div class="form-group col-md-12 text-end">
                                <button type="button" class="btn btn-danger" onclick="removeVisit(this)">Remove</button>
                            </div>
                        </div>`;
                        container.insertAdjacentHTML('beforeend', newVisit);
                    }

                    function removeVisit(button) {
                        button.closest('.visit-entry').remove();
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