@extends('front.layouts.app')
@section('title') {{ $post->slug }} | @lang('transFront.app-name')@endsection
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


    <!--News Details Start-->
    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        <div class="news-details__img">
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("post/image/".$post->img) !!}" alt="">
                        </div>
                        <div class="news-details__content">
                            <ul class="list-unstyled news-details__meta">
                                <li><a href="#"><i class="far fa-calendar"></i> {!! $post->publishedAt() !!} </a>
                                </li>

                            </ul>
                            <h3 class="news-details__title">{!! $post->getTitle() !!}</h3>
                            {!! html_entity_decode($post->getBody()) !!}
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="@lang('transFront.search')">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">@lang('transFront.latest_post')</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach($posts as $post)
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("post/admin/".$post->img) !!}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                                <span class="sidebar__post-content-meta"><i
                                                            class="far fa-user-circle"></i> @lang('transFront.by_admin')</span>
                                            <a href="{!! route('front.post.singleNews', $post->slug) !!}">{!! $post->getTitle() !!}</a>
                                        </h3>
                                    </div>
                                </li>

                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--News Details End-->

   {{-- <section class="tracking">
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