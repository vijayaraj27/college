@extends('web.layouts.master')

@section('title', $department->title . ' - About Us')

@section('content')
<!-- Page Header -->
<section class="page-header bg-gradient-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/departments') }}" class="text-white-50">Departments</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ $department->title }}</li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold mb-3 animate-fade-in">{{ $department->title }} - About Us</h1>
                <p class="lead animate-slide-up">Excellence in Engineering Education and Research</p>
            </div>
            <div class="col-lg-4 text-end">
                <div class="department-logo animate-zoom-in">
                    <i class="fas fa-graduation-cap fa-5x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Navigation -->
<section class="py-3 bg-white border-bottom sticky-top" style="top: 0; z-index: 1000;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="quick-nav">
                    <ul class="nav nav-pills justify-content-center flex-wrap">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/about') }}">
                                <i class="fas fa-info-circle me-2"></i>About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/achievements') }}">
                                <i class="fas fa-trophy me-2"></i>Achievements
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/activities') }}">
                                <i class="fas fa-calendar-check me-2"></i>Activities
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/courses') }}">
                                <i class="fas fa-book-open me-2"></i>Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/events') }}">
                                <i class="fas fa-calendar-alt me-2"></i>Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/faculties') }}">
                                <i class="fas fa-users me-2"></i>Faculties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/infrastructures') }}">
                                <i class="fas fa-building me-2"></i>Infrastructures
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/libraries') }}">
                                <i class="fas fa-book me-2"></i>Libraries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/magazines') }}">
                                <i class="fas fa-newspaper me-2"></i>Magazines
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/newsletters') }}">
                                <i class="fas fa-envelope me-2"></i>Newsletters
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/placements') }}">
                                <i class="fas fa-briefcase me-2"></i>Placements
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/publications') }}">
                                <i class="fas fa-file-alt me-2"></i>Publications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/research') }}">
                                <i class="fas fa-microscope me-2"></i>Research
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/syllabus') }}">
                                <i class="fas fa-graduation-cap me-2"></i>Syllabus
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/department/' . $department->slug . '/videos') }}">
                                <i class="fas fa-video me-2"></i>Videos
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Department About Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <!-- Department Images -->
            @if(!empty($departmentSectionImage) && is_array($departmentSectionImage))
            <div class="col-lg-6">
                <div class="department-images">
                    @foreach($departmentSectionImage as $index => $image)
                        @if(!empty($image['image_file']))
                        <div class="image-item mb-4 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s;">
                            <div class="position-relative overflow-hidden rounded-3 shadow-lg">
                                <img src="{{ asset('uploads/department/' . $image['image_file']) }}" 
                                     alt="{{ $image['title'] ?? 'Department Image' }}" 
                                     class="img-fluid w-100 h-auto department-image">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark opacity-0 image-overlay"></div>
                            </div>
                            @if(!empty($image['title']))
                            <div class="image-caption mt-3">
                                <h5 class="fw-bold text-dark">{{ $image['title'] }}</h5>
                            </div>
                            @endif
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Department Information -->
            <div class="col-lg-6">
                <div class="department-info animate-fade-in-right">
                    @if(!empty($sectionAbout) && is_array($sectionAbout))
                        @if(!empty($sectionAbout['title']))
                        <h2 class="section-title fw-bold text-primary mb-4">
                            <i class="fas fa-university me-3"></i>{{ $sectionAbout['title'] }}
                        </h2>
                        @endif
                        
                        @if(!empty($sectionAbout['description']))
                        <div class="department-description mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    {!! $sectionAbout['description'] !!}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif

                    <!-- Vision -->
                    @if(!empty($vision))
                    <div class="vision-mission mb-4 animate-slide-up">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h4 class="sub-title fw-bold text-primary mb-3">
                                    <i class="fas fa-eye me-2"></i> Vision
                                </h4>
                                <p class="text-muted lh-lg">{!! $vision !!}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Mission -->
                    @if(!empty($mission))
                    <div class="vision-mission mb-4 animate-slide-up">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h4 class="sub-title fw-bold text-primary mb-3">
                                    <i class="fas fa-bullseye me-2"></i> Mission
                                </h4>
                                <p class="text-muted lh-lg">{!! $mission !!}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Core Values -->
                    @if(!empty($coreValue))
                    <div class="vision-mission mb-4 animate-slide-up">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h4 class="sub-title fw-bold text-primary mb-3">
                                    <i class="fas fa-heart me-2"></i> Core Values
                                </h4>
                                <p class="text-muted lh-lg">{!! $coreValue !!}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Programme Educational Objectives -->
        @if(!empty($programmeEducationalObjectives) && is_array($programmeEducationalObjectives))
        <div class="row mt-5">
            <div class="col-12">
                <div class="programme-objectives">
                    <div class="text-center mb-5">
                        <h3 class="section-title fw-bold text-primary mb-3 animate-fade-in">
                            <i class="fas fa-graduation-cap me-3"></i> Programme Educational Objectives
                        </h3>
                        <div class="title-underline mx-auto"></div>
                    </div>
                    <div class="row g-4">
                        @foreach($programmeEducationalObjectives as $index => $objective)
                        <div class="col-lg-6">
                            <div class="objective-item p-4 border-0 rounded-3 shadow-sm h-100 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="d-flex align-items-start">
                                    <div class="objective-number me-3">
                                        <span class="badge bg-primary rounded-circle p-3 fw-bold">{{ $index + 1 }}</span>
                                    </div>
                                    <div class="objective-content">
                                        <h5 class="objective-title fw-bold text-dark mb-3">
                                            {{ $objective['title'] ?? 'Objective ' . ($index + 1) }}
                                        </h5>
                                        @if(!empty($objective['description']))
                                        <p class="objective-description text-muted lh-lg mb-0">{{ $objective['description'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Programme Outcomes -->
        @if(!empty($programmeOutcomes) && is_array($programmeOutcomes))
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="programme-outcomes">
                    <h3 class="section-title text-center mb-4">
                        <i class="fa fa-trophy text-primary"></i> Programme Outcomes
                    </h3>
                    <div class="row">
                        @foreach($programmeOutcomes as $index => $outcome)
                        <div class="col-md-6 mb-3">
                            <div class="outcome-item p-3 border rounded">
                                <h5 class="outcome-title">
                                    <span class="badge badge-success">{{ $index + 1 }}</span>
                                    {{ $outcome['title'] ?? 'Outcome ' . ($index + 1) }}
                                </h5>
                                @if(!empty($outcome['description']))
                                <p class="outcome-description">{{ $outcome['description'] }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Programme Specific Outcomes -->
        @if(!empty($programmeSpecificOutcomes) && is_array($programmeSpecificOutcomes))
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="programme-specific-outcomes">
                    <h3 class="section-title text-center mb-4">
                        <i class="fa fa-cogs text-primary"></i> Programme Specific Outcomes
                    </h3>
                    <div class="row">
                        @foreach($programmeSpecificOutcomes as $index => $outcome)
                        <div class="col-md-6 mb-3">
                            <div class="specific-outcome-item p-3 border rounded">
                                <h5 class="specific-outcome-title">
                                    <span class="badge badge-info">{{ $index + 1 }}</span>
                                    {{ $outcome['title'] ?? 'Specific Outcome ' . ($index + 1) }}
                                </h5>
                                @if(!empty($outcome['description']))
                                <p class="specific-outcome-description">{{ $outcome['description'] }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Contact Information -->
        @if(!empty($contact) && is_array($contact))
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="contact-info">
                    <h3 class="section-title text-center mb-4">
                        <i class="fa fa-phone text-primary"></i> Contact Information
                    </h3>
                    <div class="row">
                        @if(!empty($contact['phone']))
                        <div class="col-md-4 mb-3">
                            <div class="contact-item text-center p-3 border rounded">
                                <i class="fa fa-phone fa-2x text-primary mb-2"></i>
                                <h5>Phone</h5>
                                <p>{{ $contact['phone'] }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if(!empty($contact['email']))
                        <div class="col-md-4 mb-3">
                            <div class="contact-item text-center p-3 border rounded">
                                <i class="fa fa-envelope fa-2x text-primary mb-2"></i>
                                <h5>Email</h5>
                                <p>{{ $contact['email'] }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if(!empty($contact['address']))
                        <div class="col-md-4 mb-3">
                            <div class="contact-item text-center p-3 border rounded">
                                <i class="fa fa-map-marker fa-2x text-primary mb-2"></i>
                                <h5>Address</h5>
                                <p>{{ $contact['address'] }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Testimonials Section -->
@if(!empty($testimonials) && $testimonials->count() > 0)
<section class="testimonials-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title text-center mb-4">
                    <i class="fa fa-quote-left text-primary"></i> Testimonials
                </h3>
                <div class="testimonials-slider">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-item text-center p-4">
                        <div class="testimonial-content">
                            <p class="testimonial-text">"{!! $testimonial->description !!}"</p>
                            <div class="testimonial-author">
                                <h5>{{ $testimonial->name }}</h5>
                                <span class="author-designation">{{ $testimonial->designation }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@push('styles')
<style>
/* Custom CSS for Engineering College Professional Design */

/* Gradient Backgrounds */
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-dark {
    background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from { 
        opacity: 0; 
        transform: translateY(30px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

@keyframes fadeInRight {
    from { 
        opacity: 0; 
        transform: translateX(30px); 
    }
    to { 
        opacity: 1; 
        transform: translateX(0); 
    }
}

@keyframes slideUp {
    from { 
        opacity: 0; 
        transform: translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

@keyframes zoomIn {
    from { 
        opacity: 0; 
        transform: scale(0.8); 
    }
    to { 
        opacity: 1; 
        transform: scale(1); 
    }
}

.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

.animate-fade-in-right {
    animation: fadeInRight 0.8s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.6s ease-out;
}

.animate-zoom-in {
    animation: zoomIn 0.8s ease-out;
}

/* Section Styling */
.section-title {
    position: relative;
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 30px;
}

.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    border-radius: 2px;
    margin-top: 10px;
}

/* Department Images */
.department-image {
    transition: all 0.4s ease;
    height: 300px;
    object-fit: cover;
}

.image-overlay {
    transition: all 0.3s ease;
}

.image-item:hover .department-image {
    transform: scale(1.05);
}

.image-item:hover .image-overlay {
    opacity: 0.3 !important;
}

/* Cards and Items */
.objective-item, .outcome-item, .specific-outcome-item {
    background: #fff;
    transition: all 0.3s ease;
    border-left: 4px solid #667eea;
}

.objective-item:hover, .outcome-item:hover, .specific-outcome-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    border-left-color: #764ba2;
}

.contact-item {
    background: #fff;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.contact-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    border-color: #667eea;
}

/* Testimonials */
.testimonials-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.testimonial-item {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.testimonial-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
}

.testimonial-text {
    font-style: italic;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 20px;
    color: #495057;
}

.author-designation {
    color: #6c757d;
    font-size: 14px;
    font-weight: 500;
}

/* Badge Styling */
.badge {
    font-size: 14px;
    padding: 8px 16px;
    border-radius: 20px;
}

/* Loading Animation */
#page-loader {
    transition: opacity 0.5s ease-out;
}

/* Responsive Design */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }
    
    .department-image {
        height: 250px;
    }
    
    .animate-fade-in-up {
        animation-delay: 0s !important;
    }
}

/* Quick Navigation Styling */
.quick-nav {
    background: #fff;
    border-radius: 10px;
    padding: 15px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.quick-nav .nav-pills .nav-link {
    color: #6c757d;
    font-weight: 500;
    padding: 10px 20px;
    margin: 5px;
    border-radius: 25px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    font-size: 14px;
}

.quick-nav .nav-pills .nav-link:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
    border-color: rgba(102, 126, 234, 0.2);
    transform: translateY(-2px);
}

.quick-nav .nav-pills .nav-link.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: transparent;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.quick-nav .nav-pills .nav-link i {
    font-size: 14px;
}

/* Professional Engineering Theme Colors */
:root {
    --primary-color: #667eea;
    --secondary-color: #764ba2;
    --accent-color: #f093fb;
    --text-dark: #2c3e50;
    --text-muted: #6c757d;
    --bg-light: #f8f9fa;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add intersection observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('.animate-fade-in-up').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        observer.observe(el);
    });

    // Smooth scroll for internal links
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

    // Add hover effects to cards
    document.querySelectorAll('.objective-item, .outcome-item, .specific-outcome-item, .contact-item').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush
