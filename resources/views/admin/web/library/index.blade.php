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
                        <h3 class="bold">General Library Section </h3>
                    </div>

                    <!-- Department Library  Section -->
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
                                    <img alt="Section Library  Image" width="70" height="70"
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
                                <button type="submit" class="btn btn-success">Save Library Section</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'sectionAbout')
                    <div class="card-header">
                        <h3 class="bold">Second Library Section </h3>
                    </div>

                    <!-- Department Library  Section -->
                    <div class="card-block">
                        <form id="secondLibraryForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" name="imageFile2" placeholder="Image File">
                                    <img alt="Second Library  Image" width="70" height="70"
                                        src="{{ isset($row->imageFile2) ? $baseurl . 'uploads/library/' . $row->imageFile2 : '' }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="title2" placeholder="Title" required
                                        value="{{ isset($row->title2) ? $row->title2 : '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control texteditor" name="description2"
                                        placeholder="Description"
                                        required>{{ isset($row->description2) ? $row->description2 : '' }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save 2nd Library Section</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'record')
                    <!-- Library s List -->
                    <div class="card-header">
                        <h3 class="bold">Department Library Books List</h3>
                    </div>
                    <div class="card-block">
                        <form id="booksForm" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="booksContainer" class="col-md-12">
                                <h4>Books List</h4>
                                @php
                                $booksList = isset($row->record) ? json_decode($row->record, true) : [];
                                @endphp

                                <div id="booksEntries">
                                    @if(!empty($booksList))
                                    @foreach($booksList as $index => $book)
                                    <div class="row mb-2 book-entry" id="bookEntry_{{ $index }}">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="record[{{ $index }}][title]"
                                                placeholder="Book Title" value="{{ $book['title'] ?? '' }}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="number" class="form-control"
                                                name="record[{{ $index }}][noOfBooks]" placeholder="Number of Books"
                                                value="{{ $book['noOfBooks'] ?? '' }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeBookEntry(this)">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <button type="button" class="btn btn-info" onclick="addBookEntry()">Add Book</button>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Save</button>
                        </form>
                    </div>

                    <script>
                    function addBookEntry() {
                        const container = document.querySelector('#booksEntries');
                        const index = container.querySelectorAll('.book-entry').length;

                        const newEntry = `
            <div class="row mb-2 book-entry" id="bookEntry_${index}">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="record[${index}][title]" placeholder="Book Title" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" class="form-control" name="record[${index}][noOfBooks]" placeholder="Number of Books" required>
                </div>
                <div class="form-group col-md-2 text-end">
                    <button type="button" class="btn btn-danger" onclick="removeBookEntry(this)">Remove</button>
                </div>
            </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeBookEntry(button) {
                        button.closest('.book-entry').remove();
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