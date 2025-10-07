<!-- Breadcrumb Component -->
<section class="breadcrumb-area d-flex p-relative align-items-center {{ $class }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    @if($title)
                    <div class="breadcrumb-title">
                        <h2>{{ $title }}</h2>
                    </div>
                    @endif
                </div>
            </div>
            @if(count($items) > 0)
            <div class="breadcrumb-wrap2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @foreach($items as $index => $item)
                            @if($index === count($items) - 1)
                                <!-- Last item (active) -->
                                <li class="breadcrumb-item active" aria-current="page">{{ $item['title'] }}</li>
                            @else
                                <!-- Regular items with links -->
                                <li class="breadcrumb-item"><a href="{{ $item['url'] ?? '#' }}">{{ $item['title'] }}</a></li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
            @endif
        </div>
    </div>  
</section>

@push('styles')
<style>
/* Breadcrumb Styling */
.breadcrumb-area {
    background: {{ $background }};
    color: white;
    padding: 40px 0;
}

.breadcrumb-title h2 {
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,0.7);
    content: "|";
}

.breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: white;
}

.breadcrumb-item.active {
    color: white;
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 768px) {
    .breadcrumb-title h2 {
        font-size: 2rem;
    }
}
</style>
@endpush
