@extends('web.layouts.department')

@section('page-icon', 'fa-book')
@section('page-description', 'Library Resources and Services')

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

        <!-- Library Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/library/' . $data->imageFile) }}" 
                     alt="Department Library" 
                     class="img-fluid rounded shadow-lg library-banner">
            </div>
        </div>
        @endif

        <!-- Second Section -->
        @if(!empty($data->title2) || !empty($data->description2))
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="library-section">
                    @if(!empty($data->title2))
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-book text-primary"></i> {{ $data->title2 }}
                    </h2>
                    @endif
                    
                    @if(!empty($data->description2))
                    <div class="library-description text-center mb-4">
                        {!! $data->description2 !!}
                    </div>
                    @endif
                    
                    @if(!empty($data->imageFile2))
                    <div class="text-center">
                        <img src="{{ asset('uploads/library/' . $data->imageFile2) }}" 
                             alt="{{ $data->title2 ?? 'Library Section' }}" 
                             class="img-fluid rounded shadow library-section-image">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <!-- Library Records -->
        @if(!empty($data->record))
        @php
            $records = is_string($data->record) ? json_decode($data->record, true) : $data->record;
        @endphp
        @if(is_array($records) && count($records) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="library-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-list-alt text-success"></i> Library Records
                    </h2>
                    <div class="records-grid">
                        @foreach($records as $index => $record)
                        <div class="record-item p-4 mb-3 border rounded">
                            <div class="record-content">
                                <div class="record-header">
                                    <h4 class="record-title">
                                        <i class="fa fa-bookmark text-primary"></i>
                                        {{ $record['title'] ?? 'Book Category ' . ($index + 1) }}
                                    </h4>
                                    @if(!empty($record['noOfBooks']))
                                    <span class="book-count badge badge-info">
                                        <i class="fa fa-book"></i> {{ $record['noOfBooks'] }} Books
                                    </span>
                                    @endif
                                </div>
                                @if(!empty($record['description']))
                                <div class="record-description">
                                    <p>{!! $syllabus['description'] !!}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

        <!-- Library Details -->
        @if(!empty($data->libraryDetails))
        @php
            $libraryDetails = is_string($data->libraryDetails) ? json_decode($data->libraryDetails, true) : $data->libraryDetails;
        @endphp
        @if(is_array($libraryDetails) && count($libraryDetails) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="library-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-info-circle text-warning"></i> Library Details
                    </h2>
                    <div class="library-details-grid">
                        @foreach($libraryDetails as $index => $detail)
                        <div class="detail-item p-4 mb-3 border rounded">
                            <div class="detail-content">
                                <div class="detail-header">
                                    <h4 class="detail-title">
                                        <i class="fa fa-file-text text-warning"></i>
                                        {{ $detail['title'] ?? 'Detail ' . ($index + 1) }}
                                    </h4>
                                </div>
                                @if(!empty($detail['description']))
                                <div class="detail-description">
                                    <p>{!! $syllabus['description'] !!}</p>
                                </div>
                                @endif
                                @if(!empty($detail['count']))
                                <div class="detail-count">
                                    <span class="badge badge-warning">
                                        <i class="fa fa-hashtag"></i> {{ $detail['count'] }}
                                    </span>
                                </div>
                                @endif
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
        @if(empty($data->record) && empty($data->libraryDetails) && empty($data->title2) && empty($data->description2))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-book fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Library Information Available</h3>
                    <p class="text-muted">Library information will be updated soon.</p>
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