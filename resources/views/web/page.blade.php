@extends('web.layouts.master')
@section('title', $page->title)
@section('content')

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('{{ asset('uploads/about-us/psr-building-Photoroom.png') }}');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>{{ $page->title }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @php
                                    // Generate breadcrumb based on menu hierarchy
                                    $menuController = new \App\Http\Controllers\MenuController();
                                    $breadcrumbItems = $menuController->generateBreadcrumb($page->title, $page->slug);
                                @endphp
                                
                                @foreach($breadcrumbItems as $item)
                                    @if($item['active'])
                                        <li class="breadcrumb-item active" aria-current="page">{{ $item['title'] }}</li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></li>
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
                   
        @php
            // Check if this is IQAC page or IQAC sub-page
            $isIQACPage = ($page->slug === 'iqac' || strpos($page->slug, 'iqac-') === 0);
            $iqacSubPages = [
                ['title' => 'Introduction', 'url' => url('/iqac/introduction'), 'slug' => 'introduction'],
                ['title' => 'AQAR Reports', 'url' => url('/iqac/aqar-reports'), 'slug' => 'aqar-reports'],
                ['title' => 'Minutes / Action Taken', 'url' => url('/iqac/minutes-action-taken'), 'slug' => 'minutes-action-taken'],
                ['title' => 'Members', 'url' => url('/iqac/members'), 'slug' => 'members'],
                ['title' => 'Best Practices', 'url' => url('/iqac/best-practices'), 'slug' => 'best-practices'],
                ['title' => 'Distinctiveness', 'url' => url('/iqac/distinctiveness'), 'slug' => 'distinctiveness'],
                ['title' => 'Student Satisfaction Survey', 'url' => url('/iqac/student-satisfaction-survey'), 'slug' => 'student-satisfaction-survey']
            ];
        @endphp
        
        @if($isIQACPage)
        <!-- Quick Navigation for IQAC -->
        <section class="py-5 bg-white border-bottom my-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="d-flex flex-wrap listmargin clearfix">
                            @foreach($iqacSubPages as $subPage)
                            <li>
                                <a class="btn ss-btn mr-10" href="{{ $subPage['url'] }}"> 
                                    <strong>{{ $subPage['title'] }}</strong> 
                                </a>         
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @endif
                   
        <!-- Page Detail -->
        <section class="project-detail">
            <div class="container">
                <!-- Upper Box -->
                @if(is_file('uploads/page/'.$page->attach))
                <div class="upper-box">
                    <div class="single-item-carousel owl-carousel owl-theme">
                        <figure class="image"><img src="{{ asset('uploads/page/'.$page->attach) }}" alt="{{ $page->title }}"></figure>
                    </div>
                </div>
                @endif

                <!-- Lower Content -->
                <div class="lower-content2">
                    <div class="row">
                        <div class="text-column col-lg-12 col-md-12 col-sm-12">
                            <div class="s-about-content wow fadeInRight" data-animation="fadeInRight" data-delay=".2s">  

                                <!-- <h2>{{ $page->title }}</h2> -->
                                <p>{!! $page->description !!}</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End Page Detail -->
       
    </main>
    <!-- main-area-end -->


@endsection