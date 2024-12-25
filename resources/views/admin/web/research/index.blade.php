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
                        <h3 class="bold">General Publications Section </h3>
                    </div>

                    <!-- Department Research  Section -->
                    <div class="card-block">
                        <form id="libraryForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="photo">{{ __('field_photo') }}:
                                        <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span>
                                        <span>*</span></label> <input type="file" class="form-control" name="imageFile"
                                        placeholder="Image File">
                                    <img alt="Section Research  Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/research/' . $row->imageFile : '' }}" />
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
                                <button type="submit" class="btn btn-success">Save Research Section</button>
                            </div>
                        </form>
                    </div>
                    @endif





                    @if($section === 'phd')
                    <!-- Department PhD Holders List -->
                    <div class="card-header">
                        <h3 class="bold">Department PhD Holders List</h3>
                    </div>

                    <div class="card-block">
                        <form id="phdHoldersListForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- PhD Holders List Section -->
                                <div id="phdHoldersListContainer" class="col-md-12">
                                    <h4>PhD Holders List</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $phdHoldersList = isset($row->phdHoldersList) ? json_decode($row->phdHoldersList,
                                    true) : [];
                                    @endphp
                                    @if(!empty($phdHoldersList))
                                    @foreach($phdHoldersList as $tableKey => $phdHolder)
                                    <div class="phd-holder-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[{{ $tableKey }}][nameOfThePhdHolder]"
                                                    placeholder="Name of the PhD Holder"
                                                    value="{{ $phdHolder['nameOfThePhdHolder'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[{{ $tableKey }}][facultyUnderWhichPhdAwarded]"
                                                    placeholder="Faculty Under Which PhD Awarded"
                                                    value="{{ $phdHolder['facultyUnderWhichPhdAwarded'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[{{ $tableKey }}][areaOfResearch]"
                                                    placeholder="Area of Research"
                                                    value="{{ $phdHolder['areaOfResearch'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[{{ $tableKey }}][yearOfAward]"
                                                    placeholder="Year of Award" value="{{ $phdHolder['yearOfAward'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removePhdHolderEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="phd-holder-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[0][nameOfThePhdHolder]"
                                                    placeholder="Name of the PhD Holder" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[0][facultyUnderWhichPhdAwarded]"
                                                    placeholder="Faculty Under Which PhD Awarded" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[0][areaOfResearch]"
                                                    placeholder="Area of Research" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdHoldersList[0][yearOfAward]" placeholder="Year of Award"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removePhdHolderEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addPhdHolderBtn" class="btn btn-primary"
                                        onclick="addPhdHolderEntry()">Add PhD Holder</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save PhD Holders List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new PhD holder entry
                    function addPhdHolderEntry() {
                        const container = document.getElementById('phdHoldersListContainer');
                        const phdHolderIndex = container.getElementsByClassName('phd-holder-entry').length;

                        const newPhdHolder = `
                            <div class="phd-holder-entry mb-4">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="phdHoldersList[${phdHolderIndex}][nameOfThePhdHolder]" placeholder="Name of the PhD Holder" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="phdHoldersList[${phdHolderIndex}][facultyUnderWhichPhdAwarded]" placeholder="Faculty Under Which PhD Awarded" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="phdHoldersList[${phdHolderIndex}][areaOfResearch]" placeholder="Area of Research" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="phdHoldersList[${phdHolderIndex}][yearOfAward]" placeholder="Year of Award" required>
                                    </div>
                                    <div class="form-group col-md-1 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removePhdHolderEntry(this)">Remove</button>
                                    </div>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newPhdHolder);
                    }

                    // Remove a PhD holder entry
                    function removePhdHolderEntry(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.phd-holder-entry').remove();
                        }
                    }
                    </script>
                    @endif



                    @if($section === 'anna-university')
                    <!-- Department Anna University Recognized Supervisors List -->
                    <div class="card-header">
                        <h3 class="bold">Department Anna University Recognized Supervisors List</h3>
                    </div>

                    <div class="card-block">
                        <form id="annaUniversityRecognizedSuperviorsNameListForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Anna University Recognized Supervisors Section -->
                                <div id="annaUniversityRecognizedSuperviorsNameListContainer" class="col-md-12">
                                    <h4>Anna University Recognized Supervisors List</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $supervisorsList = isset($row->annaUniversityRecognizedSuperviorsNameList) ?
                                    json_decode($row->annaUniversityRecognizedSuperviorsNameList, true) : [];
                                    @endphp
                                    @if(!empty($supervisorsList))
                                    @foreach($supervisorsList as $tableKey => $supervisor)
                                    <div class="supervisor-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[{{ $tableKey }}][nameOfTheSupervior]"
                                                    placeholder="Name of the Supervisor"
                                                    value="{{ $supervisor['nameOfTheSupervior'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[{{ $tableKey }}][areaOfResearch]"
                                                    placeholder="Area of Research"
                                                    value="{{ $supervisor['areaOfResearch'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[{{ $tableKey }}][AnnaUniversityRecognitionNo]"
                                                    placeholder="Anna University Recognition No"
                                                    value="{{ $supervisor['AnnaUniversityRecognitionNo'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[{{ $tableKey }}][noofCandidatesUnderDeptResearchCentre]"
                                                    placeholder="No. of Candidates Under Dept Research Centre"
                                                    value="{{ $supervisor['noofCandidatesUnderDeptResearchCentre'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[{{ $tableKey }}][noofCandidatesUnderOtherUniversity]"
                                                    placeholder="No. of Candidates Under Other University"
                                                    value="{{ $supervisor['noofCandidatesUnderOtherUniversity'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[{{ $tableKey }}][noofCandidatesPursuingPhd]"
                                                    placeholder="No. of Candidates Pursuing PhD"
                                                    value="{{ $supervisor['noofCandidatesPursuingPhd'] }}" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeSupervisorEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="supervisor-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[0][nameOfTheSupervior]"
                                                    placeholder="Name of the Supervisor" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[0][areaOfResearch]"
                                                    placeholder="Area of Research" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[0][AnnaUniversityRecognitionNo]"
                                                    placeholder="Anna University Recognition No" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[0][noofCandidatesUnderDeptResearchCentre]"
                                                    placeholder="No. of Candidates Under Dept Research Centre" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[0][noofCandidatesUnderOtherUniversity]"
                                                    placeholder="No. of Candidates Under Other University" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="annaUniversityRecognizedSuperviorsNameList[0][noofCandidatesPursuingPhd]"
                                                    placeholder="No. of Candidates Pursuing PhD" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeSupervisorEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addSupervisorBtn" class="btn btn-primary"
                                        onclick="addSupervisorEntry()">Add Supervisor</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Supervisors List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new supervisor entry
                    function addSupervisorEntry() {
                        const container = document.getElementById(
                            'annaUniversityRecognizedSuperviorsNameListContainer');
                        const supervisorIndex = container.getElementsByClassName('supervisor-entry').length;

                        const newSupervisor = `
                            <div class="supervisor-entry mb-4">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="annaUniversityRecognizedSuperviorsNameList[${supervisorIndex}][nameOfTheSupervior]" placeholder="Name of the Supervisor" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="annaUniversityRecognizedSuperviorsNameList[${supervisorIndex}][areaOfResearch]" placeholder="Area of Research" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="annaUniversityRecognizedSuperviorsNameList[${supervisorIndex}][AnnaUniversityRecognitionNo]" placeholder="Anna University Recognition No" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="annaUniversityRecognizedSuperviorsNameList[${supervisorIndex}][noofCandidatesUnderDeptResearchCentre]" placeholder="No. of Candidates Under Dept Research Centre" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="annaUniversityRecognizedSuperviorsNameList[${supervisorIndex}][noofCandidatesUnderOtherUniversity]" placeholder="No. of Candidates Under Other University" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="annaUniversityRecognizedSuperviorsNameList[${supervisorIndex}][noofCandidatesPursuingPhd]" placeholder="No. of Candidates Pursuing PhD" required>
                                    </div>
                                    <div class="form-group col-md-1 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeSupervisorEntry(this)">Remove</button>
                                    </div>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newSupervisor);
                    }

                    // Remove a supervisor entry
                    function removeSupervisorEntry(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.supervisor-entry').remove();
                        }
                    }
                    </script>
                    @endif




                    @if($section === 'pursuing-phd')
                    <!-- Department List of Candidates Pursuing PhD Under Department Supervisors -->
                    <div class="card-header">
                        <h3 class="bold">List of Candidates Pursuing PhD Under Department Supervisors</h3>
                    </div>

                    <div class="card-block">
                        <form id="ListOfCandidatesPursuingPhdUnderDepartmentSupervisorsForm" class="needs-validation"
                            method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Candidates Pursuing PhD Section -->
                                <div id="ListOfCandidatesPursuingPhdUnderDepartmentSupervisorsContainer"
                                    class="col-md-12">
                                    <h4>List of Candidates Pursuing PhD Under Department Supervisors</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $candidatesList = isset($row->listOfCandidatesPursuingPhdUnderDepartmentSupervisors)
                                    ?
                                    json_decode($row->listOfCandidatesPursuingPhdUnderDepartmentSupervisors, true) : [];

                                    //print_r($row['listOfCandidatesPursuingPhdUnderDepartmentSupervisors']);

                                    @endphp
                                    @if(!empty($candidatesList))
                                    @foreach($candidatesList as $tableKey => $candidate)
                                    <div class="candidate-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[{{ $tableKey }}][nameOfTheCandidate]"
                                                    placeholder="Name of the Candidate"
                                                    value="{{ $candidate['nameOfTheCandidate'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[{{ $tableKey }}][yearOfRegistration]"
                                                    placeholder="Year of Registration"
                                                    value="{{ $candidate['yearOfRegistration'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[{{ $tableKey }}][supervisorName]"
                                                    placeholder="Supervisor Name"
                                                    value="{{ $candidate['supervisorName'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[{{ $tableKey }}][areaOfResearch]"
                                                    placeholder="Area of Research"
                                                    value="{{ $candidate['areaOfResearch'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[{{ $tableKey }}][status]"
                                                    placeholder="Status" value="{{ $candidate['status'] }}" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeCandidateEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="candidate-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[0][nameOfTheCandidate]"
                                                    placeholder="Name of the Candidate" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[0][yearOfRegistration]"
                                                    placeholder="Year of Registration" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[0][supervisorName]"
                                                    placeholder="Supervisor Name" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[0][areaOfResearch]"
                                                    placeholder="Area of Research" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[0][status]"
                                                    placeholder="Status" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeCandidateEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addCandidateBtn" class="btn btn-primary"
                                        onclick="addCandidateEntry()">Add Candidate</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Candidates List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new candidate entry
                    function addCandidateEntry() {
                        const container = document.getElementById(
                            'ListOfCandidatesPursuingPhdUnderDepartmentSupervisorsContainer');
                        const candidateIndex = container.getElementsByClassName('candidate-entry').length;

                        const newCandidate = `
                            <div class="candidate-entry mb-4">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[${candidateIndex}][nameOfTheCandidate]" placeholder="Name of the Candidate" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[${candidateIndex}][yearOfRegistration]" placeholder="Year of Registration" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[${candidateIndex}][supervisorName]" placeholder="Supervisor Name" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[${candidateIndex}][areaOfResearch]" placeholder="Area of Research" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" name="ListOfCandidatesPursuingPhdUnderDepartmentSupervisors[${candidateIndex}][status]" placeholder="Status" required>
                                    </div>
                                    <div class="form-group col-md-1 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeCandidateEntry(this)">Remove</button>
                                    </div>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newCandidate);
                    }

                    // Remove a candidate entry
                    function removeCandidateEntry(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.candidate-entry').remove();
                        }
                    }
                    </script>
                    @endif





                    @if($section === 'faculties-pursuing-phd')
                    <!-- Department List of Faculties Pursuing PhD ListOfDepartmentFacultiesPursuingPhd -->
                    <div class="card-header">
                        <h3 class="bold">List of Department Faculties Pursuing PhD</h3>
                    </div>

                    <div class="card-block">
                        <form id="ListOfDepartmentFacultiesPursuingPhdForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Faculties Pursuing PhD Section -->
                                <div id="ListOfDepartmentFacultiesPursuingPhdContainer" class="col-md-12">
                                    <h4>List of Department Faculties Pursuing PhD</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $facultiesList = isset($row->listOfDepartmentFacultiesPursuingPhd) ?
                                    json_decode($row->listOfDepartmentFacultiesPursuingPhd, true) : [];

                                    @endphp
                                    @if(!empty($facultiesList))
                                    @foreach($facultiesList as $tableKey => $faculty)
                                    <div class="faculty-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][nameOfTheCandidate]"
                                                    placeholder="Name of the Candidate"
                                                    value="{{ $faculty['nameOfTheCandidate'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][yearOfRegistration]"
                                                    placeholder="Year of Registration"
                                                    value="{{ $faculty['yearOfRegistration'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][regNo]"
                                                    placeholder="Registration No" value="{{ $faculty['regNo'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][supervisorName]"
                                                    placeholder="Supervisor Name"
                                                    value="{{ $faculty['supervisorName'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][universityRegistered]"
                                                    placeholder="University Registered"
                                                    value="{{ $faculty['universityRegistered'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][areaOfResearch]"
                                                    placeholder="Area of Research"
                                                    value="{{ $faculty['areaOfResearch'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[{{ $tableKey }}][status]"
                                                    placeholder="Status" value="{{ $faculty['status'] }}" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeFacultyEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="faculty-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][nameOfTheCandidate]"
                                                    placeholder="Name of the Candidate" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][yearOfRegistration]"
                                                    placeholder="Year of Registration" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][regNo]"
                                                    placeholder="Registration No" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][supervisorName]"
                                                    placeholder="Supervisor Name" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][universityRegistered]"
                                                    placeholder="University Registered" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][areaOfResearch]"
                                                    placeholder="Area of Research" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="ListOfDepartmentFacultiesPursuingPhd[0][status]"
                                                    placeholder="Status" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeFacultyEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addFacultyBtn" class="btn btn-primary"
                                        onclick="addFacultyEntry()">Add Faculty</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Faculties List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new faculty entry
                    function addFacultyEntry() {
                        const container = document.getElementById('ListOfDepartmentFacultiesPursuingPhdContainer');
                        const facultyIndex = container.getElementsByClassName('faculty-entry').length;

                        const newFaculty = `
                                <div class="faculty-entry mb-4">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][nameOfTheCandidate]" placeholder="Name of the Candidate" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][yearOfRegistration]" placeholder="Year of Registration" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][regNo]" placeholder="Registration No" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][supervisorName]" placeholder="Supervisor Name" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][universityRegistered]" placeholder="University Registered" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][areaOfResearch]" placeholder="Area of Research" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[${facultyIndex}][status]" placeholder="Status" required>
                                        </div>
                                        <div class="form-group col-md-1 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removeFacultyEntry(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newFaculty);
                    }

                    // Remove a faculty entry
                    function removeFacultyEntry(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.faculty-entry').remove();
                        }
                    }
                    </script>
                    @endif






                    @if($section === 'phd-awarded')
                    <!-- Department Supervisor PhD Awarded List -->
                    <div class="card-header">
                        <h3 class="bold">PhD Awarded Under Department Supervisor</h3>
                    </div>

                    <div class="card-block">
                        <form id="phdAwardedUnderDepartmentSupervisorForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- PhD Awarded Section -->
                                <div id="phdAwardedUnderDepartmentSupervisorContainer" class="col-md-12">
                                    <h4>PhD Awarded Under Department Supervisor</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $phdAwardedList = isset($row->phdAwardedUnderDepartmentSupervisor) ?
                                    json_decode($row->phdAwardedUnderDepartmentSupervisor, true) : [];
                                    @endphp
                                    @if(!empty($phdAwardedList))
                                    @foreach($phdAwardedList as $tableKey => $phd)
                                    <div class="phd-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[{{ $tableKey }}][NameofTheResearchScholar]"
                                                    placeholder="Name of the Research Scholar"
                                                    value="{{ $phd['NameofTheResearchScholar'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[{{ $tableKey }}][regNo]"
                                                    placeholder="Registration No" value="{{ $phd['regNo'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[{{ $tableKey }}][university]"
                                                    placeholder="University" value="{{ $phd['university'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[{{ $tableKey }}][supervisorName]"
                                                    placeholder="Supervisor Name" value="{{ $phd['supervisorName'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[{{ $tableKey }}][titleOfTheThesis]"
                                                    placeholder="Title of the Thesis"
                                                    value="{{ $phd['titleOfTheThesis'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="date" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[{{ $tableKey }}][vivaVoceDate]"
                                                    placeholder="Viva Voce Date" value="{{ $phd['vivaVoceDate'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removePhdEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="phd-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[0][NameofTheResearchScholar]"
                                                    placeholder="Name of the Research Scholar" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[0][regNo]"
                                                    placeholder="Registration No" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[0][university]"
                                                    placeholder="University" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[0][supervisorName]"
                                                    placeholder="Supervisor Name" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[0][titleOfTheThesis]"
                                                    placeholder="Title of the Thesis" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="date" class="form-control"
                                                    name="phdAwardedUnderDepartmentSupervisor[0][vivaVoceDate]"
                                                    placeholder="Viva Voce Date" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removePhdEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addPhdBtn" class="btn btn-primary"
                                        onclick="addPhdEntry()">Add PhD Awarded Entry</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save PhD Awarded List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new PhD entry
                    function addPhdEntry() {
                        const container = document.getElementById('phdAwardedUnderDepartmentSupervisorContainer');
                        const phdIndex = container.getElementsByClassName('phd-entry').length;

                        const newPhd = `
                                <div class="phd-entry mb-4">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="phdAwardedUnderDepartmentSupervisor[${phdIndex}][NameofTheResearchScholar]" placeholder="Name of the Research Scholar" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="phdAwardedUnderDepartmentSupervisor[${phdIndex}][regNo]" placeholder="Registration No" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="phdAwardedUnderDepartmentSupervisor[${phdIndex}][university]" placeholder="University" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="phdAwardedUnderDepartmentSupervisor[${phdIndex}][supervisorName]" placeholder="Supervisor Name" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" name="phdAwardedUnderDepartmentSupervisor[${phdIndex}][titleOfTheThesis]" placeholder="Title of the Thesis" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control" name="phdAwardedUnderDepartmentSupervisor[${phdIndex}][vivaVoceDate]" placeholder="Viva Voce Date" required>
                                        </div>
                                        <div class="form-group col-md-1 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removePhdEntry(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newPhd);
                    }

                    // Remove a PhD entry
                    function removePhdEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.phd-entry').remove();
                        }
                    }
                    </script>
                    @endif




                    @if($section === 'supervisor')
                    <!-- Supervisor List Section -->
                    <div class="card-header">
                        <h3 class="bold">Supervisor List</h3>
                    </div>

                    <div class="card-block">
                        <form id="supervisorForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Supervisor Section -->
                                <div id="supervisorContainer" class="col-md-12">
                                    <h4>Supervisor List</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $supervisorList = isset($row->supervisor) ?
                                    json_decode($row->supervisor, true) : [];
                                    @endphp
                                    @if(!empty($supervisorList))
                                    @foreach($supervisorList as $tableKey => $supervisor)
                                    <div class="supervisor-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                    name="supervisor[{{ $tableKey }}][Name]" placeholder="Name"
                                                    value="{{ $supervisor['Name'] }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="url" class="form-control"
                                                    name="supervisor[{{ $tableKey }}][profileLink]"
                                                    placeholder="Profile Link" value="{{ $supervisor['profileLink'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeSupervisorEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="supervisor-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="supervisor[0][Name]"
                                                    placeholder="Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="url" class="form-control" name="supervisor[0][profileLink]"
                                                    placeholder="Profile Link" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeSupervisorEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addSupervisorBtn" class="btn btn-primary"
                                        onclick="addSupervisorEntry()">Add Supervisor</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Supervisor List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new supervisor entry
                    function addSupervisorEntry() {
                        const container = document.getElementById('supervisorContainer');
                        const supervisorIndex = container.getElementsByClassName('supervisor-entry').length;

                        const newSupervisor = `
                            <div class="supervisor-entry mb-4">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="supervisor[${supervisorIndex}][Name]" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="url" class="form-control" name="supervisor[${supervisorIndex}][profileLink]" placeholder="Profile Link" required>
                                    </div>
                                    <div class="form-group col-md-1 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeSupervisorEntry(this)">Remove</button>
                                    </div>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newSupervisor);
                    }

                    // Remove a supervisor entry
                    function removeSupervisorEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.supervisor-entry').remove();
                        }
                    }
                    </script>
                    @endif






                    @if($section === 'funds')
                    <!-- Funds Section -->
                    <div class="card-header">
                        <h3 class="bold">Funds</h3>
                    </div>

                    <div class="card-block">
                        <form id="fundsForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Funds Section -->
                                <div id="fundsContainer" class="col-md-12">
                                    <h4>Funds</h4>
                                    @php
                                    // Decode the stored JSON string to an array
                                    $funds = isset($row->funds) ? json_decode($row->funds, true) : [];
                                    @endphp

                                    @if(!empty($funds))
                                    @foreach($funds as $yearIndex => $fund)
                                    <div class="fund-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="funds[{{ $yearIndex }}][year]" placeholder="Year"
                                                    value="{{ $fund['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearFund(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-funds-container">
                                            @foreach($fund['fundDetails'] as $fundIndex => $fundDetail)
                                            <div class="fund-entry row mb-2">
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[{{ $yearIndex }}][fundDetails][{{ $fundIndex }}][nameOfPi]"
                                                        placeholder="Name of PI" value="{{ $fundDetail['nameOfPi'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[{{ $yearIndex }}][fundDetails][{{ $fundIndex }}][titleOfTheProject]"
                                                        placeholder="Title of the Project"
                                                        value="{{ $fundDetail['titleOfTheProject'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[{{ $yearIndex }}][fundDetails][{{ $fundIndex }}][amount]"
                                                        placeholder="Amount" value="{{ $fundDetail['amount'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[{{ $yearIndex }}][fundDetails][{{ $fundIndex }}][fundingAgency]"
                                                        placeholder="Funding Agency"
                                                        value="{{ $fundDetail['fundingAgency'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[{{ $yearIndex }}][fundDetails][{{ $fundIndex }}][OrderNoAndDate]"
                                                        placeholder="Order No. and Date"
                                                        value="{{ $fundDetail['OrderNoAndDate'] }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[{{ $yearIndex }}][fundDetails][{{ $fundIndex }}][status]"
                                                        placeholder="Status" value="{{ $fundDetail['status'] }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeFund(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addFund(this, {{ $yearIndex }})"><i class="fa fa-plus"></i> Add
                                                Fund</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="fund-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control" name="funds[0][year]"
                                                    placeholder="Year" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearFund(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-funds-container">
                                            <div class="fund-entry row mb-2">
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[0][fundDetails][0][nameOfPi]"
                                                        placeholder="Name of PI" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[0][fundDetails][0][titleOfTheProject]"
                                                        placeholder="Title of the Project" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[0][fundDetails][0][amount]" placeholder="Amount"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[0][fundDetails][0][fundingAgency]"
                                                        placeholder="Funding Agency" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[0][fundDetails][0][OrderNoAndDate]"
                                                        placeholder="Order No. and Date" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="funds[0][fundDetails][0][status]" placeholder="Status"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeFund(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info" onclick="addFund(this, 0)"><i
                                                    class="fa fa-plus"></i> Add Fund</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearFundBtn" class="btn btn-primary"
                                        onclick="addYearFund()">Add Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Fund Details</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year for funds
                    function addYearFund() {
                        const container = document.getElementById('fundsContainer');
                        const yearIndex = container.getElementsByClassName('fund-year-entry').length;

                        const newYear = `
        <div class="fund-year-entry mb-4">
            <div class="row">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="funds[${yearIndex}][year]" placeholder="Year" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeYearFund(this)">Remove Year</button>
                </div>
            </div>
            <div class="year-funds-container">
                <div class="fund-entry row mb-2">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][0][nameOfPi]" placeholder="Name of PI" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][0][titleOfTheProject]" placeholder="Title of the Project" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][0][amount]" placeholder="Amount" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][0][fundingAgency]" placeholder="Funding Agency" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][0][OrderNoAndDate]" placeholder="Order No. and Date" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][0][status]" placeholder="Status" required>
                    </div>
                    <div class="form-group col-md-2 text-end">
                        <button type="button" class="btn btn-danger" onclick="removeFund(this)">Remove</button>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-info" onclick="addFund(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Fund</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year for funds
                    function removeYearFund(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.fund-year-entry').remove();
                        }
                    }

                    // Add a new fund for a specific year
                    function addFund(button, yearIndex) {
                        const container = button.closest('.fund-year-entry').querySelector('.year-funds-container');
                        const fundIndex = container.getElementsByClassName('fund-entry').length;

                        const newFund = `
        <div class="fund-entry row mb-2">
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][${fundIndex}][nameOfPi]" placeholder="Name of PI" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][${fundIndex}][titleOfTheProject]" placeholder="Title of the Project" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][${fundIndex}][amount]" placeholder="Amount" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][${fundIndex}][fundingAgency]" placeholder="Funding Agency" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][${fundIndex}][OrderNoAndDate]" placeholder="Order No. and Date" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="funds[${yearIndex}][fundDetails][${fundIndex}][status]" placeholder="Status" required>
            </div>
            <div class="form-group col-md-2 text-end">
                <button type="button" class="btn btn-danger" onclick="removeFund(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newFund);
                    }

                    // Remove a fund entry
                    function removeFund(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.fund-entry').remove();
                        }
                    }
                    </script>
                    @endif





                    @if($section === 'value-added-group')
                    <!-- Value Added Group Section -->
                    <div class="card-header">
                        <h3 class="bold">Value Added Groups</h3>
                    </div>

                    <div class="card-block">
                        <form id="valueAddedGroupForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Value Added Group Container -->
                                <div id="valueAddedGroupContainer" class="col-md-12">
                                    <h4>Value Added Groups</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $valueAddedGroups = isset($row->valueAddedGroup) ?
                                    json_decode($row->valueAddedGroup, true) : [];
                                    @endphp
                                    @if(!empty($valueAddedGroups))
                                    @foreach($valueAddedGroups as $tableKey => $valueAddedGroup)
                                    <div class="value-added-group-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="valueAddedGroup[{{ $tableKey }}][Group]" placeholder="Group"
                                                    value="{{ $valueAddedGroup['Group'] }}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="valueAddedGroup[{{ $tableKey }}][faculty]"
                                                    placeholder="Faculty" value="{{ $valueAddedGroup['faculty'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="valueAddedGroup[{{ $tableKey }}][Activities]"
                                                    placeholder="Activities"
                                                    value="{{ $valueAddedGroup['Activities'] }}" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeValueAddedGroupEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="value-added-group-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" name="valueAddedGroup[0][Group]"
                                                    placeholder="Group" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="valueAddedGroup[0][faculty]" placeholder="Faculty" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="valueAddedGroup[0][Activities]" placeholder="Activities"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeValueAddedGroupEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addValueAddedGroupBtn" class="btn btn-primary"
                                        onclick="addValueAddedGroupEntry()">Add Value Added Group</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Value Added Groups</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new Value Added Group entry
                    function addValueAddedGroupEntry() {
                        const container = document.getElementById('valueAddedGroupContainer');
                        const groupIndex = container.getElementsByClassName('value-added-group-entry').length;

                        const newGroup = `
                            <div class="value-added-group-entry mb-4">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="valueAddedGroup[${groupIndex}][Group]" placeholder="Group" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="valueAddedGroup[${groupIndex}][faculty]" placeholder="Faculty" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="valueAddedGroup[${groupIndex}][Activities]" placeholder="Activities" required>
                                    </div>
                                    <div class="form-group col-md-1 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeValueAddedGroupEntry(this)">Remove</button>
                                    </div>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newGroup);
                    }

                    // Remove a Value Added Group entry
                    function removeValueAddedGroupEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.value-added-group-entry').remove();
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