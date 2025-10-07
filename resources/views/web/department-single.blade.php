@extends('web.layouts.master')
@section('title', $department->title)
 
  @section('content')
    <!-- main-area -->
    <main>
    <!-- Slider Section -->
    <x-web.slider 
        :sliders="$sliders"
        :department="$department"
        default-button-link="#department-content"
        class="department-slider"
    />
    <!-- slider-area-end -->

    <!-- Breadcrumb Section -->
    <x-web.breadcrumb 
        :title="$department->title"
        :items="[
            ['title' => 'Home', 'url' => url('/')],
            ['title' => __('navbar_department'), 'url' => route('department')],
            ['title' => $department->title, 'url' => null]
        ]"
    />
    <!-- breadcrumb-area-end -->

    <!-- Department Content Section -->
    <section class="project-detail" id="department-content">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                            <div class="text-column col-lg-12 col-md-12 col-sm-12">
                        <!-- Quick Navigation Buttons -->
                        <x-web.quick-navigation 
                            title="Details"
                            :items="[
                                ['title' => __('field_faculty'), 'url' => url('/department/' . $department->slug . '/about')],
                                ['title' => 'Infrastructure', 'url' => url('/department/' . $department->slug . '/infrastructures')],
                                ['title' => 'Achievements', 'url' => url('/department/' . $department->slug . '/achievements')],
                                ['title' => 'Placement', 'url' => url('/department/' . $department->slug . '/placements')],
                                ['title' => 'Video Materials', 'url' => url('/department/' . $department->slug . '/videos')],
                                ['title' => 'Course Materials', 'url' => url('/department/' . $department->slug . '/courses')],
                                ['title' => 'Events', 'url' => url('/department/' . $department->slug . '/events')],
                                ['title' => 'Newsletter', 'url' => url('/department/' . $department->slug . '/newsletters')],
                                ['title' => 'Syllabus', 'url' => url('/department/' . $department->slug . '/syllabus')],
                                ['title' => 'Department Library', 'url' => url('/department/' . $department->slug . '/libraries')],
                                ['title' => 'Research', 'url' => url('/department/' . $department->slug . '/research')],
                                ['title' => 'Publications', 'url' => url('/department/' . $department->slug . '/publications')],
                                ['title' => 'Activities', 'url' => url('/department/' . $department->slug . '/activities')]
                            ]"
                        />

                        <!-- Department Title and Description -->
                        <h2>{{ $department->title }}</h2>
                            <div class="inner-column">
                            @if(isset($sectionAbout['description']) && !empty($sectionAbout['description']))
                                <p>{!! $sectionAbout['description'] !!}</p>
                            @else
                                <p>The Department of {{ $department->title }} is committed to providing excellent education and research opportunities in the field of engineering. Our department focuses on innovative teaching methods and cutting-edge research to prepare students for successful careers in the industry.</p>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>  
            </div>    
        </section> 
        <section class="section-2 with-bg  pb-60" id="feature">
            <div class="container">
                <div class="row align-items-center d-flex flex-wrap">
                    <div class="col-lg-4 flex-box p-2 red-bg-home">
                        <div class="section-body">
                            <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="500" style="animation-duration: 1000ms;">Our Mission</h3>
                            <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700" style="animation-duration: 1000ms;">
                                {!! $mission !!} 
                            </p>
                        </div>
                    </div>
                    <div class="flex-box col-lg-4 wow fadeInRight animated"  data-animation="fadeInRightShorter" data-delay="400" style="animation-duration: 1000ms;">
                        <figure>
                            <img src="{{ asset('uploads/web/mission.jpg') }}" alt="banner" width="332" height="350">
                        </figure>
                    </div>
                        <div class="flex-box col-lg-4 p-2 green-bg-home">
                            <div class="section-body">
                                <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="500" style="animation-duration: 1000ms;">Core Values</h3>
                                <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700" style="animation-duration: 1000ms;">
                                    {!! $coreValue !!} 
                                </p>
                            </div>
                    </div>
                    <div class="flex-box col-lg-4 wow fadeInRight animated"  data-animation="fadeInRightShorter" data-delay="400" style="animation-duration: 1000ms;">
                        <figure>
                            <img src="{{ asset('uploads/web/vision.jpg') }}" alt="banner" width="332" height="350">
                        </figure>
                    </div>
                        <div class="flex-box col-lg-4 p-2 organe-bg-home">
                            <div class="section-body p-2 ">
                                <h3 class="product-title mb-2 wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="500" style="animation-duration: 1000ms;">Our Vision</h3>
                                <p class="section-text wow animated fadeInLeft" data-animation="fadeInLeft" data-delay="700" style="animation-duration: 1000ms;">
                                    {!! $vision !!} 
                                </p>
                            </div>
                    </div>
                    <div class="flex-box col-lg-4 wow fadeInRight animated"  data-animation="fadeInRightShorter" data-delay="400" style="animation-duration: 1000ms;">
                        <figure>
                            <img src="{{ asset('uploads/web/values.jpg') }}" alt="banner" width="332" height="350">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
{{-- bg-parallax --}}
        @if(count($testimonials) > 0)
        <!-- testimonial-area -->
        <section class="testimonial-area pt-60 pb-115 p-relative fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-active wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            @foreach($testimonials as $testimonial)
                            <div class="single-testimonial text-center">
                                <div class="qt-img">
                                    <img src="{{ asset('web/img/testimonial/qt-icon.png') }}" alt="img">
                                </div>
                                <p>{!! $testimonial->description !!}</p>
                                <div class="testi-author">
                                    <img src="{{ asset('uploads/testimonial/'.$testimonial->attach) }}" alt="img">
                                </div>
                                <div class="ta-info">
                                    <h6>{{ $testimonial->name }}</h6>
                                    <span>{{ $testimonial->designation ?? '' }}</span>
                                </div>                                    
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->
        @endif
        <!--End course Detail -->
    </main>
    <!-- main-area-end -->

@endsection

@push('styles')
<style>
/* Department Page Specific Styles */



/* Department Content */
.project-detail {
    padding: 60px 0;
    background: #f8f9fa;
}

.project-detail h2 {
    color: #2c3e50;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 30px;
    position: relative;
}

.project-detail h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    border-radius: 2px;
}

.inner-column p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #495057;
    margin-bottom: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .project-detail h2 {
        font-size: 2rem;
    }
    
}

</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize slider animations
    const animationElements = document.querySelectorAll('[data-animation]');
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    animationElements.forEach(el => {
        observer.observe(el);
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endpush
