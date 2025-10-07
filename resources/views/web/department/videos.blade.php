@extends('web.layouts.department')

@section('page-icon', 'fa-video')
@section('page-description', 'Educational Videos and Materials')

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

        <!-- Video Image -->
        @if(!empty($data->imageFile))
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/videomaterials/' . $data->imageFile) }}" 
                     alt="Department Videos" 
                     class="img-fluid rounded shadow-lg video-banner">
            </div>
        </div>
        @endif

        <!-- Video URL -->
        @if(!empty($data->videoUrl))
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="video-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-play-circle text-primary"></i> Featured Video
                    </h2>
                    <div class="featured-video-container">
                        <div class="video-wrapper">
                            @if(strpos($data->videoUrl, 'youtube.com') !== false || strpos($data->videoUrl, 'youtu.be') !== false)
                                @php
                                    $videoId = '';
                                    if (strpos($data->videoUrl, 'youtube.com') !== false) {
                                        parse_str(parse_url($data->videoUrl, PHP_URL_QUERY), $query);
                                        $videoId = $query['v'] ?? '';
                                    } elseif (strpos($data->videoUrl, 'youtu.be') !== false) {
                                        $videoId = basename(parse_url($data->videoUrl, PHP_URL_PATH));
                                    }
                                @endphp
                                @if($videoId)
                                <iframe width="100%" height="400" 
                                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                                @else
                                <div class="video-placeholder">
                                    <a href="{{ $data->videoUrl }}" target="_blank" class="btn btn-primary btn-lg">
                                        <i class="fa fa-play"></i> Watch Video
                                    </a>
                                </div>
                                @endif
                            @else
                            <div class="video-placeholder">
                                <a href="{{ $data->videoUrl }}" target="_blank" class="btn btn-primary btn-lg">
                                    <i class="fa fa-play"></i> Watch Video
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Videos List -->
        @if(!empty($data->videos))
        @php
            $videos = is_string($data->videos) ? json_decode($data->videos, true) : $data->videos;
        @endphp
        @if(is_array($videos) && count($videos) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="videos-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-video-camera text-success"></i> Video Materials
                    </h2>
                    <div class="videos-grid d-flex flex-wrap">
                        @foreach($videos as $index => $video)
                        <div class="video-item p-4 mb-4 border rounded">
                            <div class="video-content">
                                <div class="video-header">
                                    <h4 class="video-title">
                                        <i class="fa fa-play-circle text-success"></i>
                                        {{ $video['title'] ?? 'Video ' . ($index + 1) }}
                                    </h4>
                                </div>
                                <div class="video-details">
                                    @if(!empty($video['YoutubeLink']))
                                    <div class="video-link">
                                        <a href="{{ $video['YoutubeLink'] }}" 
                                           target="_blank" 
                                           class="btn btn-success btn-sm watch-btn">
                                            <i class="fa fa-youtube-play"></i> Watch on YouTube
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($video['description']))
                                    <p class="video-description">{!! $syllabus['description'] !!}</p>
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

        <!-- Video Details -->
        @if(!empty($data->videoDetails))
        @php
            $videoDetails = is_string($data->videoDetails) ? json_decode($data->videoDetails, true) : $data->videoDetails;
        @endphp
        @if(is_array($videoDetails) && count($videoDetails) > 0)
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="videos-section">
                    <h2 class="section-title text-center mb-4">
                        <i class="fa fa-info-circle text-info"></i> Video Details
                    </h2>
                    <div class="video-details-grid">
                        @foreach($videoDetails as $index => $detail)
                        <div class="video-detail-item p-4 mb-3 border rounded">
                            <div class="video-detail-content">
                                <div class="video-detail-header">
                                    <h4 class="video-detail-title">
                                        <i class="fa fa-file-video-o text-info"></i>
                                        {{ $detail['title'] ?? 'Video Detail ' . ($index + 1) }}
                                    </h4>
                                </div>
                                <div class="video-detail-info">
                                    @if(!empty($detail['description']))
                                    <p class="video-detail-description">{!! $syllabus['description'] !!}</p>
                                    @endif
                                    @if(!empty($detail['url']))
                                    <div class="video-detail-link">
                                        <a href="{{ $detail['url'] }}" 
                                           target="_blank" 
                                           class="btn btn-info btn-sm watch-btn">
                                            <i class="fa fa-play"></i> Watch Video
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
        @if(empty($data->videos) && empty($data->videoUrl) && empty($data->videoDetails))
        <div class="row">
            <div class="col-md-12">
                <div class="no-data-message text-center py-5">
                    <i class="fa fa-video-camera fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No Videos Available</h3>
                    <p class="text-muted">Video materials will be updated soon.</p>
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