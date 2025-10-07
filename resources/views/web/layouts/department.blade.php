@extends('web.layouts.master')

@section('title', $department->title . ' - ' . ucfirst($section))

@section('content')
<!-- Page Header -->
<x-web.breadcrumb 
    :title="$department->title . ' - ' . ucfirst($section)"
    :items="[
        ['title' => 'Home', 'url' => url('/')],
        ['title' => 'Departments', 'url' => url('/departments')],
        ['title' => $department->title, 'url' => url('/department/' . $department->slug)],
        ['title' => ucfirst($section), 'url' => null]
    ]"
    background="linear-gradient(135deg, #667eea 0%, #764ba2 100%)"
/>

<!-- Main Content with Sidebar -->
<section class="container-fluid project-detail">
    
        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
            @yield('main-content')
        </div>
        
        <!-- Right Sidebar Navigation -->
        @include('web.partials.department-navigation')
   
</section>

@endsection

@push('styles')
<style>
/* Custom CSS for Department Layout */

/* Gradient Backgrounds */
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

.animate-slide-up {
    animation: slideUp 0.6s ease-out;
}

.animate-zoom-in {
    animation: zoomIn 0.8s ease-out;
}

/* Sidebar Navigation Styling */
.sidebar-nav .card {
    border-radius: 15px;
    overflow: hidden;
}

.sidebar-nav .nav-link {
    color: #6c757d;
    padding: 12px 20px;
    border-bottom: 1px solid #f8f9fa;
    transition: all 0.3s ease;
    font-weight: 500;
}

.sidebar-nav .nav-link:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
    padding-left: 30px;
}

.sidebar-nav .nav-link.active {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
    border-left: 4px solid #667eea;
    font-weight: 600;
}

.sidebar-nav .nav-link:last-child {
    border-bottom: none;
}

.sidebar-nav .nav-link i {
    width: 20px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }
    
    .sidebar-nav {
        margin-top: 20px;
    }
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
});
</script>
@endpush
