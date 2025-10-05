@extends('web.layouts.department')

@section('page-icon', 'fa-file-alt')
@section('page-description', 'Research Publications and Papers')

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

        <!-- Publication Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/publications/' . $data->imageFile) }}" 
                     alt="Department Publications" 
                     class="img-fluid rounded shadow-lg publication-banner">
            </div>
        </div>
        @endif

        <!-- Patents -->
        @if(!empty($data->patent))
        @php
            $patents = is_string($data->patent) ? json_decode($data->patent, true) : $data->patent;
        @endphp
        @if(is_array($patents) && count($patents) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="publications-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-certificate text-warning"></i> Patents
                    </h2>
                    <div class="publications-grid">
                        @foreach($patents as $index => $patent)
                        <div class="publication-item p-4 mb-4 border rounded">
                            <div class="publication-content">
                                <div class="publication-header">
                                    <h4 class="publication-title">
                                        <i class="fa fa-lightbulb-o text-warning"></i>
                                        {{ $patent['titleOfThePatents'] ?? 'Patent ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($patent['patentNumber']))
                                    <span class="patent-number badge badge-warning">
                                        <i class="fa fa-hashtag"></i> {{ $patent['patentNumber'] }}
                                    </span>
                                    @endif
                                </div>
                                <div class="publication-details">
                                    @if(!empty($patent['nameOfTheInventors']))
                                    <p class="inventors">
                                        <strong>Inventors:</strong> {{ $patent['nameOfTheInventors'] }}
                                    </p>
                                    @endif
                                    @if(!empty($patent['publishedDate']))
                                    <p class="published-date">
                                        <strong>Published Date:</strong> {{ $patent['publishedDate'] }}
                                    </p>
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

        <!-- Book Chapters -->
        @if(!empty($data->bookChapter))
        @php
            $bookChapters = is_string($data->bookChapter) ? json_decode($data->bookChapter, true) : $data->bookChapter;
        @endphp
        @if(is_array($bookChapters) && count($bookChapters) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="publications-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-book text-primary"></i> Book Chapters
                    </h2>
                    <div class="publications-timeline">
                        @foreach($bookChapters as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-4">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['bookChapters']) && is_array($yearData['bookChapters']))
                                <div class="chapters-list">
                                    @foreach($yearData['bookChapters'] as $chapter)
                                    <div class="chapter-item p-3 mb-2 border-left border-primary">
                                        <div class="chapter-content">
                                            <h5 class="chapter-title">{{ $chapter['bookName'] ?? 'Book Chapter' }}</h5>
                                            @if(!empty($chapter['authors']))
                                            <p class="chapter-authors">
                                                <strong>Authors:</strong> {{ $chapter['authors'] }}
                                            </p>
                                            @endif
                                            @if(!empty($chapter['link']))
                                            <div class="chapter-link">
                                                <a href="{{ $chapter['link'] }}" 
                                                   target="_blank" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa fa-external-link"></i> View Chapter
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Journal Publications -->
        @if(!empty($data->journalPublication))
        @php
            $journalPublications = is_string($data->journalPublication) ? json_decode($data->journalPublication, true) : $data->journalPublication;
        @endphp
        @if(is_array($journalPublications) && count($journalPublications) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="publications-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-newspaper-o text-success"></i> Journal Publications
                    </h2>
                    <div class="publications-timeline">
                        @foreach($journalPublications as $yearData)
                            @if(is_array($yearData) && isset($yearData['year']))
                            <div class="year-section mb-4">
                                <h3 class="year-title">
                                    <i class="fa fa-calendar text-info"></i> {{ $yearData['year'] }}
                                </h3>
                                @if(isset($yearData['publications']) && is_array($yearData['publications']))
                                <div class="publications-list">
                                    @foreach($yearData['publications'] as $publication)
                                    <div class="publication-item p-3 mb-2 border-left border-success">
                                        <div class="publication-content">
                                            <h5 class="publication-title">{{ $publication['title'] ?? 'Journal Publication' }}</h5>
                                            @if(!empty($publication['journal']))
                                            <p class="publication-journal">
                                                <strong>Journal:</strong> {{ $publication['journal'] }}
                                            </p>
                                            @endif
                                            @if(!empty($publication['authors']))
                                            <p class="publication-authors">
                                                <strong>Authors:</strong> {{ $publication['authors'] }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Conference List -->
        @if(!empty($data->conferenceList))
        @php
            $conferences = is_string($data->conferenceList) ? json_decode($data->conferenceList, true) : $data->conferenceList;
        @endphp
        @if(is_array($conferences) && count($conferences) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="publications-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-users text-info"></i> Conference Publications
                    </h2>
                    <div class="conferences-list">
                        @foreach($conferences as $index => $conference)
                        <div class="conference-item p-4 mb-3 border rounded">
                            <div class="conference-content">
                                <div class="conference-header">
                                    <h4 class="conference-title">
                                        <i class="fa fa-microphone text-info"></i>
                                        {{ $conference['title'] ?? 'Conference ' . ($index + 1) }}
                                    </h4>
                                </div>
                                <div class="conference-details">
                                    @if(!empty($conference['description']))
                                    <p class="conference-description">{!! $syllabus['description'] !!}</p>
                                    @endif
                                    @if(!empty($conference['date']))
                                    <p class="conference-date">
                                        <strong>Date:</strong> {{ $conference['date'] }}
                                    </p>
                                    @endif
                                    @if(!empty($conference['location']))
                                    <p class="conference-location">
                                        <strong>Location:</strong> {{ $conference['location'] }}
                                    </p>
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
        @if(empty($data->patent) && empty($data->bookChapter) && empty($data->journalPublication) && empty($data->conferenceList))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-file-text fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Publications Available</h3>
                    <p class="text-muted">Publication information will be updated soon.</p>
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