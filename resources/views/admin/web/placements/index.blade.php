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
                                    <label for="photo">{{ __('field_photo') }}:
                                        <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span>
                                        <span>*</span></label> <input type="file" class="form-control" name="imageFile"
                                        placeholder="Image File">
                                    <img alt="Section Placements Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/placements/' . $row->imageFile : '' }}" />
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
                                <button type="submit" class="btn btn-success">Save Placements</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'student-placed')
                    <!-- Student Placements Appreciation List -->
                    <div class="card-header">

                        <!-- Student Placed -->
                        <div class="card-header">
                            <h3 class="bold">Student Placed</h3>
                        </div>

                        <div class="card-block">
                            <form id="studentPlacedForm" class="needs-validation" method="POST"
                                action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                                @csrf
                                <div class="row">
                                    <!-- Student Placed Section -->
                                    <div id="studentPlacedContainer" class="col-md-12">
                                        <h4>Student Placed</h4>
                                        @php
                                        // Decode the stored JSON string to an array
                                        $studentPlaced = isset($row->studentPlaced) ? json_decode($row->studentPlaced,
                                        true) : [];
                                        @endphp

                                        @if(!empty($studentPlaced))
                                        @foreach($studentPlaced as $yearIndex => $placement)
                                        <div class="placement-year-entry mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="studentPlaced[{{ $yearIndex }}][year]" placeholder="Year"
                                                        value="{{ $placement['year'] }}" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeYearPlacement(this)">Remove Year</button>
                                                </div>
                                            </div>
                                            <div class="year-placements-container">
                                                @foreach($placement['placements'] as $placementIndex =>
                                                $placementDetail)
                                                <div class="placement-entry row mb-2">
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[{{ $yearIndex }}][placements][{{ $placementIndex }}][studentRegNumber]"
                                                            placeholder="Student Registration Number"
                                                            value="{{ $placementDetail['studentRegNumber'] }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[{{ $yearIndex }}][placements][{{ $placementIndex }}][studentName]"
                                                            placeholder="Student Name"
                                                            value="{{ $placementDetail['studentName'] }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[{{ $yearIndex }}][placements][{{ $placementIndex }}][companyName]"
                                                            placeholder="Company Name"
                                                            value="{{ $placementDetail['companyName'] }}" required>
                                                    </div>
                                                    <div class="form-group col-md-2 text-end">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removePlacement(this)">Remove</button>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-info"
                                                    onclick="addPlacement(this, {{ $yearIndex }})">Add
                                                    Placement</button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="placement-year-entry mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="studentPlaced[0][year]" placeholder="Year" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeYearPlacement(this)">Remove Year</button>
                                                </div>
                                            </div>
                                            <div class="year-placements-container">
                                                <div class="placement-entry row mb-2">
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[0][placements][0][studentRegNumber]"
                                                            placeholder="Student Registration Number" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[0][placements][0][studentName]"
                                                            placeholder="Student Name" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[0][placements][0][companyName]"
                                                            placeholder="Company Name" required>
                                                    </div>
                                                    <div class="form-group col-md-2 text-end">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removePlacement(this)">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-info"
                                                    onclick="addPlacement(this, 0)">Add Placement</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12 text-center mt-4">
                                        <button type="button" id="addYearPlacementBtn" class="btn btn-primary"
                                            onclick="addYearPlacement()">Add Year</button>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success">Save Student Placement
                                        Details</button>
                                </div>
                            </form>
                        </div>

                        <script>
                        // Add a new year for student placements
                        function addYearPlacement() {
                            const container = document.getElementById('studentPlacedContainer');
                            const yearIndex = container.getElementsByClassName('placement-year-entry').length;

                            const newYear = `
                        <div class="placement-year-entry mb-4">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" name="studentPlaced[${yearIndex}][year]" placeholder="Year" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeYearPlacement(this)">Remove Year</button>
                                </div>
                            </div>
                            <div class="year-placements-container">
                                <div class="placement-entry row mb-2">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="studentPlaced[${yearIndex}][placements][0][studentRegNumber]" placeholder="Student Registration Number" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="studentPlaced[${yearIndex}][placements][0][studentName]" placeholder="Student Name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="studentPlaced[${yearIndex}][placements][0][companyName]" placeholder="Company Name" required>
                                    </div>
                                    <div class="form-group col-md-2 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removePlacement(this)">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-info" onclick="addPlacement(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Placement</button>
                            </div>
                        </div>`;
                            container.insertAdjacentHTML('beforeend', newYear);
                        }

                        // Remove a year for student placements
                        function removeYearPlacement(button) {
                            if (confirm('Are you sure you want to remove this?')) {
                                button.closest('.placement-year-entry').remove();
                            }
                        }

                        // Add a new placement for a specific year
                        function addPlacement(button, yearIndex) {
                            const container = button.closest('.placement-year-entry').querySelector(
                                '.year-placements-container');
                            const placementIndex = container.getElementsByClassName('placement-entry').length;

                            const newPlacement = `
                    <div class="placement-entry row mb-2">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="studentPlaced[${yearIndex}][placements][${placementIndex}][studentRegNumber]" placeholder="Student Registration Number" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="studentPlaced[${yearIndex}][placements][${placementIndex}][studentName]" placeholder="Student Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="studentPlaced[${yearIndex}][placements][${placementIndex}][companyName]" placeholder="Company Name" required>
                        </div>
                        <div class="form-group col-md-2 text-end">
                            <button type="button" class="btn btn-danger" onclick="removePlacement(this)">Remove</button>
                        </div>
                    </div>`;
                            container.insertAdjacentHTML('beforeend', newPlacement);
                        }

                        // Remove a placement entry
                        function removePlacement(button) {
                            if (confirm('Are you sure you want to remove this?')) {
                                button.closest('.placement-entry').remove();
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