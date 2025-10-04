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



                    @if($section === 'patent')
                    <!-- Patent Section -->
                    <div class="card-header">
                        <h3 class="bold">Patents</h3>
                    </div>

                    <div class="card-block">
                        <form id="patentForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Patent Container -->
                                <div id="patentContainer" class="col-md-12">
                                    <h4>Patent Details</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $patents = isset($row->patent) ? json_decode($row->patent, true) : [];
                                    @endphp
                                    @if(!empty($patents))
                                    @foreach($patents as $index => $patent)
                                    <div class="patent-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="patent[{{ $index }}][NameOfTheInventors]"
                                                    placeholder="Name of the Inventors"
                                                    value="{{ $patent['NameOfTheInventors'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="patent[{{ $index }}][titleOfThePatents]"
                                                    placeholder="Title of the Patents"
                                                    value="{{ $patent['titleOfThePatents'] }}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="patent[{{ $index }}][patentNumber]"
                                                    placeholder="Patent Number" value="{{ $patent['patentNumber'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="date" class="form-control"
                                                    name="patent[{{ $index }}][publishedDate]"
                                                    placeholder="Published Date" value="{{ $patent['publishedDate'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removePatentEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="patent-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="patent[0][NameOfTheInventors]"
                                                    placeholder="Name of the Inventors" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control"
                                                    name="patent[0][titleOfThePatents]"
                                                    placeholder="Title of the Patents" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" name="patent[0][patentNumber]"
                                                    placeholder="Patent Number" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="date" class="form-control" name="patent[0][publishedDate]"
                                                    placeholder="Published Date" required>
                                            </div>
                                            <div class="form-group col-md-1 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removePatentEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addPatentBtn" class="btn btn-primary"
                                        onclick="addPatentEntry()">Add Patent</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Patents</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new Patent entry
                    function addPatentEntry() {
                        const container = document.getElementById('patentContainer');
                        const entryIndex = container.getElementsByClassName('patent-entry').length;

                        const newEntry = `
                                <div class="patent-entry mb-4">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="patent[${entryIndex}][NameOfTheInventors]" placeholder="Name of the Inventors" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="patent[${entryIndex}][titleOfThePatents]" placeholder="Title of the Patents" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="patent[${entryIndex}][patentNumber]" placeholder="Patent Number" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="date" class="form-control" name="patent[${entryIndex}][publishedDate]" placeholder="Published Date" required>
                                        </div>
                                        <div class="form-group col-md-1 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removePatentEntry(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    // Remove a Patent entry
                    function removePatentEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.patent-entry').remove();
                        }
                    }
                    </script>
                    @endif




                    @if($section === 'bookchapter')
                    <!-- Department Book Chapters -->
                    <div class="card-header">
                        <h3 class="bold">Department Book Chapters</h3>
                    </div>

                    <div class="card-block">
                        <form id="bookChapter" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Book Chapters Section -->
                                <div id="bookChaptersContainerBookChapter" class="col-md-12">
                                    <h4>Book Chapters</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $bookChapter = isset($row->bookChapter) ? json_decode($row->bookChapter, true) : [];
                                    @endphp
                                    @if(!empty($bookChapter))
                                    @foreach($bookChapter as $tableKey => $bookChapter)
                                    <div class="book-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="bookChapter[{{ $tableKey }}][year]" placeholder="Year"
                                                    value="{{ $bookChapter['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearBookChapter(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-book-chapters-container">
                                            @foreach($bookChapter['bookChapters'] as $chapterIndex =>
                                            $bookChapterDetail)
                                            <div class="book-chapter-entry row mb-2">

                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="bookChapter[{{ $tableKey }}][bookChapters][{{ $chapterIndex }}][bookName]"
                                                        placeholder="Book Chapter Name"
                                                        value="{{ $bookChapterDetail['bookName'] }}" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeBookChapter(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addBookChapter(this, {{ isset($chapterIndex) ? $chapterIndex : 0 }})">Add
                                                Book Chapter</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="book-year-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control" name="bookChapter[0][year]"
                                                    placeholder="Year" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearBookChapter(this)">Remove Year</button>
                                            </div>
                                        </div>
                                        <div class="year-book-chapters-container">
                                            <div class="book-chapter-entry row mb-2">

                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="bookChapter[0][bookChapters][0][bookName]"
                                                        placeholder="Book Chapter Name" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeBookChapter(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addBookChapter(this, 0)">Add Book Chapter</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearBookChapterBtn" class="btn btn-primary"
                                        onclick="addYearBookChapter()">Add Year</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Book Chapters</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new year for book chapters
                    function addYearBookChapter() {
                        const container = document.getElementById('bookChaptersContainerBookChapter');
                        const yearIndex = container.getElementsByClassName('book-year-entry').length;

                        const newYear = `
                            <div class="book-year-entry mb-4">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="bookChapter[${yearIndex}][year]" placeholder="Year" required>
                                    </div>
                                    <div class="form-group col-md-2 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removeYearBookChapter(this)">Remove Year</button>
                                    </div>
                                </div>
                                <div class="year-book-chapters-container">
                                    <div class="book-chapter-entry row mb-2">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" name="bookChapter[${yearIndex}][bookChapters][0][bookName]" placeholder="Book Chapter Name" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removeBookChapter(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-info" onclick="addBookChapter(this, ${yearIndex})"><i class="fa fa-plus"></i> Add Book Chapter</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newYear);
                    }

                    // Remove a year
                    function removeYearBookChapter(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.book-year-entry').remove();
                        }
                    }

                    // Add a new book chapter
                    function addBookChapter(button, yearIndex) {
                        const container = button.closest('.book-year-entry').querySelector(
                            '.year-book-chapters-container');
                        const chapterIndex = container.getElementsByClassName('book-chapter-entry').length;

                        const newBookChapter = `
                    <div class="book-chapter-entry row mb-2">
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" name="bookChapter[${yearIndex}][bookChapters][${chapterIndex}][bookName]" placeholder="Book Chapter Name" required>
                        </div>
                        <div class="form-group col-md-2 text-end">
                            <button type="button" class="btn btn-danger" onclick="removeBookChapter(this)">Remove</button>
                        </div>
                    </div>`;
                        container.insertAdjacentHTML('beforeend', newBookChapter);
                    }

                    // Remove a book chapter
                    function removeBookChapter(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.book-chapter-entry').remove();
                        }
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
                                    @foreach($journalPublication as $tableKey => $publicationData)
                                    <div class="journal-year-entry mb-4">
                                        <div class="row">
                                            <!-- Year Input -->
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="journalPublication[{{ $tableKey }}][year]" placeholder="Year"
                                                    value="{{ $publicationData['year'] }}" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeYearJournalPublication(this)">Remove Year</button>
                                            </div>
                                        </div>

                                        <!-- Publications Section for the Year -->
                                        <div class="year-publications-container">
                                            @foreach($publicationData['publications'] as $publicationIndex =>
                                            $publication)
                                            <div class="journal-publication-entry row mb-2">
                                                <!-- Journal Name Input -->
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

                                        <!-- Add Publication Button -->
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info"
                                                onclick="addPublication(this, {{ $tableKey }})">Add Publication</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <!-- Default Empty Year & Publication Entry -->
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

                                <!-- Add Year Button -->
                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addYearJournalPublicationBtn" class="btn btn-primary"
                                        onclick="addYearJournalPublication()">Add Year</button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Journal Publications</button>
                            </div>
                        </form>
                    </div>

                    <!-- JavaScript for Dynamic Year & Publication Management -->
                    <script>
                    // Add a new year
                    function addYearJournalPublication() {
                        const container = document.getElementById('journalPublicationsContainerjournalPublication');
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
                                        <button type="button" class="btn btn-info" onclick="addPublication(this, ${yearIndex})">Add Publication</button>
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





                    @if($section === 'conferenceList')
                    <!-- Department Conference List -->
                    <div class="card-header">
                        <h3 class="bold">Department Conference List</h3>
                    </div>

                    <div class="card-block">
                        <form id="conferenceListForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Conference List Section -->
                                <div id="conferenceListContainer" class="col-md-12">
                                    <h4>Conference List</h4>
                                    @php
                                    // Decode the JSON string to an array
                                    $conferenceList = isset($row->conferenceList) ? json_decode($row->conferenceList,
                                    true) : [];
                                    @endphp
                                    @if(!empty($conferenceList))
                                    @foreach($conferenceList as $tableKey => $conference)
                                    <div class="conference-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control"
                                                    name="conferenceList[{{ $tableKey }}][list]"
                                                    placeholder="Conference Name" value="{{ $conference['list'] }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeConferenceEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="conference-entry mb-4">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control" name="conferenceList[0][list]"
                                                    placeholder="Conference Name" required>
                                            </div>
                                            <div class="form-group col-md-2 text-end">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeConferenceEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="addConferenceListBtn" class="btn btn-primary"
                                        onclick="addConferenceEntry()">Add Conference</button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Conference List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    // Add a new conference entry
                    function addConferenceEntry() {
                        const container = document.getElementById('conferenceListContainer');
                        const conferenceIndex = container.getElementsByClassName('conference-entry').length;

                        const newConference = `
                                <div class="conference-entry mb-4">
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" name="conferenceList[${conferenceIndex}][list]" placeholder="Conference Name" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger" onclick="removeConferenceEntry(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newConference);
                    }

                    // Remove a conference entry
                    function removeConferenceEntry(button) {
                        if (confirm('Are you sure you want to remove this?')) {
                            button.closest('.conference-entry').remove();
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