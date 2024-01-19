@extends('front.layouts.app')
@section('title'){!! $obj->getTitle() !!} | @lang('transFront.app-name')@endsection
@section('keywords'){!! $obj->getTitle() !!}@endsection
@section('image')@if($obj->image){!! Request::root() !!}{!! Storage::disk('local')->url($obj->image) !!}@else{!! asset('img/adt.jpg') !!}@endif
@endsection
@section('content')
    @component('front.app.breadcrumb')
        <li class="breadcrumb-item">
            @foreach($obj->categories as $category)
                <a href="{!! route('category', $category->slug) !!}" class="text-secondary" title="{!! $category->getName() !!}">
                    {!! $category->getName() !!}
                </a>
                {!! $loop->last ? '':',' !!}
            @endforeach
        </li>
        {{--<li class="breadcrumb-item active" aria-current="page">--}}
            {{--{!! $obj->getTitle() !!}--}}
        {{--</li>--}}
    @endcomponent

    <div class="container py-sm-2 py-1">
        <div class="row">
            <div class="col-lg-9 col-md-8 py-2">
                <div class="mb-3">
                    <div class="card shadow-sm single-video" data-aos-once="true" data-aos="fade-up">
                        @if($obj->image)
                            <a href="#play" title="{!! $obj->getTitle() !!}" class="afterglow d-flex align-items-center justify-content-center">
                                <img src="{!! asset('img/play-button.svg') !!}" alt="Play" class="play-button position-absolute w-25">
                                <img src="{!! asset('img/temp/video.png') !!}"
                                     data-src="{!! Storage::disk('local')->url($obj->image) !!}"
                                     alt="{{ $obj->getTitle() }}"
                                     class="load-image card-img-top">
                            </a>
                        @else
                            <a href="#v{!! $obj->slug !!}" title="{!! $obj->getTitle() !!}" class="d-flex align-items-center justify-content-center">
                                <img src="{!! asset('img/play-button.svg') !!}" alt="Play" class="play-button position-absolute">
                                <img src="{!! asset('img/temp/video.png') !!}"
                                     alt="{{ $obj->getTitle() }}"
                                     class="card-img-top">
                            </a>
                        @endif
                        <video id="play" width="856" height="480" preload="none"
                               class="d-none">
                            <source type="video/mp4" src="{!! Storage::disk('local')->url($obj->video) !!}"/>
                        </video>
                        <div class="card-body p-sm-3 p-2">
                            <div class="h5 text-dark">{!! $obj->getTitle() !!}</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{!! $obj->date_start->format('d.m.Y') !!}</span>
                                <span>
                                    <i class="fas fa-play-circle text-secondary fa-lg"></i> {!! $obj->viewed !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @if($videos->count() > 0)
                    <div class="pt-2">
                        <div class="h5 text-primary border-bottom py-2">
                            @lang('transFront.similar') <span class="text-lowercase">@lang('transAdmin.videos')</span>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                @foreach($videos as $video)
                                    <div class="col-lg-4 col-6 mb-3">
                                        @include('front.app.single_video')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-md-4 py-2">
                @include('front.app.sidebar')
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{!! asset('js/afterglow.min.js') !!}" defer></script>
@endsection