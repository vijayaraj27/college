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
                        <h3 class="bold">Section Syllabus </h3>
                    </div>

                    <!-- Department Syllabus Section Main Section -->
                    <div class="card-block">
                        <form id="syllabusForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="photo">{{ __('field_photo') }}:
                                        <span>{{ __('image_size', ['height' => 400, 'width' => 400]) }}</span>
                                        <span>*</span></label> <input type="file" class="form-control" name="imageFile"
                                        placeholder="Image File">
                                    <img alt="Section Syllabus Image" width="70" height="70"
                                        src="{{ isset($row->imageFile) ? $baseurl . 'uploads/syllabus/' . $row->imageFile : '' }}" />
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
                                <button type="submit" class="btn btn-success">Save Syllabus Section</button>
                            </div>
                        </form>
                    </div>
                    @endif


                    @if($section === 'syllabus')
                    <!-- syllabus List -->
                    <div class="card-header">
                        <h3 class="bold">Syllabus List</h3>
                    </div>
                    <div class="card-block">
                        <form id="syllabusForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- syllabus List Section -->
                                <div id="syllabusContainer" class="col-md-12">
                                    <h4>Syllabus List</h4>
                                    @php
                                    $syllabusList = isset($row->syllabus) ? json_decode($row->syllabus, true) :
                                    [];
                                    $syllabusList = array_values($syllabusList ?? []);
                                    // $programs = \App\Models\Program::pluck('title', 'id'); // Fetch programs from DB
                                    $programs = Cache::remember('program_titles', 60, function() {
                                    return \App\Models\Program::pluck('title', 'id');
                                    });

                                    @endphp

                                    <div class="syllabus-entry-container mb-4" id="syllabusEntry">
                                        <div class="syllabus-entries">
                                            @if(!empty($syllabusList))
                                            @foreach($syllabusList as $index => $syllabus)
                                            <div class="syllabus-entry row mb-2" id="syllabusEntry_{{ $index }}">
                                                <div class="form-group col-md-4">
                                                    <select class="form-control"
                                                        name="syllabus[{{ $index }}][programType]" required>
                                                        <option value="">Select Program</option>
                                                        @foreach($programs as $programId => $programTitle)
                                                        <option value="{{ $programTitle }}"
                                                            {{ $syllabus['programType'] === $programTitle ? 'selected' : '' }}>
                                                            {{ $programTitle }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control"
                                                        name="syllabus[{{ $index }}][Title]"
                                                        placeholder="syllabus Title"
                                                        value="{{ $syllabus['Title'] ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control"
                                                        name="syllabus[{{ $index }}][pdfLink]" placeholder="PDF Link"
                                                        value="{{ $syllabus['pdfLink'] ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removesyllabusEntry(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                        <!-- Add syllabus Link Button -->
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info" onclick="addsyllabusEntry()"><i
                                                    class="fa fa-plus"></i> Add
                                                syllabus</button>
                                        </div>
                                    </div>

                                    @if(empty($syllabusList))
                                    <div class="alert alert-info">
                                        <p>No syllabus found. Please add a new one.</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save syllabus List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addsyllabusEntry() {
                        const container = document.querySelector('.syllabus-entries');
                        if (!container) {
                            alert('Container for syllabus entries is missing.');
                            return;
                        }

                        // Calculate new index dynamically
                        const index = [...container.querySelectorAll('.syllabus-entry')].length;

                        const newEntry = `
                                <div class="syllabus-entry row mb-2" id="syllabusEntry_${index}">
                                    <div class="form-group col-md-4">
                                        <select class="form-control" name="syllabus[${index}][programType]" required>
                                            <option value="">Select Program</option>
                                            @foreach($programs as $programId => $programTitle)
                                                <option value="{{ $programTitle }}">{{ $programTitle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="syllabus[${index}][Title]" placeholder="syllabus Title" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="syllabus[${index}][pdfLink]" placeholder="PDF Link" required>
                                    </div>
                                    <div class="form-group col-md-2 text-end">
                                        <button type="button" class="btn btn-danger" onclick="removesyllabusEntry(this)">Remove</button>
                                    </div>
                                </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removesyllabusEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.syllabus-entry').remove();
                        }
                    }
                    </script>
                    @endif


                    @if($section === 'regulation')
                    <!-- Regulation List -->
                    <div class="card-header">
                        <h3 class="bold">Regulation List</h3>
                    </div>
                    <div class="card-block">
                        <form id="regulationForm" class="needs-validation" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div class="row">
                                <!-- Regulation List Section -->
                                <div id="regulationContainer" class="col-md-12">
                                    <h4>Regulation List</h4>
                                    @php
                                    $regulationList = isset($row->regulation) ? json_decode($row->regulation, true) :
                                    [];
                                    $regulationList = array_values($regulationList ?? []);
                                    $programs = Cache::remember('program_titles', 60, function() {
                                    return \App\Models\Program::pluck('title', 'id');
                                    });
                                    $regulations = Cache::remember('regulation_names', 60, function() {
                                    return \App\Models\Regulation::pluck('name', 'id');
                                    });
                                    @endphp

                                    <div class="regulation-entry-container mb-4" id="regulationEntry">
                                        <div class="regulation-entries">
                                            @if(!empty($regulationList))
                                            @foreach($regulationList as $index => $regulation)
                                            <div class="regulation-entry row mb-2" id="regulationEntry_{{ $index }}">
                                                <div class="form-group col-md-3">
                                                    <select class="form-control"
                                                        name="regulation[{{ $index }}][programType]" required>
                                                        <option value="">Select Program</option>
                                                        @foreach($programs as $programId => $programTitle)
                                                        <option value="{{ $programTitle }}"
                                                            {{ $regulation['programType'] === $programTitle ? 'selected' : '' }}>
                                                            {{ $programTitle }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <select class="form-control"
                                                        name="regulation[{{ $index }}][regulationType]" required>
                                                        <option value="">Select Regulation</option>
                                                        @foreach($regulations as $regulationId => $regulationName)
                                                        <option value="{{ $regulationName }}"
                                                            {{ $regulation['regulationType'] === $regulationName ? 'selected' : '' }}>
                                                            {{ $regulationName }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="regulation[{{ $index }}][Title]"
                                                        placeholder="Regulation Title"
                                                        value="{{ $regulation['Title'] ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control"
                                                        name="regulation[{{ $index }}][pdfLink]" placeholder="PDF Link"
                                                        value="{{ $regulation['pdfLink'] ?? '' }}" required>
                                                </div>
                                                <div class="form-group col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeregulationEntry(this)">Remove</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                        <!-- Add Regulation Button -->
                                        <div class="text-end">
                                            <button type="button" class="btn btn-info" onclick="addregulationEntry()"><i
                                                    class="fa fa-plus"></i> Add Regulation</button>
                                        </div>
                                    </div>

                                    @if(empty($regulationList))
                                    <div class="alert alert-info">
                                        <p>No regulations found. Please add a new one.</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save Regulation List</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function addregulationEntry() {
                        const container = document.querySelector('.regulation-entries');
                        if (!container) {
                            alert('Container for regulation entries is missing.');
                            return;
                        }

                        // Calculate new index dynamically
                        const index = [...container.querySelectorAll('.regulation-entry')].length;

                        const newEntry = `
        <div class="regulation-entry row mb-2" id="regulationEntry_${index}">
            <div class="form-group col-md-3">
                <select class="form-control" name="regulation[${index}][programType]" required>
                    <option value="">Select Program</option>
                    @foreach($programs as $programId => $programTitle)
                        <option value="{{ $programTitle }}">{{ $programTitle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <select class="form-control" name="regulation[${index}][regulationType]" required>
                    <option value="">Select Regulation</option>
                    @foreach($regulations as $regulationId => $regulationName)
                        <option value="{{ $regulationName }}">{{ $regulationName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="regulation[${index}][Title]" placeholder="Regulation Title" required>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="regulation[${index}][pdfLink]" placeholder="PDF Link" required>
            </div>
            <div class="form-group col-md-2 text-end">
                <button type="button" class="btn btn-danger" onclick="removeregulationEntry(this)">Remove</button>
            </div>
        </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeregulationEntry(button) {
                        if (confirm('Are you sure you want to remove this entry?')) {
                            button.closest('.regulation-entry').remove();
                        }
                    }
                    </script>
                    @endif


                    @if($section=='questionBank')
                    <div class="card-header">
                        <h3 class="bold">Question Bank</h3>
                    </div>
                    <div class="card-block">
                        <form id="questionBankForm" method="POST"
                            action="{{ route($route . '.store', ['departmentId' => $departmentId, 'section' => $section]) }}">
                            @csrf
                            <div id="questionBankContainer" class="col-md-12">
                                <h4>Question Bank List</h4>
                                @php
                                $questionBank = isset($row->questionBank) ? json_decode($row->questionBank, true) : [];
                                $programs = \App\Models\Program::pluck('title', 'id'); // Fetch programs from DB
                                @endphp

                                <div id="questionBankEntries">
                                    @if(!empty($questionBank))
                                    @foreach($questionBank as $index => $entry)
                                    <div class="row mb-2 question-bank-entry" id="questionBankEntry_{{ $index }}">
                                        <div class="form-group col-md-4">
                                            <select class="form-control" name="questionBank[{{ $index }}][programType]"
                                                required>
                                                <option value="">Select Program</option>
                                                @foreach($programs as $programTitle)
                                                <option value="{{ $programTitle }}"
                                                    {{ $entry['programType'] === $programTitle ? 'selected' : '' }}>
                                                    {{ $programTitle }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                name="questionBank[{{ $index }}][Title]" placeholder="Title"
                                                value="{{ $entry['Title'] ?? '' }}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                name="questionBank[{{ $index }}][pdfLink]" placeholder="PDF Link"
                                                value="{{ $entry['pdfLink'] ?? '' }}" required>
                                        </div>
                                        <div class="form-group col-md-2 text-end">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeQuestionBankEntry(this)">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="form-group  text-end">
                                    <button type="button" class="btn btn-info" onclick="addQuestionBankEntry()"> <i
                                            class="fa fa-plus"></i>Add Question
                                        Entry</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Save Question Bank</button>
                        </form>
                    </div>

                    <script>
                    function addQuestionBankEntry() {
                        const container = document.querySelector('#questionBankEntries');
                        const index = container.querySelectorAll('.question-bank-entry').length;
                        const newEntry = `
                            <div class="row mb-2 question-bank-entry" id="questionBankEntry_${index}">
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="questionBank[${index}][programType]" required>
                                        <option value="">Select Program</option>
                                        @foreach($programs as $programTitle)
                                            <option value="{{ $programTitle }}">{{ $programTitle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="questionBank[${index}][Title]" placeholder="Title" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="questionBank[${index}][pdfLink]" placeholder="PDF Link" required>
                                </div>
                                <div class="form-group col-md-2 text-end">
                                    <button type="button" class="btn btn-danger" onclick="removeQuestionBankEntry(this)">Remove</button>
                                </div>
                            </div>`;
                        container.insertAdjacentHTML('beforeend', newEntry);
                    }

                    function removeQuestionBankEntry(button) {
                        button.closest('.question-bank-entry').remove();
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