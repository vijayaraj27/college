@extends('web.layouts.department')

@section('page-icon', 'fa-newspaper')
@section('page-description', 'Department Magazines and Publications')

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

        <!-- Magazine Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/magazines/' . $data->imageFile) }}" 
                     alt="Department Magazines" 
                     class="img-fluid rounded shadow-lg magazine-banner">
            </div>
        </div>
        @endif

        <!-- Magazines List -->
        @if(!empty($data->magazines))
        @php
            $magazines = is_string($data->magazines) ? json_decode($data->magazines, true) : $data->magazines;
        @endphp
        @if(is_array($magazines) && count($magazines) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="magazines-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-newspaper-o text-primary"></i> Department Magazines
                    </h2>
                    <div class="magazines-grid">
                        @foreach($magazines as $index => $magazine)
                        <div class="magazine-item p-4 mb-4 border rounded">
                            <div class="magazine-content">
                                <div class="magazine-header">
                                    <h4 class="magazine-title">
                                        <i class="fa fa-book text-primary"></i>
                                        {{ $magazine['year'] ?? 'Magazine ' . ($index + 1) }}
                                    </h4>
                                </div>
                                <div class="magazine-details">
                                    @if(!empty($magazine['pdfLink']))
                                    <div class="magazine-download">
                                        <a href="{{ $magazine['pdfLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-primary btn-sm download-btn">
                                            <i class="fa fa-download"></i> Download PDF
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($magazine['description']))
                                    <p class="magazine-description">{!! $syllabus['description'] !!}</p>
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

        <!-- Magazine Details -->
        @if(!empty($data->magazineDetails))
        @php
            $magazineDetails = is_string($data->magazineDetails) ? json_decode($data->magazineDetails, true) : $data->magazineDetails;
        @endphp
        @if(is_array($magazineDetails) && count($magazineDetails) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="magazines-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-info-circle text-success"></i> Magazine Details
                    </h2>
                    <div class="magazine-details-grid">
                        @foreach($magazineDetails as $index => $detail)
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
        @if(empty($data->magazines) && empty($data->magazineDetails))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-newspaper-o fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Magazines Available</h3>
                    <p class="text-muted">Magazine information will be updated soon.</p>
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