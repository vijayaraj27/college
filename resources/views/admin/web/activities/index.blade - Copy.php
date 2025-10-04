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
                                    <label for="photo">{{ __('field_photo') }}: <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span> <span>*</span></label> <input type="file" class="form-control" name="imageFile" placeholder="Image File">
                                    <img alt="Section Activities Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/activities/' . $row->imageFile : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
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


                    <div class="card-header">
                        <h3 class="bold">Department Activities</h3>
                    </div>
                    <div class="card-block">
                        <form id="departmentActivityForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="departmentActivitiesContainer">
                                <!-- Dynamic Year Section -->
                                @foreach($departmentActivity as $year => $activities)
                                <div class="year-section mb-4" id="activityYearEntry{{ $year }}">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control"
                                                name="departmentActivity[{{ $year }}][year]" placeholder="Year"
                                                value="{{ $year }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeYear(this)">Remove Year</button>
                                        </div>
                                    </div>
                                    <div class="activities-container">
                                        @foreach($activities as $index => $activity)
                                        <div class="activity-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][entries][{{ $index }}][nameOfTheTeacherWhoAttendProgramme]"
                                                    placeholder="Name of the Teacher"
                                                    value="{{ $activity['nameOfTheTeacherWhoAttendProgramme'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][entries][{{ $index }}][titleOfTheProgramme]"
                                                    placeholder="Title of the Programme"
                                                    value="{{ $activity['titleOfTheProgramme'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][entries][{{ $index }}][organizer]"
                                                    placeholder="Organizer" value="{{ $activity['organizer'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][entries][{{ $index }}][duration]"
                                                    placeholder="Duration" value="{{ $activity['duration'] }}" required>
                                            </div>
                                            <div class="form-group col-md-12 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeActivity(this)">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="text-end mt-2">
                                        <button type="button" class="btn btn-info"
                                            onclick="addActivity('{{ $year }}')">Add Activity</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary" onclick="addYear()">Add Year</button>
                                <button type="submit" class="btn btn-success">Save Department Activities</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addYear() {
                        const container = document.getElementById('departmentActivitiesContainer');
                        const year = new Date().getFullYear();
                        const newYear = `
        <div class="year-section mb-4" id="activityYearEntry${year}">
            <div class="row mb-3">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="departmentActivity[${year}][year]" 
                           placeholder="Year" value="${year}" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYear(this)">Remove Year</button>
                </div>
            </div>
            <div class="activities-container"></div>
            <div class="text-end mt-2">
                <button type="button" class="btn btn-info" onclick="addActivity('${year}')">Add Activity</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    function removeYear(button) {
                        if (confirm('Are you sure you want to remove this year and its activities?')) {
                            button.closest('.year-section').remove();
                        }
                    }

                    function addActivity(year) {
                        const container = document.querySelector(`#activityYearEntry${year} .activities-container`);
                        const index = container.querySelectorAll('.activity-entry').length;
                        const newActivity = `
        <div class="activity-entry row mb-2">
            <div class="form-group col-md-3">
                <input type="text" class="form-control" 
                       name="departmentActivity[${year}][entries][${index}][nameOfTheTeacherWhoAttendProgramme]"
                       placeholder="Name of the Teacher" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" 
                       name="departmentActivity[${year}][entries][${index}][titleOfTheProgramme]"
                       placeholder="Title of the Programme" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" 
                       name="departmentActivity[${year}][entries][${index}][organizer]"
                       placeholder="Organizer" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" 
                       name="departmentActivity[${year}][entries][${index}][duration]"
                       placeholder="Duration" required>
            </div>
            <div class="form-group col-md-12 text-end">
                <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newActivity);
                    }

                    function removeActivity(button) {
                        if (confirm('Are you sure you want to remove this activity?')) {
                            button.closest('.activity-entry').remove();
                        }
                    }
                    </script>
                    @endif



                    @if($section === 'studentParticipation')
                    <div class="card-header">
                        <h3 class="bold">Student Participation</h3>
                    </div>
                    <div class="card-block">
                        <form id="studentParticipationForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="studentParticipationContainer">
                                <!-- Dynamic Year Section -->
                                @foreach($studentParticipation as $year => $activities)
                                <div class="year-entry mb-4" id="participationYearEntry{{ $year }}">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control"
                                                name="studentParticipation[{{ $year }}][year]" placeholder="Year"
                                                value="{{ $year }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeYear(this)">Remove Year</button>
                                        </div>
                                    </div>
                                    <div class="activities-container">
                                        @foreach($activities['entries'] as $index => $activity)
                                        <div class="activity-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="date" class="form-control"
                                                    name="studentParticipation[{{ $year }}][entries][{{ $index }}][eventDate]"
                                                    placeholder="Event Date" value="{{ $activity['eventDate'] ?? '' }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $year }}][entries][{{ $index }}][eventName]"
                                                    placeholder="Event Name" value="{{ $activity['eventName'] ?? '' }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $year }}][entries][{{ $index }}][conductedBy]"
                                                    placeholder="Conducted By"
                                                    value="{{ $activity['conductedBy'] ?? '' }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $year }}][entries][{{ $index }}][nameOfTheStudentsParticipated]"
                                                    placeholder="Students Participated"
                                                    value="{{ $activity['nameOfTheStudentsParticipated'] ?? '' }}"
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
                                            onclick="addActivity('{{ $year }}')">Add Activity</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary" onclick="addYear()">Add Year</button>
                                <button type="submit" class="btn btn-success">Save Student Participation</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addYear() {
                        const container = document.getElementById('studentParticipationContainer');
                        const year = new Date().getFullYear();
                        const newYear = `
        <div class="year-entry mb-4" id="participationYearEntry${year}">
            <div class="row mb-3">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="studentParticipation[${year}][year]" placeholder="Year" value="${year}" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYear(this)">Remove Year</button>
                </div>
            </div>
            <div class="activities-container"></div>
            <div class="text-end">
                <button type="button" class="btn btn-info" onclick="addActivity('${year}')">Add Activity</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    function removeYear(button) {
                        if (confirm('Are you sure you want to remove this year and its activities?')) {
                            button.closest('.year-entry').remove();
                        }
                    }

                    function addActivity(year) {
                        const container = document.querySelector(
                            `#participationYearEntry${year} .activities-container`);
                        const index = container.querySelectorAll('.activity-entry').length;
                        const newActivity = `
        <div class="activity-entry row mb-2">
            <div class="form-group col-md-3">
                <input type="date" class="form-control" name="studentParticipation[${year}][entries][${index}][eventDate]" placeholder="Event Date" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="studentParticipation[${year}][entries][${index}][eventName]" placeholder="Event Name" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="studentParticipation[${year}][entries][${index}][conductedBy]" placeholder="Conducted By" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="studentParticipation[${year}][entries][${index}][nameOfTheStudentsParticipated]" placeholder="Students Participated" required>
            </div>
            <div class="form-group col-md-12 text-end">
                <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newActivity);
                    }

                    function removeActivity(button) {
                        if (confirm('Are you sure you want to remove this activity?')) {
                            button.closest('.activity-entry').remove();
                        }
                    }
                    </script>
                    @endif



                    @if($section === 'interInstituteEventsWinningPrize')
                    <div class="card-header">
                        <h3 class="bold">Inter-Institute Events Winning Prize</h3>
                    </div>
                    <div class="card-block">
                        <form id="interInstituteEventsWinningPrizeForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="interInstituteEventsWinningPrizeContainer">
                                <!-- Dynamic Year Section -->
                                @foreach($interInstituteEventsWinningPrize as $year => $events)
                                <div class="year-entry mb-4" id="eventYearEntry{{ $year }}">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control"
                                                name="interInstituteEventsWinningPrize[{{ $year }}][year]"
                                                placeholder="Year" value="{{ $year }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeYear(this)">Remove Year</button>
                                        </div>
                                    </div>
                                    <div class="events-container">
                                        @foreach($events['entries'] as $index => $event)
                                        <div class="event-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="date" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][entries][{{ $index }}][eventDate]"
                                                    placeholder="Event Date" value="{{ $event['eventDate'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][entries][{{ $index }}][eventName]"
                                                    placeholder="Event Name" value="{{ $event['eventName'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][entries][{{ $index }}][conductedBy]"
                                                    placeholder="Conducted By" value="{{ $event['conductedBy'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][entries][{{ $index }}][nameOfTheStudentsParticipated]"
                                                    placeholder="Students Participated"
                                                    value="{{ $event['nameOfTheStudentsParticipated'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][entries][{{ $index }}][prizeWon]"
                                                    placeholder="Prize Won" value="{{ $event['prizeWon'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeEvent(this)">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" onclick="addEvent('{{ $year }}')">Add
                                            Event</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary" onclick="addYear()">Add Year</button>
                                <button type="submit" class="btn btn-success">Save Events</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addYear() {
                        const container = document.getElementById('interInstituteEventsWinningPrizeContainer');
                        const year = new Date().getFullYear();
                        const newYear = `
        <div class="year-entry mb-4" id="eventYearEntry${year}">
            <div class="row mb-3">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][year]" placeholder="Year" value="${year}" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYear(this)">Remove Year</button>
                </div>
            </div>
            <div class="events-container"></div>
            <div class="text-end">
                <button type="button" class="btn btn-info" onclick="addEvent('${year}')">Add Event</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    function removeYear(button) {
                        if (confirm('Are you sure you want to remove this year and its events?')) {
                            button.closest('.year-entry').remove();
                        }
                    }

                    function addEvent(year) {
                        const container = document.querySelector(`#eventYearEntry${year} .events-container`);
                        const index = container.querySelectorAll('.event-entry').length;
                        const newEvent = `
        <div class="event-entry row mb-2">
            <div class="form-group col-md-3">
                <input type="date" class="form-control" name="interInstituteEventsWinningPrize[${year}][entries][${index}][eventDate]" placeholder="Event Date" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][entries][${index}][eventName]" placeholder="Event Name" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][entries][${index}][conductedBy]" placeholder="Conducted By" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][entries][${index}][nameOfTheStudentsParticipated]" placeholder="Students Participated" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][entries][${index}][prizeWon]" placeholder="Prize Won" required>
            </div>
            <div class="form-group col-md-3 text-end">
                <button type="button" class="btn btn-danger" onclick="removeEvent(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newEvent);
                    }

                    function removeEvent(button) {
                        if (confirm('Are you sure you want to remove this event?')) {
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
                            <div id="industrialVisitsContainer">
                                <!-- Dynamic Year Section -->
                                @foreach($industrialVisit as $yearData)
                                <div class="year-section mb-4" id="visitYearEntry{{ $yearData['year'] }}">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control"
                                                name="industrialVisit[{{ $yearData['year'] }}][year]" placeholder="Year"
                                                value="{{ $yearData['year'] }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeYear(this)">Remove Year</button>
                                        </div>
                                    </div>
                                    <div class="visits-container">
                                        @foreach($yearData['entries'] as $index => $visit)
                                        <div class="visit-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="industrialVisit[{{ $yearData['year'] }}][entries][{{ $index }}][nameOftheIndustry]"
                                                    placeholder="Name of the Industry"
                                                    value="{{ $visit['nameOftheIndustry'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="industrialVisit[{{ $yearData['year'] }}][entries][{{ $index }}][semester]"
                                                    placeholder="Semester" value="{{ $visit['semester'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="industrialVisit[{{ $yearData['year'] }}][entries][{{ $index }}][staffAccompanied]"
                                                    placeholder="Staff Accompanied"
                                                    value="{{ $visit['staffAccompanied'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="industrialVisit[{{ $yearData['year'] }}][entries][{{ $index }}][Duration]"
                                                    placeholder="Duration" value="{{ $visit['Duration'] }}" required>
                                            </div>
                                            <div class="form-group col-md-12 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeVisit(this)">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="text-end mt-2">
                                        <button type="button" class="btn btn-info"
                                            onclick="addVisit('{{ $yearData['year'] }}')">Add Visit</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary" onclick="addYear()">Add Year</button>
                                <button type="submit" class="btn btn-success">Save Industrial Visits</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addYear() {
                        const container = document.getElementById('industrialVisitsContainer');
                        const year = prompt('Enter the year for new activities:');

                        if (!year || isNaN(year)) {
                            alert('Please enter a valid year.');
                            return;
                        }

                        const newYear = `
        <div class="year-section mb-4" id="visitYearEntry${year}">
            <div class="row mb-3">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="industrialVisit[${year}][year]" placeholder="Year" value="${year}" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYear(this)">Remove Year</button>
                </div>
            </div>
            <div class="visits-container"></div>
            <div class="text-end mt-2">
                <button type="button" class="btn btn-info" onclick="addVisit('${year}')">Add Visit</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }


                    function removeYear(button) {
                        if (confirm('Are you sure you want to remove this year and its visits?')) {
                            button.closest('.year-section').remove();
                        }
                    }

                    function addVisit(year) {
                        const container = document.querySelector(`#visitYearEntry${year} .visits-container`);
                        const index = container.querySelectorAll('.visit-entry').length;
                        const newVisit = `
        <div class="visit-entry row mb-2">
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="industrialVisit[${year}][entries][${index}][nameOftheIndustry]" placeholder="Name of the Industry" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="industrialVisit[${year}][entries][${index}][semester]" placeholder="Semester" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="industrialVisit[${year}][entries][${index}][staffAccompanied]" placeholder="Staff Accompanied" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="industrialVisit[${year}][entries][${index}][Duration]" placeholder="Duration" required>
            </div>
            <div class="form-group col-md-12 text-end">
                <button type="button" class="btn btn-danger" onclick="removeVisit(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newVisit);
                    }

                    function removeVisit(button) {
                        if (confirm('Are you sure you want to remove this visit?')) {
                            button.closest('.visit-entry').remove();
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