@extends('web.layouts.department')

@section('page-icon', 'fa-envelope')
@section('page-description', 'Latest News and Updates')

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

        <!-- Newsletter Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/newsletters/' . $data->imageFile) }}" 
                     alt="Department Newsletters" 
                     class="img-fluid rounded shadow-lg newsletter-banner">
            </div>
        </div>
        @endif

        <!-- Newsletters List -->
        @if(!empty($data->newsletter))
        @php
            $newsletters = is_string($data->newsletter) ? json_decode($data->newsletter, true) : $data->newsletter;
        @endphp
        @if(is_array($newsletters) && count($newsletters) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="newsletters-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-newspaper-o text-primary"></i> Department Newsletters
                    </h2>
                    <div class="newsletters-grid">
                        @foreach($newsletters as $index => $newsletter)
                        <div class="newsletter-item p-4 mb-4 border rounded">
                            <div class="newsletter-content">
                                <div class="newsletter-header">
                                    <h4 class="newsletter-title">
                                        <i class="fa fa-calendar text-primary"></i>
                                        {{ $newsletter['year'] ?? 'Newsletter ' . ($index + 1) }}
                                    </h4>
                                </div>
                                <div class="newsletter-details">
                                    @if(!empty($newsletter['pdfLink']))
                                    <div class="newsletter-download">
                                        <a href="{{ $newsletter['pdfLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-primary btn-sm download-btn">
                                            <i class="fa fa-download"></i> Download PDF
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($newsletter['description']))
                                    <p class="newsletter-description">{!! $syllabus['description'] !!}</p>
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

        <!-- Newsletter Details -->
        @if(!empty($data->newsletterDetails))
        @php
            $newsletterDetails = is_string($data->newsletterDetails) ? json_decode($data->newsletterDetails, true) : $data->newsletterDetails;
        @endphp
        @if(is_array($newsletterDetails) && count($newsletterDetails) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="newsletters-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-info-circle text-success"></i> Newsletter Details
                    </h2>
                    <div class="newsletter-details-grid">
                        @foreach($newsletterDetails as $index => $detail)
                        <div class="detail-item p-4 mb-3 border rounded">
                            <div class="detail-content">
                                <div class="detail-header">
                                    <h4 class="detail-title">
                                        <i class="fa fa-file-text text-success"></i>
                                        {{ $detail['title'] ?? 'Detail ' . ($index + 1) }}
                                    </h4>
                                </div>
                                @if(!empty($detail['description']))
                                <div class="detail-description">
                                    <p>{!! $syllabus['description'] !!}</p>
                                </div>
                                @endif
                                @if(!empty($detail['pdfLink']))
                                <div class="detail-download">
                                    <a href="{{ $detail['pdfLink'] }}" 
                                       target="_blank" 
                                       class="btn btn-success btn-sm download-btn">
                                        <i class="fa fa-download"></i> Download
                                    </a>
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
        @if(empty($data->newsletter) && empty($data->newsletterDetails))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-newspaper-o fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Newsletters Available</h3>
                    <p class="text-muted">Newsletter information will be updated soon.</p>
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