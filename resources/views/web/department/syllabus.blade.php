@extends('web.layouts.department')

@section('page-icon', 'fa-graduation-cap')
@section('page-description', 'Academic Curriculum and Syllabus')

@section('main-content')
</div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
<section class="section-padding">
    <div class="container">
        <!-- Page Title and Description -->
        @if(!empty($data->title))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h1 class="page-title">{{ $data->title }}</h1>
                @if(!empty($data->description))
                <div class="page-description">{!! $data->description !!}</div>
                @endif
            </div>
        </div>
        @endif

        <!-- Syllabus Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/syllabus/' . $data->imageFile) }}" 
                     alt="Department Syllabus" 
                     class="img-fluid rounded shadow-lg syllabus-banner">
            </div>
        </div>
        @endif

        <!-- Regulations -->
        @if(!empty($data->regulation))
        @php
            $regulations = is_string($data->regulation) ? json_decode($data->regulation, true) : $data->regulation;
        @endphp
        @if(is_array($regulations) && count($regulations) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="syllabus-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-gavel text-primary"></i> Regulations
                    </h2>
                    <div class="regulations-grid">
                        @foreach($regulations as $index => $regulation)
                        <div class="regulation-item p-4 mb-4 border rounded">
                            <div class="regulation-content">
                                <div class="regulation-header">
                                    <h4 class="regulation-title">
                                        <i class="fa fa-file-text text-primary"></i>
                                        {{ $regulation['Title'] ?? 'Regulation ' . ($index + 1) }}
                                    </h4>
                                    <div class="regulation-badges">
                                        @if(!empty($regulation['programType']))
                                        <span class="program-type badge badge-info">
                                            <i class="fa fa-graduation-cap"></i> {{ $regulation['programType'] }}
                                        </span>
                                        @endif
                                        @if(!empty($regulation['regulationType']))
                                        <span class="regulation-type badge badge-warning">
                                            <i class="fa fa-calendar"></i> {{ $regulation['regulationType'] }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="regulation-details">
                                    @if(!empty($regulation['pdfLink']))
                                    <div class="regulation-download">
                                        <a href="{{ $regulation['pdfLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-primary btn-sm download-btn">
                                            <i class="fa fa-download"></i> Download PDF
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Question Bank -->
        @if(!empty($data->questionBank))
        @php
            $questionBank = is_string($data->questionBank) ? json_decode($data->questionBank, true) : $data->questionBank;
        @endphp
        @if(is_array($questionBank) && count($questionBank) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="syllabus-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-question-circle text-success"></i> Question Bank
                    </h2>
                    <div class="question-bank-grid d-flex flex-wrap">
                        @foreach($questionBank as $index => $question)
                        <div class="question-item p-4 mb-4 border rounded">
                            <div class="question-content">
                                <div class="question-header">
                                    <h4 class="question-title">
                                        <i class="fa fa-file-text text-success"></i>
                                        {{ $question['Title'] ?? 'Question Bank ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($question['programType']))
                                    <span class="program-type badge badge-success">
                                        <i class="fa fa-graduation-cap"></i> {{ $question['programType'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="question-details">
                                    @if(!empty($question['pdfLink']))
                                    <div class="question-download">
                                        <a href="{{ $question['pdfLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-success btn-sm download-btn">
                                            <i class="fa fa-download"></i> Download PDF
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Syllabus Details -->
        @if(!empty($data->syllabus))
        @php
            $syllabusDetails = is_string($data->syllabus) ? json_decode($data->syllabus, true) : $data->syllabus;
        @endphp
        @if(is_array($syllabusDetails) && count($syllabusDetails) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="syllabus-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-book text-warning"></i> Syllabus Details
                    </h2>
                    <div class="syllabus-details-grid d-flex flex-wrap">
                        @foreach($syllabusDetails as $index => $syllabus)
                        <div class="syllabus-item p-4 mb-4 border rounded">
                            <div class="syllabus-content">
                                <div class="syllabus-header">
                                    <h4 class="syllabus-title">
                                        <i class="fa fa-file-text text-warning"></i>
                                        {{ $syllabus['Title'] ?? 'Syllabus ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($syllabus['programType']))
                                    <span class="program-type badge badge-warning">
                                        <i class="fa fa-graduation-cap"></i> {{ $syllabus['programType'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="syllabus-details">
                                    @if(!empty($syllabus['pdfLink']))
                                    <div class="syllabus-download">
                                        <a href="{{ $syllabus['pdfLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-warning btn-sm download-btn">
                                            <i class="fa fa-download"></i> Download PDF
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Syllabus Details (Alternative Structure) -->
        @if(!empty($data->syllabusDetails))
        @php
            $syllabusDetailsAlt = is_string($data->syllabusDetails) ? json_decode($data->syllabusDetails, true) : $data->syllabusDetails;
        @endphp
        @if(is_array($syllabusDetailsAlt) && count($syllabusDetailsAlt) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="syllabus-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-list-alt text-info"></i> Syllabus Information
                    </h2>
                    <div class="syllabus-info-grid d-flex flex-wrap ">
                        @foreach($syllabusDetailsAlt as $index => $info)
                        <div class="syllabus-info-item p-4 mb-3 border rounded">
                            <div class="syllabus-info-content">
                                <div class="syllabus-info-header">
                                    <h4 class="syllabus-info-title">
                                        <i class="fa fa-info-circle text-info"></i>
                                        {{ $info['title'] ?? 'Syllabus Info ' . ($index + 1) }}
                                    </h4>
                                </div>
                                <div class="syllabus-info-details">
                                    @if(!empty($info['description']))
                                    <p class="syllabus-info-description">{!! $syllabus['description'] !!}</p>
                                    @endif
                                    @if(!empty($info['pdfLink']))
                                    <div class="syllabus-info-download">
                                        <a href="{{ $info['pdfLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-info btn-sm download-btn">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- No Data Message -->
        @if(empty($data->regulation) && empty($data->questionBank) && empty($data->syllabus) && empty($data->syllabusDetails))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-book fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Syllabus Information Available</h3>
                    <p class="text-muted">Syllabus information will be updated soon.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
/* Page-specific styles can be added here */
</style>
@endpush

@push('scripts')
<script>
// Page-specific scripts can be added here
</script>
@endpush