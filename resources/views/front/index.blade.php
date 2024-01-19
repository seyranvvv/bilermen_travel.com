@extends('front.layouts.app')
@section('title')
    @lang('transFront.home') | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transFront.home')
@endsection
@section('content')


    <!--Main Slider Start-->
    <section class="main-slider clearfix">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url({!! Storage::disk('local')->url($slider->getImage()) !!});"></div>
                        <!-- /.image-layer -->

                        <div class="main-slider-shape-1 float-bob-x">
                            <img src="{{ asset('front/assets/images/shapes/main-slider-shape-1.png') }}" alt="">
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
                                        <h2 class="main-slider__title">{{ $slider->getTitle() }}</h2>
                                        <p class="main-slider__text">{!! html_entity_decode($slider->getBody()) !!}</p>
                                        <div class="main-slider__btn-box">
                                            <a href="{{ $slider->url }}"
                                                class="thm-btn main-slider__btn">@lang('transFront.read_more')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- If we need navigation buttons -->
            <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-right-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-right-arrow1"></i>
                </div>
            </div>

        </div>
    </section>
    <!--Main Slider End-->

    <!--Feature One Start-->
    <section class="feature-one">
        <div class="container">
            <div class="feature-one__inner">
                <div class="row">
                    <!--Feature One Single Start-->
                    @foreach ($icons as $icon)
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                            <div class="feature-one__single">
                                <div class="feature-one__single-inner">
                                    <div class="feature-one__icon"><span>
                                            <img style="height: 65px"
                                                src="{{ Storage::disk('local')->url('icon/' . $icon->icon) }}"
                                                alt="{{ $icon->icon }}">
                                        </span>
                                    </div>
                                    <div class="feature-one__count"></div>
                                    <div class="feature-one__shape">

                                    </div>
                                    <h3 class="feature-one__title"><a
                                            href="{{ route('front.about.index') }}">{{ $icon->getText() }}</a></h3>
                                    <p class="feature-one__text">{{ $icon->getName() }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Feature One End-->


    <!--About One Start-->
    <section class="about-one">
        <a id="about" class="invisible" href="{{ route('front.about.index') }}"></a>
        <div class="about-one-bg wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-one__img">
                                <img src="{{ Storage::disk('local')->url($about->image_index) }}" alt="">
                            </div>
                            {{-- <div class="about-one__img-two">


                                <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('about/image/' . $about->img) !!}" alt="">
                            </div> --}}
                            <div class="about-one__experience">
                                {{-- <h2 class="about-one__experience-year">{{ $years_number->getName() }}</h2> --}}
                                <h4 class="text-white">{{ $years_text->getName() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title text-left ">
                            <div class="section-sub-title-box ms-0 ms-sm-5">
                                <p class="section-sub-title">{{ optional($projectName)->getName() }}</p>
                                <div class="section-title-shape-1 d-none d-sm-block">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2 d-none d-sm-block">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">{{ $about->getTitle() }}</h2>
                        </div>
                        <p class="about-one__text-1"> {!! html_entity_decode($about->getName()) !!}</p>

                        <div class="about-one__btn-call">
                            <div class="about-one__btn-box">
                                <a href="{{ route('front.about.index') }}"
                                    class="thm-btn about-one__btn">@lang('transFront.read_more')</a>
                            </div>
                            {{--                            <div class="about-one__call"> --}}
                            {{--                                <div class="about-one__call-icon"> --}}
                            {{--                                    <i class="fas fa-phone"></i> --}}
                            {{--                                </div> --}}
                            {{--                                <div class="about-one__call-content"> --}}
                            {{--                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a> --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End-->

    {{-- <!--Counter One Start--> --}}
    <Section class="counter-one">
        <div class="counter-one-shape-1 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/counter-one-shape-1.png') }}" alt="">
        </div>
        <div class="counter-one-shape-2 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/counter-one-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row overflow-hidden">
                <!--Counter One Single Start-->
                @foreach ($counters as $counter)
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <img src="{{ Storage::disk('local')->url('icon/' . $counter->icon) }}"
                                        alt="{{ $counter->icon }}" width="60px">
                                </div>
                                <div class="counter-one__count-box" style="overflow: hidden">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="{{ $counter->counter }}">00</h3>
                                        <span class="counter-one__plus">{{ $counter->after_text }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">{{ $counter->getText() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </Section>
    <!--Counter One End-->


    <!--Services One Start-->
    <section class="services-one">
        <div class="services-one__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="services-one__top-left">
                            <div class="section-title text-left">
                                <div class="section-sub-title-box">
                                    <p class="section-sub-title">@lang('transFront.our_services')</p>
                                    <div class="section-title-shape-1">
                                        <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                            alt="">
                                    </div>
                                    <div class="section-title-shape-2">
                                        <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                {{-- <h2 class="section-title__title">{{ $service_text_one->getName() }}</h2> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="services-one__top-right">
                            {{-- <p class="services-one__top-text">{{ $service_text_two->getName() }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-one__bottom">
            <div class="services-one__container">
                <div class="row">
                    @foreach ($services as $service)
                        <!--Services One Single Start-->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__single">
                                <div class="service-one__img">
                                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('service/image/' . $service->img) !!}" alt="">
                                </div>
                                <div class="service-one__content">
                                    <div class="services-one__icon">
                                        <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('service/image/' . $service->icon) !!}" alt=""
                                            width="50px">
                                    </div>
                                    <h2 class="service-one__title line-clamp-2"><a
                                            href="{!! route('front.service.service_single', $service->slug) !!}">{{ $service->getTitle() }}</a>
                                    </h2>
                                    <p class="service-one__text line-clamp-4">{!! str_limit(strip_tags(html_entity_decode($service->getName())), 100) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Services One End-->




    <!--Why Choose One Start-->
    <section class="why-choose-one">
        <div class="why-choose-one-shape-1"
            style="background-image: url({{ asset('front/assets/images/shapes/why-choose-one-shape-1.png') }});"></div>
        <div class="why-choose-one-shape-2 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-2.png') }}" alt="">
        </div>
        <div class="why-choose-one-shape-3 float-bob-x">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-3.png') }}" alt="">
        </div>
        <div class="why-choose-one-shape-4 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-4') }}')}}" alt="">
        </div>
        <div class="why-choose-one-shape-5 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-5.png') }}" alt="">
        </div>
        <div class="why-choose-one-shape-6 float-bob-x">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-6.png') }}" alt="">
        </div>
        <div class="why-choose-one-img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('why-choose-us/image/' . $whyChooseUs->img) !!}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="why-choose-one__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">{{ $whyChooseUs->getTitle() }}</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-3.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-4.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">{!! $whyChooseUs->getName() !!}</h2>
                        </div>
                        <p class="why-choose-one__text">{!! $whyChooseUs->getBody() !!}</p>
                        <div class="why-choose-one__list-box">
                            <ul class="list-unstyled why-choose-one__list" style="align-items: unset !important">
                                @foreach ($chooseIcons as $icon)
                                    <li>
                                        <div class="why-choose-one__single h-100">
                                            <div class="why-choose-one__list-icon">
                                                <img src="{{ Storage::disk('local')->url('icon/' . $icon->icon) }}"
                                                    alt="{{ $icon->icon }}" width="60px">
                                            </div>
                                            <div class="why-choose-one__list-title-box">
                                                <div class="why-choose-one__list-title-inner">
                                                    <h3 class="why-choose-one__list-title">{{ $icon->getName() }}</h3>
                                                </div>
                                                <div class="why-choose-one__list-text-box">
                                                    <p class="why-choose-one__list-text">{{ $icon->getText() }}</p>
                                                </div>
                                            </div>
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
    <!--Why Choose One End-->











    <!--Insurance Page Two Start-->
    @if ($vacancies->count() != 0)
        <section class="insurance-page-two">
            <div class="container">
                <div class="row">
                    <div class="section-title text-right">

                        <div class="section-sub-title-box">
                            <p class="section-sub-title">@lang('transFront.vacancies')</p>
                            <div class="section-title-shape-1">
                                <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                    alt="">
                            </div>
                            <div class="section-title-shape-2">
                                <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    @foreach ($vacancies as $vacancy)
                        <!--Services Two Single Start-->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('vacancy/image/' . $vacancy->img) !!}" alt=""
                                        style="width: 80px;">
                                </div>
                                <h3 class="services-two__title"><a href="#">{{ $vacancy->getTitle() }}</a></h3>
                                <p class="services-two__text">{!! html_entity_decode($vacancy->getName()) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--Insurance Page Two End-->





    <!--News One Start-->
    {{-- <section class="news-one">
        <div class="container">
            <div class="section-title text-center">
                <div class="section-sub-title-box">
                    <p class="section-sub-title">@lang('transAdmin.posts')</p>
                    <div class="section-title-shape-1">
                        <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" alt="">
                    </div>
                    <div class="section-title-shape-2">
                        <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" alt="">
                    </div>
                </div>
                <h2 class="section-title__title">{{ $index_post->getName() }}</h2>
            </div>
            <div class="row">
                <!--News One Single Start-->
                @foreach ($posts as $post)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('post/image/' . $post->img) !!}" alt="">
                 
                                <div class="news-one__arrow-box">
                                    <a href="{!! route('front.post.singleNews', $post->slug) !!}" class="news-one__arrow">
                                        <span class="icon-right-arrow1"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="{!! route('front.post.singleNews', $post->slug) !!}"><i class="far fa-calendar"></i>
                                            {!! $post->publishedAt() !!} </a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title"><a
                                        href="{!! route('front.post.singleNews', $post->slug) !!}">{!! $post->getTitle() !!}</a>
                                </h3>
                                <p class="news-one__text">{!! str_limit(strip_tags(html_entity_decode($post->getBody())), 100) !!}
                                    .</p>
                                <div class="news-one__read-more">
                                    <a href="{!! route('front.post.singleNews', $post->slug) !!}">@lang('transFront.read_more')
                                        <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!--News One End-->

    <!--Brand One Start-->
    {{-- <section class="brand-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="brand-one__title">
                        <h2>{{ $partnersText->getName() }}</h2>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="brand-one__main-content">
                        <div class="thm-swiper__slider swiper-container"
                            data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 2000 }, "breakpoints": {
                        "0": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "375": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "575": {
                            "spaceBetween": 30,
                            "slidesPerView": 3
                        },
                        "767": {
                            "spaceBetween": 50,
                            "slidesPerView": 4
                        },
                        "991": {
                            "spaceBetween": 50,
                            "slidesPerView": 5
                        },
                        "1199": {
                            "spaceBetween": 100,
                            "slidesPerView": 5
                        }
                    }}'>

                            <div class="swiper-wrapper">
                                @foreach ($greets as $greet)
                                    @if ($greet->type == 'bottom')
                                        <div class="swiper-slide">
                                            <img src="{!! Storage::disk('local')->url($greet->image) !!}" alt="">
                                        </div><!-- /.swiper-slide -->
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Brand One End-->

    <section class="tracking pt-5">
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
    </section>

@endsection
