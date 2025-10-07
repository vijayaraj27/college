<!-- Department Navigation Sidebar -->
<aside class="col-lg-3 col-md-4">
    <div class="sidebar-nav sticky-top" style="top: 20px;">
        <x-web.quick-navigation 
            title="Quick Navigation"
            :items="[
                ['title' => 'About Us', 'url' => url('/department/' . $department->slug . '/about')],
                ['title' => 'Achievements', 'url' => url('/department/' . $department->slug . '/achievements')],
                ['title' => 'Activities', 'url' => url('/department/' . $department->slug . '/activities')],
                ['title' => 'Courses', 'url' => url('/department/' . $department->slug . '/courses')],
                ['title' => 'Events', 'url' => url('/department/' . $department->slug . '/events')],
                ['title' => 'Faculties', 'url' => url('/department/' . $department->slug . '/faculties')],
                ['title' => 'Infrastructures', 'url' => url('/department/' . $department->slug . '/infrastructures')],
                ['title' => 'Libraries', 'url' => url('/department/' . $department->slug . '/libraries')],
                ['title' => 'Magazines', 'url' => url('/department/' . $department->slug . '/magazines')],
                ['title' => 'Newsletters', 'url' => url('/department/' . $department->slug . '/newsletters')],
                ['title' => 'Placements', 'url' => url('/department/' . $department->slug . '/placements')],
                ['title' => 'Publications', 'url' => url('/department/' . $department->slug . '/publications')],
                ['title' => 'Research', 'url' => url('/department/' . $department->slug . '/research')],
                ['title' => 'Syllabus', 'url' => url('/department/' . $department->slug . '/syllabus')],
                ['title' => 'Videos', 'url' => url('/department/' . $department->slug . '/videos')]
            ]"
            class="sidebar-widget"
        />
    </div>
</aside>
