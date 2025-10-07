<!-- Quick Navigation Component -->
@if(count($items) > 0)
<aside class="sidebar-widget info-column {{ $class }}">
    <div class="inner-column3">
        <h3>{{ $title }}</h3>
        <ul class="project-info clearfix">
            @foreach($items as $item)
            <li>
                <a href="{{ $item['url'] ?? '#' }}"> 
                    <strong>{{ $item['title'] }}</strong> 
                </a>                                        
            </li>
            @endforeach
        </ul>
    </div>
</aside>
@endif
