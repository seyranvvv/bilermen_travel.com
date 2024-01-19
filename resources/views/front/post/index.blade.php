@extends('front.layouts.app')
@section('title')@lang('transAdmin.posts') | @lang('transFront.app-name')@endsection
@section('keywords')@lang('transAdmin.posts')@endsection
@section('content')


    <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({!! Request::root() !!}{!! Storage::disk('local')->url("postBanner/image/".$postBanner->getImage()) !!})">
            </div>
            <div class="page-header-shape-1"></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                        <li><span>/</span></li>
                        <li>@lang('transAdmin.posts')</li>
                    </ul>
                    <h2>@lang('transAdmin.posts')</h2>
                </div>
            </div>
        </section>


    <!--News One Start-->
    <section class="news-one">
        <div class="container">
            <div class="row">
                <!--News One Single Start-->
                @foreach($posts as $post)
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("post/image/".$post->img) !!}" alt="">
                           {{-- <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>--}}
                            <div class="news-one__arrow-box">
                                <a href="{!! route('front.post.singleNews', $post->slug) !!}" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="{!! route('front.post.singleNews', $post->slug) !!}"><i class="far fa-calendar"></i> {!! $post->publishedAt() !!}</a>
                                </li>
                               {{-- <li><a href="{!! route('front.post.singleNews', $post->slug) !!}"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>--}}
                            </ul>
                            <h3 class="news-one__title"><a href="{!! route('front.post.singleNews', $post->slug) !!}">{!! $post->getTitle() !!}</a></h3>
                            <p class="news-one__text">{!! str_limit(strip_tags(html_entity_decode($post->getBody())), 100) !!}</p>
                            <div class="news-one__read-more">
                                <a href="{!! route('front.post.singleNews', $post->slug) !!}">@lang('transFront.read_more') <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--News One End-->

    {{--<section class="tracking">
        <div class="container">
            <div class="tracking__inner">
                <div class="tracking-shape-1 float-bob-y">
                    <img src="{{ asset('front/assets/images/shapes/tracking-shape-1.png') }}" alt="">
                </div>
                <div class="tracking-shape-2 float-bob-x">
                    <img src="{{ asset('front/assets/images/shapes/tracking-shape-2.png') }}" alt="">
                </div>
                <div class="tracking-shape-3 float-bob-x">
                    <img src="{{ asset('front/assets/images/shapes/tracking-shape-3.png') }}" alt="">
                </div>
                <div class="tracking-shape-4 float-bob-y">
                    <img src="{{ asset('front/assets/images/shapes/tracking-shape-4.png') }}" alt="">
                </div>
                <div class="tracking__left">
                    <div class="tracking__icon">
                        <span class="icon-folder"></span>
                    </div>
                    <div class="tracking__content">
                        <p class="tracking__sub-title">{{ $contactWith->getTitle() }}</p>
                        <h3 class="tracking__title">{!! html_entity_decode($contactWith->getBody()) !!}</h3>
                    </div>
                </div>
                <div class="tracking__btn-box">
                    <a href="{{ route('front.contact') }}" class="thm-btn tracking__btn">@lang('transFront.contact')</a>
                </div>
            </div>
        </div>
    </section>--}}

@endsection