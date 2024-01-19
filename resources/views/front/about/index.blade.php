@extends('front.layouts.app')
@section('title')
    @lang('transFront.' . $about->type) | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transFront.' . $about->type)
@endsection
@section('content')
    <style>
        * {
            text-indent: unset !important;
        }
    </style>

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({!! Request::root() !!}{!! Storage::disk('local')->url('aboutBanner/image/' . optional($aboutBanner)->getImage()) !!})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>@lang('transFront.' . $about->type)</li>
                </ul>
                <h2>@lang('transFront.' . $about->type)</h2>
            </div>
        </div>
    </section>





    <!--About Four Start-->
    <section class="about-four">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-four__left">
                        <div class="about-four__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-four__img">
                                <img src="{{ Storage::disk('local')->url('about_banner/image/' . $about->image_banner) }}"
                                    alt="">
                            </div>
                            {{-- <div class="about-four__img-two">
                                <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("about/image/".$about->icon) !!}" alt="">
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-four__right">
                        <div class="section-title text-left">
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
                            {{-- <h2 class="section-title__title">{{ $about->getTitle() }}</h2> --}}
                        </div>
                        {!! html_entity_decode($about->getName()) !!}

                    </div>
                </div>
                <div class="col-xl-12 mt-5">
                    <p>{!! html_entity_decode($about->getBody()) !!} </p>
                </div>
            </div>
        </div>
    </section>
    <!--About Four End-->

    <Section class="counter-one">
        <div class="counter-one-shape-1 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/counter-one-shape-1.png') }}" alt="">
        </div>
        <div class="counter-one-shape-2 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/counter-one-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
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

    {{-- @if (\Request::route()->getName() == 'front.about.index')
    <section id="ft-about-2" class="ft-about-section-2">
        <div class="container">
            <div class="ft-about-content-2">
                <div class="row mb-5">
                    @php($i=0)
                    @foreach ($tehnologies as $tehnology)
                        @php($i++)

                        @if ($i % 2 != 0)

                            <div class="col-lg-6 mt-5">
                                <div class="ft-about-text-wrapper-2">
                                    <div class="ft-section-title-2 headline pera-content">
                                        <h2 class="section-title__title my-5">{{ $tehnology->getTitle() }}</h2>
                                        <p>{!! html_entity_decode($tehnology->getName()) !!} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-5">
                                <div class="ft-about-img-2-wrapper position-relative">
                                    <div class="ft-about-img-2 ">
                                        <img style="    border-radius: var(--insur-bdr-radius);" src="{!! Request::root() !!}{!! Storage::disk('local')->url("tehnology/image/".$tehnology->img) !!}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-5">
                                <p>{!! html_entity_decode($tehnology->getBody()) !!} </p>
                            </div>
                        @else
                            <div class="col-lg-6 mt-5">
                                <div class="ft-about-img-2-wrapper position-relative">
                                    <div class="ft-about-img-2">
                                        <img style="    border-radius: var(--insur-bdr-radius);" src="{!! Request::root() !!}{!! Storage::disk('local')->url("tehnology/image/".$tehnology->img) !!}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  mt-5">
                                <div class="ft-about-text-wrapper-2">
                                    <div class="ft-section-title-2 headline pera-content">
                                        <h2 class="section-title__title my-5">{{ $tehnology->getTitle() }}</h2>
                                        <p>{!! html_entity_decode($tehnology->getName()) !!} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-5">
                                <p>{!! html_entity_decode($tehnology->getBody()) !!} </p>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endif --}}

    <!--Team Page Start-->

    <!--Team Page End-->

    {{-- @if (\Request::route()->getName() == 'front.about.index')

    <!--Brand One Start-->
    <section class="brand-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="brand-one__title">
                        <h2>{{ $partnersText->getName() }}</h2>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="brand-one__main-content">
                        <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 2000 }, "breakpoints": {
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
                                <div class="swiper-slide">
                                    <img src="{!! Storage::disk('local')->url($greet->image) !!}" alt="">
                                </div><!-- /.swiper-slide -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Brand One End-->
@endif --}}




    <!--Portfolio Carousel Page Start-->

    <!--Portfolio Carousel Page End-->


    <!--CTA One Start-->
    {{-- <section class="cta-one cta-four">
        <div class="cta-four-shape-1 float-bob-x">
            <img src="{{ asset('front/assets/images/shapes/cta-four-shape-1.png') }}" alt="">
        </div>
        <div class="container">
            <div class="cta-one__content">
                <div class="cta-one__inner">

                    <div class="row">
                        @foreach ($districts as $district)
                            <div class="col-md-4 pb-3">
                                <div class="cta-one__right">
                                    <div class="cta-one__call">
                                        <div class="cta-one__call-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="cta-one__call-number">
                                            <p>{{ $district->getName() }}</p>

                                            <a href="tel:{{ $district->phone }}">{{ $district->phone }}</a>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                        @endforeach
                    </div>









                </div>
            </div>
        </div>
    </section> --}}
    <!--CTA One End-->



    {{-- <!--Counter One Start--> --}}
@endsection
