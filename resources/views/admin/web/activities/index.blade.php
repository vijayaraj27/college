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


                    <?php
                    $departmentActivity = json_decode($row->departmentActivity, true);                     
                    ?>
                    <!-- Activities  List -->
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
                                <div class="year-section mb-4" data-year="{{ $year }}">
                                    <h4>Year: {{ $year }}</h4>
                                    <div class="activities-container">
                                        @foreach($activities as $index => $activity)
                                        <div class="activity-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][{{ $index }}][nameOfTheTeacherWhoAttendProgramme]"
                                                    placeholder="Name of the Teacher"
                                                    value="{{ $activity['nameOfTheTeacherWhoAttendProgramme'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][{{ $index }}][titleOfTheProgramme]"
                                                    placeholder="Title of the Programme"
                                                    value="{{ $activity['titleOfTheProgramme'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][{{ $index }}][organizer]"
                                                    placeholder="Organizer" value="{{ $activity['organizer'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="departmentActivity[{{ $year }}][{{ $index }}][duration]"
                                                    placeholder="Duration" value="{{ $activity['duration'] }}">
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
                                            onclick="addActivity(this, '{{ $year }}')">Add Activity</button>
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
                        const year = prompt('Enter the year for new activities:');
                        if (!year || isNaN(year)) {
                            alert('Please enter a valid year.');
                            return;
                        }
                        const yearSection = `
                            <div class="year-section mb-4" data-year="${year}">
                                <h4>Year: ${year}</h4>
                                <div class="activities-container"></div>
                                <div class="text-end mt-2">
                                    <button type="button" class="btn btn-info" onclick="addActivity(this, '${year}')">Add Activity</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', yearSection);
                    }

                    function addActivity(button, year) {
                        const container = button.closest('.year-section').querySelector('.activities-container');
                        const index = container.querySelectorAll('.activity-entry').length;
                        const newEntry = `
                            <div class="activity-entry row mb-2">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${year}][${index}][nameOfTheTeacherWhoAttendProgramme]" placeholder="Name of the Teacher">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${year}][${index}][titleOfTheProgramme]" placeholder="Title of the Programme">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${year}][${index}][organizer]" placeholder="Organizer">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="departmentActivity[${year}][${index}][duration]" placeholder="Duration">
                                </div>
                                <div class="form-group col-md-12 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeActivity(button) {
                        button.closest('.activity-entry').remove();
                    }
                    </script>

                    @endif


                    @if($section === 'studentParticipation')
                    <?php
                    $studentParticipation = json_decode($row->studentParticipation, true);                     
                    ?>
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
                                <div class="year-section mb-4" data-year="{{ $year }}">
                                    <h4>Year: {{ $year }}</h4>
                                    <div class="activities-container">
                                        @foreach($activities as $index => $activity)
                                        <div class="activity-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="date" class="form-control"
                                                    name="studentParticipation[{{ $year }}][{{ $index }}][eventDate]"
                                                    placeholder="Event Date" value="{{ $activity['eventDate'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $year }}][{{ $index }}][eventName]"
                                                    placeholder="Event Name" value="{{ $activity['eventName'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $year }}][{{ $index }}][conductedBy]"
                                                    placeholder="Conducted By" value="{{ $activity['conductedBy'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="studentParticipation[{{ $year }}][{{ $index }}][nameOfTheStudentsParticipated]"
                                                    placeholder="Students Participated"
                                                    value="{{ $activity['nameOfTheStudentsParticipated'] }}">
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
                                            onclick="addActivity(this, '{{ $year }}')">Add Activity</button>
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
                        const year = prompt('Enter the year for new activities:');
                        if (!year || isNaN(year)) {
                            alert('Please enter a valid year.');
                            return;
                        }
                        const yearSection = `
                            <div class="year-section mb-4" data-year="${year}">
                                <h4>Year: ${year}</h4>
                                <div class="activities-container"></div>
                                <div class="text-end mt-2">
                                    <button type="button" class="btn btn-info" onclick="addActivity(this, '${year}')">Add Activity</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', yearSection);
                    }

                    function addActivity(button, year) {
                        const container = button.closest('.year-section').querySelector('.activities-container');
                        const index = container.querySelectorAll('.activity-entry').length;
                        const newEntry = `
                                <div class="activity-entry row mb-2">
                                    <div class="form-group col-md-3">
                                        <input type="date" class="form-control" name="studentParticipation[${year}][${index}][eventDate]" placeholder="Event Date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="studentParticipation[${year}][${index}][eventName]" placeholder="Event Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="studentParticipation[${year}][${index}][conductedBy]" placeholder="Conducted By">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="studentParticipation[${year}][${index}][nameOfTheStudentsParticipated]" placeholder="Students Participated">
                                    </div>
                                    <div class="form-group col-md-12 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeActivity(button) {
                        button.closest('.activity-entry').remove();
                    }
                    </script>

                    @endif


                    @if($section === 'interInstituteEventsWinningPrize')


                    <?php
                    $interInstituteEventsWinningPrize = json_decode($row->interInstituteEventsWinningPrize, true);                     
                    ?>

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
                                <div class="year-section mb-4" data-year="{{ $year }}">
                                    <h4>Year: {{ $year }}</h4>
                                    <div class="events-container">
                                        @foreach($events as $index => $event)
                                        <div class="event-entry row mb-2">
                                            <div class="form-group col-md-3">
                                                <input type="date" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][{{ $index }}][eventDate]"
                                                    placeholder="Event Date" value="{{ $event['eventDate'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][{{ $index }}][eventName]"
                                                    placeholder="Event Name" value="{{ $event['eventName'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][{{ $index }}][conductedBy]"
                                                    placeholder="Conducted By" value="{{ $event['conductedBy'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][{{ $index }}][nameOfTheStudentsParticipated]"
                                                    placeholder="Students Participated"
                                                    value="{{ $event['nameOfTheStudentsParticipated'] }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $year }}][{{ $index }}][prizeWon]"
                                                    placeholder="Prize Won" value="{{ $event['prizeWon'] }}">
                                            </div>
                                            <div class="form-group col-md-3 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeEvent(this)">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="text-end mt-2">
                                        <button type="button" class="btn btn-info"
                                            onclick="addEvent(this, '{{ $year }}')">Add Event</button>
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
                        const year = prompt('Enter the year for new events:');
                        if (!year || isNaN(year)) {
                            alert('Please enter a valid year.');
                            return;
                        }
                        const yearSection = `
                            <div class="year-section mb-4" data-year="${year}">
                                <h4>Year: ${year}</h4>
                                <div class="events-container"></div>
                                <div class="text-end mt-2">
                                    <button type="button" class="btn btn-info" onclick="addEvent(this, '${year}')">Add Event</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', yearSection);
                    }

                    function addEvent(button, year) {
                        const container = button.closest('.year-section').querySelector('.events-container');
                        const index = container.querySelectorAll('.event-entry').length;
                        const newEntry = `
                                <div class="event-entry row mb-2">
                                    <div class="form-group col-md-3">
                                        <input type="date" class="form-control" name="interInstituteEventsWinningPrize[${year}][${index}][eventDate]" placeholder="Event Date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][${index}][eventName]" placeholder="Event Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][${index}][conductedBy]" placeholder="Conducted By">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][${index}][nameOfTheStudentsParticipated]" placeholder="Students Participated">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${year}][${index}][prizeWon]" placeholder="Prize Won">
                                    </div>
                                    <div class="form-group col-md-3 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeEvent(this)">Remove</button>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeEvent(button) {
                        button.closest('.event-entry').remove();
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