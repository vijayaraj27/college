<!-- Slider Component -->
<section id="home" class="slider-area fix p-relative {{ $class }}">
    <div class="slider-active" style="background: #141b22;">
        @if(count($sliders) > 0)
            @foreach($sliders as $slider)
            <div class="single-slider slider-bg" style="background-image: url({{ asset('uploads/slider/'.$slider->attach) }}); background-size: cover;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="slider-content s-slider-content mt-130">
                                <h2 data-animation="fadeInUp" data-delay=".4s">{{ $slider->title }}</h2>
                                <p data-animation="fadeInUp" data-delay=".6s">{!! strip_tags($slider->sub_title, '<b><u><i><br>') !!}</p>
                                @if(isset($slider->button_link))
                                <div class="slider-btn mt-30">     
                                    <a href="{{ $slider->button_link }}" target="_blank" class="btn ss-btn mr-15" data-animation="fadeInLeft" data-delay=".4s">{{ $slider->button_text }} <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 p-relative">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <!-- Default slider if no sliders available -->
            <div class="single-slider slider-bg" style="background-image: url({{ asset('web/img/hero-bg.jpg') }}); background-size: cover;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="slider-content s-slider-content mt-130">
                                <h2 data-animation="fadeInUp" data-delay=".4s">
                                    @if($department)
                                        {{ $department->title }}
                                    @else
                                        {{ $defaultTitle }}
                                    @endif
                                </h2>
                                <p data-animation="fadeInUp" data-delay=".6s">
                                    @if($department)
                                        Welcome to the Department of {{ $department->title }} - {{ $defaultSubtitle }}
                                    @else
                                        {{ $defaultSubtitle }}
                                    @endif
                                </p>
                                <div class="slider-btn mt-30">     
                                    <a href="{{ $defaultButtonLink }}" class="btn ss-btn mr-15" data-animation="fadeInLeft" data-delay=".4s">{{ $defaultButtonText }} <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 p-relative">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@push('styles')
<style>
/* Slider Component Styles */
.department-slider .slider-content h2 {
    font-size: 3.5rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.department-slider .slider-content p {
    font-size: 1.2rem;
    color: #fff;
    margin-bottom: 30px;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

/* Animation Enhancements */
.slider-content [data-animation] {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
}

.slider-content [data-animation].animated {
    opacity: 1;
    transform: translateY(0);
}

/* Overlay Enhancement */
.slider-bg .overlay {
    background: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.3) 100%);
}

/* Responsive Design */
@media (max-width: 768px) {
    .department-slider .slider-content h2 {
        font-size: 2.5rem;
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
});
</script>
@endpush
