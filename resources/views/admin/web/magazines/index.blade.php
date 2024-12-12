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
                        <h3 class="bold">Section Magazines </h3>
                    </div>

                    <!-- Department Magazines Section Main Section -->
                    <div class="card-block">
                        <form id="magazinesForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">l
                                    <input type="file" class="form-control" name="imageFile" placeholder="Image File">
                                    <img alt="Section Magazines Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/magazines/' . $row->imageFile : '' }}" />
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
                                <button type="submit" class="btn btn-success">Save Magazines Section</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'magazines')
                    <!-- Magazines  List -->
                    <div class="card-header">
                        <h3 class="bold">Magazines List</h3>
                    </div>
                    <div class="card-block">
                        <form id="studentPlacedForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Magazines  List Section -->
                                <div id="studentPlacedContainer" class="col-md-12">
                                    <h4>Magazines List</h4>
                                    @php
                                    $magazinesList = isset($row->magazines) ? json_decode($row->magazines,
                                    true) : [];
                                    $magazinesList = array_values($magazinesList ?? []);

                                    @endphp

                                    <div class="student-achievement-appreciation-year-entry mb-4"
                                        id="studentPlacedYearEntry">
                                        <div class="year-appreciations-container">
                                            @if(!empty($magazinesList))
                                            @foreach($magazinesList as $index => $magazines)
                                            <div class="student-achievement-appreciation-entry row mb-2"
                                                id="studentAchievementAppreciationEntry_{{ $index }}">
                                                @foreach(['year' => 'Registration Number', 'pdfLink' => 'Student
                                                Name'] as $key => $placeholder)
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control"
                                                        name="magazines[{{ $index }}][{{ $key }}]"
                                                        placeholder="{{ $placeholder }}"
                                                        value="{{ $magazines[$key] ?? '' }}" required>
                                                </div>
                                                @endforeach
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeAchievementAppreciation(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                        <!-- Add Magazines Link Button (Visible Always) -->
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addAchievementAppreciation(this)">Add Magazines Link</button>
                                        </div>
                                    </div>
                                    @if(empty($magazinesList))
                                    <div class="alert alert-info">
                                        <p>No magazines found. Please add a new one.</p>
                                    </div>
                                    @endif




                                </div>




                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Magazines
                                    list </button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addAchievementAppreciation(button) {
                        const container = document.querySelector('.year-appreciations-container');
                        if (!container) {
                            alert('Container for Magazines links is missing.');
                            return;
                        }

                        // Calculate new index dynamically
                        const appreciationIndex = [...container.querySelectorAll(
                            '.student-achievement-appreciation-entry')].length;

                        const newAchievement = `
                            <div class="student-achievement-appreciation-entry row mb-2" id="studentAchievementAppreciationEntry_${appreciationIndex}">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="magazines[${appreciationIndex}][year]" placeholder="Title" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="magazines[${appreciationIndex}][pdfLink]" placeholder="PDF Link" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeAchievementAppreciation(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newAchievement);
                    }



                    // Remove an achievement
                    function removeAchievementAppreciation(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.student-achievement-appreciation-entry').remove();
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