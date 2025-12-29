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
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            onsubmit="reindexAllDepartmentActivities(); return true;">
                            @csrf
                            <input type="hidden" name="departmentId" value="{{ $departmentId }}">
                            <input type="hidden" name="section" value="{{ $section }}">
                            <div class="row">
                                <!-- Department Activities Section -->
                                <div id="departmentActivitiesContainer" class="col-md-12">
                                    <h4>Department Activities</h4>
                                    @php
                                    // Use the already decoded data from controller
                                    $departmentActivities = $departmentActivity ?? [];

                                    // print_r($departmentActivities);
                                    @endphp

                                    @if(!empty($departmentActivities))
                                    @foreach($departmentActivities as $yearIndex => $activity)
                                    <div class="activity-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label for="activityYear_{{ $yearIndex }}">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                <input type="text" class="form-control" id="activityYear_{{ $yearIndex }}"
                                                    name="departmentActivity[{{ $yearIndex }}][year]" placeholder="e.g., 2023-24"
                                                    value="{{ isset($activity['year']) ? $activity['year'] : '' }}" required>
                                                <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearActivity(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-activities-container">
                                            @if(isset($activity['activities']) && is_array($activity['activities']))
                                            @foreach($activity['activities'] as $activityIndex => $activityDetail)
                                            <div class="activity-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][teacherName]"
                                                        placeholder="Name of the Teacher"
                                                        value="{{ isset($activityDetail['teacherName']) ? $activityDetail['teacherName'] : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][programmeTitle]"
                                                        placeholder="Title of the Programme"
                                                        value="{{ isset($activityDetail['programmeTitle']) ? $activityDetail['programmeTitle'] : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][organizer]"
                                                        placeholder="Organizer"
                                                        value="{{ isset($activityDetail['organizer']) ? $activityDetail['organizer'] : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="departmentActivity[{{ $yearIndex }}][activities][{{ $activityIndex }}][duration]"
                                                        placeholder="Duration" value="{{ isset($activityDetail['duration']) ? $activityDetail['duration'] : '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-12 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeActivity(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
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
                                                <label for="activityYear_0">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                <input type="text" class="form-control" id="activityYear_0"
                                                    name="departmentActivity[0][year]" placeholder="e.g., 2023-24" required>
                                                <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                    // Re-index ALL activity entries to ensure sequential indices before submission
                    function reindexAllDepartmentActivities() {
                        const container = document.getElementById('departmentActivitiesContainer');
                        const yearEntries = container.querySelectorAll('.activity-year-entry');
                        
                        yearEntries.forEach((yearEntry, yearIndex) => {
                            // Update year input index
                            const yearInput = yearEntry.querySelector('input[name*="[year]"]');
                            if (yearInput) {
                                yearInput.name = `departmentActivity[${yearIndex}][year]`;
                            }
                            
                            // Re-index all activity entries within this year
                            const activityEntries = yearEntry.querySelectorAll('.activity-entry');
                            activityEntries.forEach((activityEntry, activityIndex) => {
                                const inputs = activityEntry.querySelectorAll('input[name*="[activities]"]');
                                inputs.forEach(input => {
                                    // Extract the field name
                                    const fieldMatch = input.name.match(/\[activities\]\[\d+\]\[(\w+)\]/);
                                    if (fieldMatch) {
                                        const fieldName = fieldMatch[1];
                                        // Set new name with sequential indices
                                        input.name = `departmentActivity[${yearIndex}][activities][${activityIndex}][${fieldName}]`;
                                    }
                                });
                            });
                        });
                    }
                    
                    // Add a new year for department activities
                    function addYearActivity() {
                        const container = document.getElementById('departmentActivitiesContainer');
                        const yearIndex = container.getElementsByClassName('activity-year-entry').length;

                        const newYear = `
                        <div class="activity-year-entry mb-4">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label>Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                    <input type="text" class="form-control" name="departmentActivity[${yearIndex}][year]" placeholder="e.g., 2023-24" required>
                                    <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            onsubmit="reindexAllStudentParticipations(); return true;">
                            @csrf
                            <input type="hidden" name="departmentId" value="{{ $departmentId }}">
                            <input type="hidden" name="section" value="{{ $section }}">
                            <div class="row">
                                <!-- Student Participation Section -->
                                <div id="studentParticipationContainer" class="col-md-12">
                                    <h4>Student Participation</h4>
                                    @php
                                    // Use the already decoded data from controller
                                    // Note: $studentParticipation is already decoded in controller
                                    @endphp

                                    @if(!empty($studentParticipation))
                                    @foreach($studentParticipation as $yearIndex => $activity)
                                    <div class="participation-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label for="participationYear_{{ $yearIndex }}">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                <input type="text" class="form-control" id="participationYear_{{ $yearIndex }}"
                                                    name="studentParticipation[{{ $yearIndex }}][year]"
                                                    placeholder="e.g., 2023-24" value="{{ isset($activity['year']) ? $activity['year'] : '' }}" required>
                                                <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearParticipation(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-participations-container">
                                            @if(isset($activity['participations']) && is_array($activity['participations']))
                                            @foreach($activity['participations'] as $participationIndex =>
                                            $participationDetail)
                                            <div class="participation-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][eventDate]"
                                                        placeholder="Event Date"
                                                        value="{{ isset($participationDetail['eventDate']) ? $participationDetail['eventDate'] : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][eventName]"
                                                        placeholder="Event Name"
                                                        value="{{ isset($participationDetail['eventName']) ? $participationDetail['eventName'] : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][conductedBy]"
                                                        placeholder="Conducted By"
                                                        value="{{ isset($participationDetail['conductedBy']) ? $participationDetail['conductedBy'] : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="studentParticipation[{{ $yearIndex }}][participations][{{ $participationIndex }}][nameOfTheStudentsParticipated]"
                                                        placeholder="Name of the Students Participated"
                                                        value="{{ isset($participationDetail['nameOfTheStudentsParticipated']) ? $participationDetail['nameOfTheStudentsParticipated'] : '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeParticipation(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
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
                                                <label for="participationYear_0">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                <input type="text" class="form-control" id="participationYear_0"
                                                    name="studentParticipation[0][year]" placeholder="e.g., 2023-24" required>
                                                <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                    // Re-index ALL participation entries to ensure sequential indices before submission
                    function reindexAllStudentParticipations() {
                        const container = document.getElementById('studentParticipationContainer');
                        const yearEntries = container.querySelectorAll('.participation-year-entry');
                        
                        yearEntries.forEach((yearEntry, yearIndex) => {
                            // Update year input index
                            const yearInput = yearEntry.querySelector('input[name*="[year]"]');
                            if (yearInput) {
                                yearInput.name = `studentParticipation[${yearIndex}][year]`;
                            }
                            
                            // Re-index all participation entries within this year
                            const participationEntries = yearEntry.querySelectorAll('.participation-entry');
                            participationEntries.forEach((participationEntry, participationIndex) => {
                                const inputs = participationEntry.querySelectorAll('input[name*="[participations]"]');
                                inputs.forEach(input => {
                                    // Extract the field name
                                    const fieldMatch = input.name.match(/\[participations\]\[\d+\]\[(\w+)\]/);
                                    if (fieldMatch) {
                                        const fieldName = fieldMatch[1];
                                        // Set new name with sequential indices
                                        input.name = `studentParticipation[${yearIndex}][participations][${participationIndex}][${fieldName}]`;
                                    }
                                });
                            });
                        });
                    }
                    
                    // Add a new year for student participation
                    function addYearParticipation() {
                        const container = document.getElementById('studentParticipationContainer');
                        const yearIndex = container.getElementsByClassName('participation-year-entry').length;

                        const newYear = `
        <div class="participation-year-entry mb-4">
            <div class="row">
                <div class="form-group col-md-10">
                    <label>Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                    <input type="text" class="form-control" name="studentParticipation[${yearIndex}][year]" placeholder="e.g., 2023-24" required>
                    <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            onsubmit="reindexAllInterInstituteEvents(); return true;">
                            @csrf
                            <input type="hidden" name="departmentId" value="{{ $departmentId }}">
                            <input type="hidden" name="section" value="{{ $section }}">
                            <div class="row">
                                <!-- Inter Institute Events Section -->
                                <div id="interInstituteEventsContainer" class="col-md-12">
                                    <h4>Inter Institute Events Winning Prize</h4>
                                    @php
                                    // Use the already decoded data from controller
                                    $interInstituteEvents = $interInstituteEventsWinningPrize ?? [];
                                    @endphp

                                    @if(!empty($interInstituteEvents))
                                    @foreach($interInstituteEvents as $yearIndex => $event)
                                    <div class="event-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="interInstituteEventsWinningPrize[{{ $yearIndex }}][year]"
                                                    placeholder="Year" value="{{ isset($event['year']) ? $event['year'] : '' }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearEvent(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-events-container">
                                            @if(isset($event['events']) && is_array($event['events']))
                                            @foreach($event['events'] as $eventIndex => $eventDetail)
                                            <div class="event-entry row mb-2">

                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][eventDate]"
                                                        placeholder="Event Date" value="{{ $eventDetail['eventDate'] ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][eventName]"
                                                        placeholder="Event Name" value="{{ $eventDetail['eventName'] ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][conductedBy]"
                                                        placeholder="Conducted By"
                                                        value="{{ $eventDetail['conductedBy'] ?? $eventDetail['ConductedBy'] ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][nameOfTheStudentsParticipated]"
                                                        placeholder="Name of the Students Participated"
                                                        value="{{ $eventDetail['nameOfTheStudentsParticipated'] ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="interInstituteEventsWinningPrize[{{ $yearIndex }}][events][{{ $eventIndex }}][prizeWon]"
                                                        placeholder="Prize Won" value="{{ $eventDetail['prizeWon'] ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeEvent(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
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
                                                <label for="eventYear_0">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                <input type="text" class="form-control" id="eventYear_0"
                                                    name="interInstituteEventsWinningPrize[0][year]" placeholder="e.g., 2023-24"
                                                    required>
                                                <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                    // Re-index ALL event entries to ensure sequential indices before submission
                    function reindexAllInterInstituteEvents() {
                        const container = document.getElementById('interInstituteEventsContainer');
                        const yearEntries = container.querySelectorAll('.event-year-entry');
                        
                        yearEntries.forEach((yearEntry, yearIndex) => {
                            // Update year input index
                            const yearInput = yearEntry.querySelector('input[name*="[year]"]');
                            if (yearInput) {
                                yearInput.name = `interInstituteEventsWinningPrize[${yearIndex}][year]`;
                            }
                            
                            // Re-index all event entries within this year
                            const eventEntries = yearEntry.querySelectorAll('.event-entry');
                            eventEntries.forEach((eventEntry, eventIndex) => {
                                const inputs = eventEntry.querySelectorAll('input[name*="[events]"]');
                                inputs.forEach(input => {
                                    // Extract the field name
                                    const fieldMatch = input.name.match(/\[events\]\[\d+\]\[(\w+)\]/);
                                    if (fieldMatch) {
                                        const fieldName = fieldMatch[1];
                                        // Set new name with sequential indices
                                        input.name = `interInstituteEventsWinningPrize[${yearIndex}][events][${eventIndex}][${fieldName}]`;
                                    }
                                });
                            });
                        });
                    }
                    
                    // Add a new year for inter institute events winning prize
                    function addYearEvent() {
                        const container = document.getElementById('interInstituteEventsContainer');
                        const yearIndex = container.getElementsByClassName('event-year-entry').length;

                        const newYear = `
        <div class="event-year-entry mb-4">
            <div class="row">
                <div class="form-group col-md-10">
                    <label>Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                    <input type="text" class="form-control" name="interInstituteEventsWinningPrize[${yearIndex}][year]" placeholder="e.g., 2023-24" required>
                    <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            onsubmit="reindexAllIndustrialVisits(); return true;">
                            @csrf
                            <input type="hidden" name="departmentId" value="{{ $departmentId }}">
                            <input type="hidden" name="section" value="{{ $section }}">
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
                    // Re-index ALL visit entries to ensure sequential indices before submission
                    function reindexAllIndustrialVisits() {
                        const container = document.getElementById('industrialVisitContainer');
                        const visitEntries = container.querySelectorAll('.visit-entry');
                        
                        visitEntries.forEach((visitEntry, visitIndex) => {
                            const inputs = visitEntry.querySelectorAll('input[name^="industrialVisit"]');
                            inputs.forEach(input => {
                                // Extract the field name
                                const fieldMatch = input.name.match(/industrialVisit\[\d+\]\[(\w+)\]/);
                                if (fieldMatch) {
                                    const fieldName = fieldMatch[1];
                                    // Set new name with sequential index
                                    input.name = `industrialVisit[${visitIndex}][${fieldName}]`;
                                }
                            });
                        });
                    }
                    
                    function addVisit() {
                        const container = document.getElementById('industrialVisitContainer');
                        
                        // Find the highest existing index to avoid conflicts
                        let maxIndex = -1;
                        const inputs = container.querySelectorAll('input[name^="industrialVisit"]');
                        inputs.forEach(input => {
                            const match = input.name.match(/industrialVisit\[(\d+)\]/);
                            if (match) {
                                maxIndex = Math.max(maxIndex, parseInt(match[1]));
                            }
                        });
                        const index = maxIndex + 1;
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