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
                                action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                                onsubmit="reindexAllPlacements(); return true;">
                                @csrf
                                <input type="hidden" name="departmentId" value="{{ $departmentId }}">
                                <input type="hidden" name="section" value="{{ $section }}">
                                <div class="row">
                                    <!-- Student Placed Section -->
                                    <div id="studentPlacedContainer" class="col-md-12">
                                        <h4>Student Placed</h4>
                                        @php
                                        // Use the already decoded data from controller
                                        $studentPlacedList = $studentPlaced ?? [];
                                        @endphp

                                        @if(!empty($studentPlaced))
                                        @foreach($studentPlaced as $yearIndex => $placement)
                                        <div class="placement-year-entry mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <label for="placementYear_{{ $yearIndex }}">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                    <input type="text" class="form-control" id="placementYear_{{ $yearIndex }}"
                                                        name="studentPlaced[{{ $yearIndex }}][year]" placeholder="e.g., 2023-24"
                                                        value="{{ isset($placement['year']) ? $placement['year'] : '' }}" required>
                                                    <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeYearPlacement(this)">Remove Year</button>
                                                </div>
                                            </div>
                                            <div class="year-placements-container">
                                                @if(isset($placement['placements']) && is_array($placement['placements']))
                                                @foreach($placement['placements'] as $placementIndex =>
                                                $placementDetail)
                                                <div class="placement-entry row mb-2">
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[{{ $yearIndex }}][placements][{{ $placementIndex }}][studentRegNumber]"
                                                            placeholder="Student Registration Number"
                                                            value="{{ isset($placementDetail['studentRegNumber']) ? $placementDetail['studentRegNumber'] : '' }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[{{ $yearIndex }}][placements][{{ $placementIndex }}][studentName]"
                                                            placeholder="Student Name"
                                                            value="{{ isset($placementDetail['studentName']) ? $placementDetail['studentName'] : '' }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control"
                                                            name="studentPlaced[{{ $yearIndex }}][placements][{{ $placementIndex }}][companyName]"
                                                            placeholder="Company Name"
                                                            value="{{ isset($placementDetail['companyName']) ? $placementDetail['companyName'] : '' }}" required>
                                                    </div>
                                                    <div class="form-group col-md-2 text-end">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removePlacement(this)">Remove</button>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
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
                                                    <label for="placementYear_0">Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                                    <input type="text" class="form-control" id="placementYear_0"
                                                        name="studentPlaced[0][year]" placeholder="e.g., 2023-24" required>
                                                    <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                        // Re-index ALL placement entries to ensure sequential indices before submission
                        function reindexAllPlacements() {
                            const container = document.getElementById('studentPlacedContainer');
                            const yearEntries = container.querySelectorAll('.placement-year-entry');
                            
                            yearEntries.forEach((yearEntry, yearIndex) => {
                                // Update year input index
                                const yearInput = yearEntry.querySelector('input[name*="[year]"]');
                                if (yearInput) {
                                    yearInput.name = `studentPlaced[${yearIndex}][year]`;
                                }
                                
                                // Re-index all placement entries within this year
                                const placementEntries = yearEntry.querySelectorAll('.placement-entry');
                                placementEntries.forEach((placementEntry, placementIndex) => {
                                    const inputs = placementEntry.querySelectorAll('input[name*="[placements]"]');
                                    inputs.forEach(input => {
                                        // Extract the field name (studentRegNumber, studentName, companyName)
                                        const fieldMatch = input.name.match(/\[placements\]\[\d+\]\[(\w+)\]/);
                                        if (fieldMatch) {
                                            const fieldName = fieldMatch[1];
                                            // Set new name with sequential indices
                                            input.name = `studentPlaced[${yearIndex}][placements][${placementIndex}][${fieldName}]`;
                                        }
                                    });
                                });
                            });
                            
                            // Log the re-indexed data
                            const formData = new FormData(document.getElementById('studentPlacedForm'));
                            const placementFields = [];
                            for (let [key, value] of formData.entries()) {
                                if (key.includes('placements')) {
                                    placementFields.push({ key: key, value: value });
                                }
                            }
                            console.log('=== AFTER RE-INDEXING ===');
                            console.log('Total placement fields:', placementFields.length);
                            console.log('Placement fields:', placementFields);
                        }
                        
                        // Log all form fields before submission to debug
                        function logFormDataBeforeSubmit(form) {
                            const formData = new FormData(form);
                            const placementFields = [];
                            
                            for (let [key, value] of formData.entries()) {
                                if (key.includes('placements')) {
                                    placementFields.push({ key: key, value: value });
                                }
                            }
                            
                            console.log('=== FORM SUBMISSION DEBUG ===');
                            console.log('Total placement fields found:', placementFields.length);
                            console.log('Placement fields:', placementFields);
                            
                            // Count unique placement indices per year
                            const yearPlacements = {};
                            placementFields.forEach(field => {
                                const match = field.key.match(/studentPlaced\[(\d+)\]\[placements\]\[(\d+)\]/);
                                if (match) {
                                    const yearIdx = match[1];
                                    const placementIdx = match[2];
                                    if (!yearPlacements[yearIdx]) {
                                        yearPlacements[yearIdx] = new Set();
                                    }
                                    yearPlacements[yearIdx].add(placementIdx);
                                }
                            });
                            
                            for (let yearIdx in yearPlacements) {
                                console.log(`Year ${yearIdx} has ${yearPlacements[yearIdx].size} unique placement indices:`, Array.from(yearPlacements[yearIdx]));
                            }
                            console.log('=== END DEBUG ===');
                        }
                        
                        // Validate and log form data before submission
                        function validateAndSubmitForm(form) {
                            const formData = new FormData(form);
                            const studentPlacedData = {};
                            
                            // Collect all form data
                            for (let [key, value] of formData.entries()) {
                                if (key.startsWith('studentPlaced[')) {
                                    // Parse the key structure: studentPlaced[yearIndex][placements][placementIndex][field]
                                    const match = key.match(/studentPlaced\[(\d+)\]\[placements\]\[(\d+)\]\[(\w+)\]/);
                                    if (match) {
                                        const yearIndex = match[1];
                                        const placementIndex = match[2];
                                        const field = match[3];
                                        
                                        if (!studentPlacedData[yearIndex]) {
                                            studentPlacedData[yearIndex] = { placements: {} };
                                        }
                                        if (!studentPlacedData[yearIndex].placements[placementIndex]) {
                                            studentPlacedData[yearIndex].placements[placementIndex] = {};
                                        }
                                        studentPlacedData[yearIndex].placements[placementIndex][field] = value;
                                    } else {
                                        // Handle year field: studentPlaced[yearIndex][year]
                                        const yearMatch = key.match(/studentPlaced\[(\d+)\]\[year\]/);
                                        if (yearMatch) {
                                            const yearIndex = yearMatch[1];
                                            if (!studentPlacedData[yearIndex]) {
                                                studentPlacedData[yearIndex] = { placements: {} };
                                            }
                                            studentPlacedData[yearIndex].year = value;
                                        }
                                    }
                                }
                            }
                            
                            // Log the collected data
                            console.log('Form data being submitted:', studentPlacedData);
                            
                            // Count placements per year
                            for (let yearIndex in studentPlacedData) {
                                const placementCount = Object.keys(studentPlacedData[yearIndex].placements || {}).length;
                                console.log(`Year ${yearIndex} has ${placementCount} placements`);
                            }
                            
                            // Allow form submission
                            return true;
                        }
                        
                        // Re-index form fields before submission to ensure no gaps in array indices
                        function reindexFormFields(form) {
                            const container = document.getElementById('studentPlacedContainer');
                            const yearEntries = container.querySelectorAll('.placement-year-entry');
                            
                            yearEntries.forEach((yearEntry, yearIndex) => {
                                // Update year input index
                                const yearInput = yearEntry.querySelector('input[name*="[year]"]');
                                if (yearInput) {
                                    const oldName = yearInput.name;
                                    const newName = oldName.replace(/studentPlaced\[\d+\]/, `studentPlaced[${yearIndex}]`);
                                    yearInput.name = newName;
                                }
                                
                                // Re-index placement entries within this year
                                const placementEntries = yearEntry.querySelectorAll('.placement-entry');
                                placementEntries.forEach((placementEntry, placementIndex) => {
                                    const inputs = placementEntry.querySelectorAll('input[name*="[placements]"]');
                                    inputs.forEach(input => {
                                        // Update the name to use the new indices
                                        const oldName = input.name;
                                        const newName = oldName
                                            .replace(/studentPlaced\[\d+\]/, `studentPlaced[${yearIndex}]`)
                                            .replace(/placements\[\d+\]/, `placements[${placementIndex}]`);
                                        input.name = newName;
                                    });
                                });
                            });
                            
                            return true; // Allow form submission to proceed
                        }
                        
                        // Add a new year for student placements
                        function addYearPlacement() {
                            const container = document.getElementById('studentPlacedContainer');
                            
                            // Find the highest existing year index to avoid conflicts
                            let maxIndex = -1;
                            const inputs = container.querySelectorAll('input[name^="studentPlaced"]');
                            inputs.forEach(input => {
                                const match = input.name.match(/studentPlaced\[(\d+)\]/);
                                if (match) {
                                    maxIndex = Math.max(maxIndex, parseInt(match[1]));
                                }
                            });
                            const yearIndex = maxIndex + 1;

                            const newYear = `
                        <div class="placement-year-entry mb-4">
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label>Year <small class="text-muted">(Format: 2023-24 or 2020-21)</small></label>
                                    <input type="text" class="form-control" name="studentPlaced[${yearIndex}][year]" placeholder="e.g., 2023-24" required>
                                    <small class="form-text text-muted">Please use format: YYYY-YY (e.g., 2023-24, 2020-21)</small>
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
                            // Dynamically find the year index from the form structure to ensure correctness
                            const yearEntry = button.closest('.placement-year-entry');
                            const yearInput = yearEntry.querySelector('input[name*="[year]"]');
                            
                            // Extract the year index from the input name attribute
                            let actualYearIndex = yearIndex;
                            if (yearInput) {
                                const nameMatch = yearInput.name.match(/studentPlaced\[(\d+)\]/);
                                if (nameMatch) {
                                    actualYearIndex = parseInt(nameMatch[1]);
                                }
                            }
                            
                            const container = yearEntry.querySelector('.year-placements-container');
                            
                            // Find the highest existing placement index for this year
                            let maxIndex = -1;
                            const inputs = container.querySelectorAll(`input[name^="studentPlaced[${actualYearIndex}][placements]"]`);
                            inputs.forEach(input => {
                                const match = input.name.match(/placements\[(\d+)\]/);
                                if (match) {
                                    const idx = parseInt(match[1]);
                                    maxIndex = Math.max(maxIndex, idx);
                                }
                            });
                            const placementIndex = maxIndex + 1;
                            
                            // Debug: Log to console (remove in production)
                            console.log('Adding placement:', {
                                yearIndex: actualYearIndex,
                                placementIndex: placementIndex,
                                maxIndex: maxIndex,
                                totalInputs: inputs.length
                            });

                            const newPlacement = `
                    <div class="placement-entry row mb-2">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="studentPlaced[${actualYearIndex}][placements][${placementIndex}][studentRegNumber]" placeholder="Student Registration Number" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="studentPlaced[${actualYearIndex}][placements][${placementIndex}][studentName]" placeholder="Student Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="studentPlaced[${actualYearIndex}][placements][${placementIndex}][companyName]" placeholder="Company Name" required>
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