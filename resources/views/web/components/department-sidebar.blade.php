{{-- 
    Department Details Sidebar Component
    
    This component creates a reusable sidebar for department pages.
    It displays navigation links for various department sections.
    
    Usage: @include('web.components.department-sidebar')

    Required variables:
    - $department: Department object with 'slug' property
    
    The component automatically generates links for:
    - Faculty, Infrastructure, Achievements, Placement, Video Materials,
      Course Materials, Events, Newsletter, Syllabus, Department Library,
      Research, Publications, Activities
--}}
@if(!empty($department->slug))
<aside class="sidebar-widget info-column">
    <div class="inner-column3">
        <h3>{{ __('Details') }}</h3>
        <ul class="project-info clearfix">
            <li class="{{ request()->routeIs('department.faculty') ? 'active' : '' }}">
                <a href="{{ route('department.faculty', ['slug' => $department->slug]) }}"> 
                    <strong>{{ __('field_faculty') }}</strong> 
                </a>                                        
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'infrastructures' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'infrastructures']) }}"> 
                    <strong>Infrastructure</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'achievements' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'achievements']) }}"> 
                    <strong>Achievements</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'placements' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'placements']) }}"> 
                    <strong>Placement</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'videos' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'videos']) }}"> 
                    <strong>Video Materials</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'magazines' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'magazines']) }}"> 
                    <strong>Course Materials</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'events' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'events']) }}"> 
                    <strong>Events</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'newsletters' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'newsletters']) }}"> 
                    <strong>Newsletter</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'syllabus' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'syllabus']) }}"> 
                    <strong>Syllabus</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'libraries' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'libraries']) }}"> 
                    <strong>Department Library</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'research' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'research']) }}"> 
                    <strong>Research</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'publications' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'publications']) }}"> 
                    <strong>Publications</strong> 
                </a>
            </li>
            <li class="{{ request()->routeIs('department.section') && request()->route('section') == 'activities' ? 'active' : '' }}">
                <a href="{{ route('department.section', ['slug' => $department->slug, 'section' => 'activities']) }}"> 
                    <strong>Activities</strong> 
                </a>
            </li>
        </ul>
    </div>
</aside>
@endif
