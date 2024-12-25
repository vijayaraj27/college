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

                    <!-- Department Publications  Section -->
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
                                    <img alt="Section Publications  Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/library/' . $row->imageFile : '' }}" />
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
                                <button type="submit" class="btn btn-success">Save Publications Section</button>
                            </div>
                        </form>
                    </div>
                    @endif




                    @if($section === 'bookchapter')
                    <!-- Publications List -->
                    <div class="card-header">
                        <h3 class="bold">Department Publications Book Chapters by Year</h3>
                    </div>
                    <div class="card-block">
                        <form id="chaptersForm" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="chaptersContainer" class="col-md-12">
                                <h4>Chapters List by Year</h4>
                                @php
                                $chaptersData = isset($row->bookChapter) && is_string($row->bookChapter)
                                ? json_decode($row->bookChapter, true)
                                : [];
                                @endphp

                                <div id="yearsEntries">
                                    @if(!empty($chaptersData))
                                    @foreach($chaptersData as $year => $data)
                                    @php
                                    $chapters = isset($data ) ? $data : [];
                                    @endphp
                                    <div class="year-section mb-4" id="yearSection_{{ $year }}">

                                        <div class="row mb-2">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control year-input"
                                                    name="bookChapter[{{ $year }}]" placeholder="Year"
                                                    value="{{ $year }}">
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearSection('{{ $year }}')">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="chapters-list">
                                            @foreach($chapters as $index => $chapter)
                                            <div class="row mb-2 chapter-entry"
                                                id="chapterEntry_{{ $year }}_{{ $index }}">
                                                <div class="form-group col-md-8">
                                                    <input type="text" class="form-control"
                                                        name="bookChapter[{{ $year }}][{{ $index }}]"
                                                        placeholder="Chapter Title"
                                                        value="{{ is_string($chapter) ? $chapter : '' }}" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeChapterEntry(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group col-md-12 text-end">
                                            <button type="button" class="btn btn-info mt-2"
                                                onclick="addChapterEntry('{{ $year }}')">Add Chapter</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <button type="button" class="btn btn-primary mt-3" onclick="addYearSection()">Add
                                    Year</button>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addYearSection() {
                        const container = document.querySelector('#yearsEntries');
                        const year = new Date().getFullYear(); // Default to current year
                        if (document.querySelector(`#yearSection_${year}`)) {
                            alert('This year already exists.');
                            return;
                        }

                        const newYearSection = `
                                    <div class="year-section mb-4" id="yearSection_${year}">
                                       
                                        <div class="row mb-2">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control year-input" 
                                                    name="bookChapter[${year}]" placeholder="Year" 
                                                    value="${year}" readonly>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger" 
                                                        onclick="removeYearSection('${year}')">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="chapters-list">
                                            <!-- Chapters will be added here -->
                                        </div>
                                        <div class="form-group col-md-12 text-end">
                                        <button type="button" class="btn btn-info mt-2" 
                                                onclick="addChapterEntry('${year}')">Add Chapter</button>
                                                 </div>
                                    </div>`;
                        container.insertAdjacentHTML('beforeend', newYearSection);
                    }

                    function removeYearSection(year) {
                        const section = document.querySelector(`#yearSection_${year}`);
                        if (section) {
                            section.remove();
                        }
                    }

                    function addChapterEntry(year) {
                        const container = document.querySelector(`#yearSection_${year} .chapters-list`);
                        const index = container.querySelectorAll('.chapter-entry').length;

                        // Check for duplicate chapter titles
                        const existingTitles = Array.from(container.querySelectorAll('input')).map(input => input.value
                            .trim());
                        if (existingTitles.includes('')) {
                            alert('Please complete existing chapters before adding a new one.');
                            return;
                        }

                        const newEntry = `
                            <div class="row mb-2 chapter-entry" id="chapterEntry_${year}_${index}">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" 
                                        name="bookChapter[${year}][${index}]" 
                                        placeholder="Chapter Title" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" 
                                            onclick="removeChapterEntry(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeChapterEntry(button) {
                        button.closest('.chapter-entry').remove();
                    }
                    </script>
                    @endif





                    @if($section === 'journalpublication')
                    <!-- Department Journal Publications -->
                    <div class="card-header">
                        <h3 class="bold">Department Journal Publications</h3>
                    </div>

                    <div class="card-block">
                        <form id="journalPublication" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Journal Publications Section -->
                                <div id="journalPublicationsContainerjournalPublication" class="col-md-12">
                                    <h4>Journal Publications</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $journalPublication = isset($row->journalPublication) ?
                                    json_decode($row->journalPublication, true) : [];
                                    @endphp
                                    @if(!empty($journalPublication))
                                    @foreach($journalPublication as $tableKey => $journalPublication)
                                    <div class="journal-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="journalPublication[{{ $tableKey }}][year]" placeholder="Year"
                                                    value="{{ $journalPublication['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearJournalPublication(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-publications-container">
                                            @foreach($journalPublication['publications'] as $publicationIndex =>
                                            $publication)
                                            <div class="journal-publication-entry row mb-2">

                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="journalPublication[{{ $tableKey }}][publications][{{ $publicationIndex }}][journalName]"
                                                        placeholder="Journal Name"
                                                        value="{{ $publication['journalName'] }}" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removePublication(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addPublication(this, {{ isset($publicationIndex) ? $publicationIndex : 0 }})">Add
                                                Publication</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="journal-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="journalPublication[0][year]" placeholder="Year" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearJournalPublication(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-publications-container">
                                            <div class="journal-publication-entry row mb-2">

                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="journalPublication[0][publications][0][journalName]"
                                                        placeholder="Journal Name" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removePublication(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addPublication(this, 0)">Add Publication</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearJournalPublicationBtn" class="btn btn-primary"
                                        onclick="addYearJournalPublication()">Add Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Journal Publications</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year
                    function addYearJournalPublication() {
                        const container = document.getElementById(
                            'journalPublicationsContainerjournalPublication');
                        const yearIndex = container.getElementsByClassName('journal-year-entry').length;

                        const newYear = `
                <div class="journal-year-entry mb-4">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" name="journalPublication[${yearIndex}][year]" placeholder="Year" required>
                        </div>
                        <div class="form-group col-md-2 text-end">
                            <button type="button" class="btn btn-danger" onclick="removeYearJournalPublication(this)">Remove Year</button>
                        </div>
                    </div>
                    <div class="year-publications-container">
                        <div class="journal-publication-entry row mb-2">
                         
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" name="journalPublication[${yearIndex}][publications][0][journalName]" placeholder="Journal Name" required>
                            </div>
                            <div class="form-group col-md-2 text-end">
                                <button type="button" class="btn btn-danger" onclick="removePublication(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-info" onclick="addPublication(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Publication</button>
                    </div>
                </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year
                    function removeYearJournalPublication(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.journal-year-entry').remove();
                        }
                    }

                    // Add a new publication
                    function addPublication(button, yearIndex) {
                        const container = button.closest('.journal-year-entry').querySelector(
                            '.year-publications-container');
                        const publicationIndex = container.getElementsByClassName('journal-publication-entry').length;

                        const newPublication = `
                <div class="journal-publication-entry row mb-2">
                    
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="journalPublication[${yearIndex}][publications][${publicationIndex}][journalName]" placeholder="Journal Name" required>
                    </div>
                    <div class="form-group col-md-2 text-end">
                        <button type="button" class="btn btn-danger" onclick="removePublication(this)">Remove</button>
                    </div>
                </div>`;
                        container.insertAdjacentHTML('beforeend', newPublication);
                    }

                    // Remove a publication
                    function removePublication(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.journal-publication-entry').remove();
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