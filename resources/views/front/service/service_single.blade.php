@extends('front.layouts.app')
@section('title')
    {{ $service->getTitle() }} | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transFront.services')
@endsection
@section('content')
    <!--Page Header Start-->

    <section class="page-header {{ $service->image_banner ? '' : 'py-3' }}">
        @if ($service->image_banner)
            <div class="page-header-bg"
                style="background-image: url({{ Storage::disk('local')->url('image_banner/image/' . $service->image_banner) }}">
            </div>
        @endif
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>@lang('transFront.services')</li>
                </ul>
                <h2>{{ $service->getTitle() }}</h2>
            </div>
        </div>
    </section>


    <!--Why Choose Two Start-->
    <section class="why-choose-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-two__left">
                        {{-- <div class="section-title text-left"> --}}
                        {{-- <div class="section-sub-title-box">
                                <p class="section-sub-title">@lang('transFront.services')</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                        alt="">
                                </div>
                            </div> --}}
                        {{-- <h2 class="section-title__title">{{ $service->getTitle() }}</h2> --}}
                        {{-- </div> --}}
                        <p class="why-choose-two__text"> {!! html_entity_decode($service->getName()) !!}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-two__right benefits-two__img">
                        <img src="{{ Storage::disk('local')->url($service->image_index) }}" alt="{{ $service->image_en }}">
                    </div>
                    <div class="benefits-two__right mt-5">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">Goşmaça</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">Hyzmatlar
                            </h2>
                        </div>
                        <ul class="list-unstyled benefits-two__points">
                            @foreach ($extras as $extra)
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>{{$extra}}</p>
                                        {{-- <p><a href="{!! route('front.service.service_single', $service->slug) !!}">{{ $service->getTitle() }}</a></p> --}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">

                </div>

            </div>
        </div>
    </section>
    <!--Why Choose Two End-->

     {{-- <!--Benefits Two Start-->
    <section class="benefits-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="benefits-two__left">
                        <div class="benefits-two__img">
                            <img src="{{ Storage::disk('local')->url($service->image_index) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="benefits-two__right">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">@lang('transFront.our_services')</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">{{ $serviceAbout->getTitle() }}
                            </h2>
                        </div>
                        <ul class="list-unstyled benefits-two__points">


                            @foreach ($services as $service)
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="{!! route('front.service.service_single', $service->slug) !!}">{{ $service->getTitle() }}</a></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Benefits Two End--> --}}


    <!--FAQ One Start-->
    <section class="faq-one">
        <div class="container">
            <div class="section-title text-center">
                <div class="section-sub-title-box">
                    <p class="section-sub-title">We always help</p>
                    <div class="section-title-shape-1">
                        <img src="assets/images/shapes/section-title-shape-1.png" alt="">
                    </div>
                    <div class="section-title-shape-2">
                        <img src="assets/images/shapes/section-title-shape-2.png" alt="">
                    </div>
                </div>
                <h2 class="section-title__title">Tur barada gündelik geçiriljek<br> çäreler</h2>
            </div>
            <div class="row">
                @foreach ($activitiesChunk as $activities)
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-one__single">
                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">
                                @foreach ($activities as $activity)
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4><span>?</span> {{$activity->title_tm}}</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>{!! $activity->description_tm  !!}</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--FAQ One End-->


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



    <section class="tracking">
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
