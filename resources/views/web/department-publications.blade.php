@extends('web.layouts.master')
@section('title', $department->title . ' - Publications')
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex p-relative align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Publications - {{$department->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrap2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('navbar_home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department') }}">{{ __('navbar_department') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('department.single', ['slug' => $department->slug]) }}">{{ $department->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Publications</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>  
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- Publications Detail -->
        <section class="project-detail">
            <div class="container">
                <div class="lower-content">
                    <div class="row">
                        <div class="text-column col-lg-9 col-md-9 col-sm-12">
                            <h2>{{$department->title}} - Publications</h2>
                            
                            @if(isset($data) && $data)
                                @if($data->title)
                                    <h3>{{ $data->title }}</h3>
                                @endif
                                
                                @if($data->description)
                                    <div class="inner-column">
                                        <p>{!! $data->description !!}</p>
                                    </div>
                                @endif
                                
                                @if($data->imageFile)
                                    <div class="upper-box">
                                        <figure class="image">
                                            <img src="{{ asset('uploads/publications/' . $data->imageFile) }}" alt="Publications" class="img-fluid">
                                        </figure>
                                    </div>
                                @endif
                                
                                @if($data->journalPublication)
                                    @php
                                        $journalPublications = $decodeJson($data->journalPublication);
                                    @endphp
                                    @if($journalPublications && is_array($journalPublications))
                                        <div class="inner-column">
                                            <h4>Journal Publications</h4>
                                            <div class="publications-list">
                                                @foreach($journalPublications as $publication)
                                                    @if(is_array($publication))
                                                        <div class="publication-item">
                                                            <h5>{{ $publication['title'] ?? '' }}</h5>
                                                            <p><strong>Authors:</strong> {{ $publication['authors'] ?? '' }}</p>
                                                            <p><strong>Journal:</strong> {{ $publication['journal'] ?? '' }}</p>
                                                            <p><strong>Year:</strong> {{ $publication['year'] ?? '' }}</p>
                                                            @if(isset($publication['doi']))
                                                                <p><strong>DOI:</strong> {{ $publication['doi'] ?? '' }}</p>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                
                                @if($data->conferenceList)
                                    @php
                                        $conferences = $decodeJson($data->conferenceList);
                                    @endphp
                                    @if($conferences && is_array($conferences))
                                        <div class="inner-column">
                                            <h4>Conference Publications</h4>
                                            <div class="conferences-list">
                                                @foreach($conferences as $conference)
                                                    @if(is_array($conference))
                                                        <div class="conference-item">
                                                            <h5>{{ $conference['title'] ?? '' }}</h5>
                                                            <p><strong>Authors:</strong> {{ $conference['authors'] ?? '' }}</p>
                                                            <p><strong>Conference:</strong> {{ $conference['conference'] ?? '' }}</p>
                                                            <p><strong>Year:</strong> {{ $conference['year'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                
                                @if($data->patent)
                                    @php
                                        $patents = $decodeJson($data->patent);
                                    @endphp
                                    @if($patents && is_array($patents))
                                        <div class="inner-column">
                                            <h4>Patents</h4>
                                            <div class="patents-list">
                                                @foreach($patents as $patent)
                                                    @if(is_array($patent))
                                                        <div class="patent-item">
                                                            <h5>{{ $patent['title'] ?? '' }}</h5>
                                                            <p><strong>Inventors:</strong> {{ $patent['inventors'] ?? '' }}</p>
                                                            <p><strong>Patent Number:</strong> {{ $patent['number'] ?? '' }}</p>
                                                            <p><strong>Year:</strong> {{ $patent['year'] ?? '' }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="inner-column">
                                    <p>Publications information for {{$department->title}} is being updated. Please check back later.</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            @include('web.components.department-sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End Publications Detail -->
    </main>
    <!-- main-area-end -->
@endsection
