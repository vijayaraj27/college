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
                        <h3 class="bold">Department Infrastructures</h3>
                    </div>

                    <!-- Department Infrastructures Main Section -->
                    <div class="card-block">
                        <form id="achievementsForm" class="needs-validation" method="POST" action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" name="imageFile" placeholder="Image File" >
                                    <img alt="Section Infrastructures Image" width="70" height="70" 
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/infrastructures/' . $row->imageFile : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="title" placeholder="Title" required value="{{ isset($row->title) ? $row->title : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control texteditor" name="description" placeholder="Description" required>{{ isset($row->description) ? $row->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Info</button>
                            </div>
                        </form>
                    </div>
                    @endif

                    @if($section === 'buildings')
<!-- Department Infrastructures - Buildings -->
<div class="card-header">
    <h3 class="bold">Department Infrastructures - Buildings</h3>
</div>

<div class="card-block">
    <form id="buildingInfrastructuresForm" 
    class="needs-validation" method="POST" 
    action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}" 
    enctype="multipart/form-data" >
        @csrf
        <div class="row">
            @php
                // Replace this with your provided JSON data
              //  $buildings = json_decode('[{"title": "Main Engineering Building", "imageFile": "main_building.jpg", "description": "This is the main building housing engineering classes and laboratories."}, {"title": "Research Facility", "imageFile": "research_facility.jpg", "description": "Dedicated research facility for engineering projects."}]', true);
              $buildings = isset($row->buildings) ? json_decode($row->buildings, true) : [];
            @endphp

 
            @foreach($buildings as $index => $building)
            <div class="building-entry row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="buildings[{{ $index }}][title]" placeholder="Building Title" value="{{ $building['title'] }}" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="file" class="form-control" name="buildings[{{ $index }}][imageFile]" accept="image/*" placeholder="Image" >
                      
                    @if(isset($building['imageFile']))
                        <img src="{{ asset('uploads/infrastructures/' . $building['imageFile']) }}" alt="{{ $building['title'] }}" width="70" height="70">
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <textarea class="form-control" name="buildings[{{ $index }}][description]" placeholder="Building Description" required>{{ $building['description'] }}</textarea>
                </div>
                <div class="form-group col-md-12 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeBuildingEntry(this)">Remove</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Add Building Button -->
        <div class="text-center">
            <button type="button" id="addBuildingBtn" class="btn btn-info" onclick="addBuilding()">Add Building</button>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Save Buildings</button>
        </div>
    </form>
</div>
@endif

<script>
    function addBuilding() {
    const container = document.querySelector('#buildingInfrastructuresForm .row');
    const index = container.getElementsByClassName('building-entry').length;

    const newEntry = `
        <div class="building-entry row mb-3">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="buildings[${index}][title]" placeholder="Building Title" required>
            </div>
            <div class="form-group col-md-4">
                <input type="file" class="form-control" name="buildings[${index}][imageFile]" accept="image/*">
            </div>
            <div class="form-group col-md-4">
                <textarea class="form-control" name="buildings[${index}][description]" placeholder="Building Description" required></textarea>
            </div>
            <div class="form-group col-md-12 text-end">
                <button type="button" class="btn btn-danger" onclick="removeBuildingEntry(this)">Remove</button>
            </div>
        </div>`;
    container.insertAdjacentHTML('beforeend', newEntry);
}

function removeBuildingEntry(button) {
    if (confirm('Are you sure you want to remove this building?')) {
        button.closest('.building-entry').remove();
    }
}

    </script>


                    

 

  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content-->
 
@endsection
