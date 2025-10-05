<!-- Department Navigation Sidebar -->
<aside class="col-lg-3 col-md-4">
    <div class="sidebar-nav sticky-top" style="top: 20px;">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-bars me-2"></i>Quick Navigation
                </h5>
            </div>
            <div class="card-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ Request::is('department/*/about') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/about') }}">
                        <i class="fas fa-info-circle me-2"></i>About Us
                    </a>
                    <a class="nav-link {{ Request::is('department/*/achievements') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/achievements') }}">
                        <i class="fas fa-trophy me-2"></i>Achievements
                    </a>
                    <a class="nav-link {{ Request::is('department/*/activities') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/activities') }}">
                        <i class="fas fa-calendar-check me-2"></i>Activities
                    </a>
                    <a class="nav-link {{ Request::is('department/*/courses') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/courses') }}">
                        <i class="fas fa-book-open me-2"></i>Courses
                    </a>
                    <a class="nav-link {{ Request::is('department/*/events') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/events') }}">
                        <i class="fas fa-calendar-alt me-2"></i>Events
                    </a>
                    <a class="nav-link {{ Request::is('department/*/faculties') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/faculties') }}">
                        <i class="fas fa-users me-2"></i>Faculties
                    </a>
                    <a class="nav-link {{ Request::is('department/*/infrastructures') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/infrastructures') }}">
                        <i class="fas fa-building me-2"></i>Infrastructures
                    </a>
                    <a class="nav-link {{ Request::is('department/*/libraries') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/libraries') }}">
                        <i class="fas fa-book me-2"></i>Libraries
                    </a>
                    <a class="nav-link {{ Request::is('department/*/magazines') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/magazines') }}">
                        <i class="fas fa-newspaper me-2"></i>Magazines
                    </a>
                    <a class="nav-link {{ Request::is('department/*/newsletters') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/newsletters') }}">
                        <i class="fas fa-envelope me-2"></i>Newsletters
                    </a>
                    <a class="nav-link {{ Request::is('department/*/placements') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/placements') }}">
                        <i class="fas fa-briefcase me-2"></i>Placements
                    </a>
                    <a class="nav-link {{ Request::is('department/*/publications') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/publications') }}">
                        <i class="fas fa-file-alt me-2"></i>Publications
                    </a>
                    <a class="nav-link {{ Request::is('department/*/research') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/research') }}">
                        <i class="fas fa-microscope me-2"></i>Research
                    </a>
                    <a class="nav-link {{ Request::is('department/*/syllabus') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/syllabus') }}">
                        <i class="fas fa-graduation-cap me-2"></i>Syllabus
                    </a>
                    <a class="nav-link {{ Request::is('department/*/videos') ? 'active' : '' }}" href="{{ url('/department/' . $department->slug . '/videos') }}">
                        <i class="fas fa-video me-2"></i>Videos
                    </a>
                </nav>
            </div>
        </div>
    </div>
</aside>
