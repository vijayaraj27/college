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
                        <h3 class="bold">Department Faculites</h3>
                    </div>

                    <!-- Department Faculites Main Section -->
                    <div class="card-block">
                        <form id="achievementsForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="photo">{{ __('field_photo') }}:
                                        <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span>
                                        <span>*</span></label> <input type="file" class="form-control" name="imageFile"
                                        placeholder="Image File">
                                    <img alt="Section Faculites Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/faculties/' . $row->imageFile : '' }}" />
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
                                <button type="submit" class="btn btn-success">Save Info</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'teaching-staff')
                    <!-- Teaching Staff Section -->
                    <div class="card-header">
                        <h3 class="bold">Teaching Staff</h3>
                    </div>

                    <!-- The form and content below will not be displayed because of the exit -->
                    <div class="card-block">
                        <form id="teachingStaffForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Teaching Staff Container -->
                                <div id="teachingStaffContainer" class="col-md-12">
                                    <h4>Faculty Members</h4>
                                    @php
                                    $teachingStaffData = isset($row->teachingStaff) ? json_decode($row->teachingStaff,
                                    true) : [];
                                    @endphp
                                    @if(!empty($teachingStaffData))
                                    @foreach($teachingStaffData as $index => $staff)
                                    <div class="faculty-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[{{ $index }}][faculty]"
                                                    placeholder="Faculty Name" value="{{ $staff['faculty'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[{{ $index }}][qualification]"
                                                    placeholder="Qualification" value="{{ $staff['qualification'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="email" class="form-control"
                                                    name="teachingStaffData[{{ $index }}][email]" placeholder="Email"
                                                    value="{{ $staff['email'] }}" required>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[{{ $index }}][uniqueId]"
                                                    placeholder="Unique ID" value="{{ $staff['uniqueId'] }}" required>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[{{ $index }}][profileId]"
                                                    placeholder="Profile ID" value="{{ $staff['profileId'] }}" required>
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
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[0][faculty]" placeholder="Faculty Name"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[0][qualification]"
                                                    placeholder="Qualification" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="email" class="form-control"
                                                    name="teachingStaffData[0][email]" placeholder="Email" required>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[0][uniqueId]" placeholder="Unique ID"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <input type="text" class="form-control"
                                                    name="teachingStaffData[0][profileId]" placeholder="Profile ID"
                                                    required>
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
                                        onclick="addFacultyEntry()"><i class="fa fa-plus"></i> Add Faculty</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Teaching Staff</button>
                            </div>
                        </form>
                    </div>



                    <script>
                    // Add a new faculty member
                    function addFacultyEntry() {
                        const container = document.getElementById('teachingStaffContainer');
                        const index = container.getElementsByClassName('faculty-entry').length;

                        const newEntry = `
                <div class="faculty-entry mb-4">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="teachingStaffData[${index}][faculty]" placeholder="Faculty Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="teachingStaffData[${index}][qualification]" placeholder="Qualification" required>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="email" class="form-control" name="teachingStaffData[${index}][email]" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" name="teachingStaffData[${index}][uniqueId]" placeholder="Unique ID" required>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" name="teachingStaffData[${index}][profileId]" placeholder="Profile ID" required>
                        </div>
                        <div class="form-group col-md-1 text-end">
                            <button type="button" class="btn btn-danger" onclick="removeFacultyEntry(this)">Remove</button>
                        </div>
                    </div>
                </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    // Remove a faculty entry
                    function removeFacultyEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.faculty-entry').remove();
                        }
                    }
                    </script>
                    @endif



                    @if($section === 'non-teaching-staff')
                    <!-- Non-Teaching Staff Section -->
                    <div class="card-header">
                        <h3 class="bold">Non-Teaching Staff</h3>
                    </div>


                    <!-- The form and content below will not be displayed because of the exit -->
                    <div class="card-block">
                        <form id="nonTeachingStaffForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Non-Teaching Staff Container -->
                                <div id="nonTeachingStaffContainer" class="col-md-12">
                                    <h4>Non-Teaching Staff Members</h4>
                                    @php
                                    $nonTeachingStaffData = isset($row->nonTeachingStaff) ?
                                    json_decode($row->nonTeachingStaff, true) : [];
                                    @endphp
                                    @if(!empty($nonTeachingStaffData))
                                    @foreach($nonTeachingStaffData as $index => $staff)
                                    <div class="staff-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="nonTeachingStaffData[{{ $index }}][name]" placeholder="Name"
                                                    value="{{ $staff['name'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="nonTeachingStaffData[{{ $index }}][qualification]"
                                                    placeholder="Qualification" value="{{ $staff['qualification'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="nonTeachingStaffData[{{ $index }}][designation]"
                                                    placeholder="Designation" value="{{ $staff['designation'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeStaffEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="staff-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="nonTeachingStaffData[0][name]" placeholder="Name" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="nonTeachingStaffData[0][qualification]"
                                                    placeholder="Qualification" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control"
                                                    name="nonTeachingStaffData[0][designation]"
                                                    placeholder="Designation" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeStaffEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addStaffBtn" class="btn btn-primary"
                                        onclick="addStaffEntry()"><i class="fa fa-plus"></i> Add Staff</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Non-Teaching Staff</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new staff member
                    function addStaffEntry() {
                        const container = document.getElementById('nonTeachingStaffContainer');
                        const index = container.getElementsByClassName('staff-entry').length;

                        const newEntry = `
                <div class="staff-entry mb-4">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="nonTeachingStaffData[${index}][name]" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="nonTeachingStaffData[${index}][qualification]" placeholder="Qualification" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="nonTeachingStaffData[${index}][designation]" placeholder="Designation" required>
                        </div>
                        <div class="form-group col-md-1 text-end">
                            <button type="button" class="btn btn-danger" onclick="removeStaffEntry(this)">Remove</button>
                        </div>
                    </div>
                </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    // Remove a staff entry
                    function removeStaffEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.staff-entry').remove();
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