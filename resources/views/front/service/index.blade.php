@extends('front.layouts.app')
@section('title')
    @lang('transFront.services') | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transFront.services')
@endsection
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({!! Request::root() !!}{!! Storage::disk('local')->url('serviceBanner/image/' . optional($serviceBanner)->getImage()) !!})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>@lang('transFront.services')</li>
                </ul>
                <h2>@lang('transFront.services')</h2>
            </div>
        </div>
    </section>


    <!--Insurance Page One Start-->
    <section class="insurance-page-one">
        <div class="services-one__container">
            <div class="row">
                <!--Services One Single Start-->
                @foreach ($services as $service)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__single">
                            <div class="service-one__img">
                                <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('service/image/' . $service->img) !!}" alt="">
                            </div>
                            <div class="service-one__content">
                                <div class="services-one__icon">
                                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('service/image/' . $service->icon) !!}" alt="" width="50px">
                                </div>
                                <h2 class="service-one__title line-clamp-2"><a
                                        href="{!! route('front.service.service_single', $service->slug) !!}">{{ $service->getTitle() }}</a>
                                </h2>
                                <p class="service-one__text line-clamp-4">{!! strip_tags(html_entity_decode($service->getName())) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Insurance Page One End-->


    {{-- <!--Benefits Two Start--> --}}
    {{-- <section class="benefits-two"> --}}
    {{-- <div class="container"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-xl-6 col-lg-6"> --}}
    {{-- <div class="benefits-two__left"> --}}
    {{-- <div class="benefits-two__img"> --}}
    {{-- <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("serviceAbout/image/".$serviceAbout->img) !!}" --}}
    {{-- alt=""> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="col-xl-6 col-lg-6"> --}}
    {{-- <div class="benefits-two__right"> --}}
    {{-- <div class="section-title text-left"> --}}
    {{-- <div class="section-sub-title-box"> --}}
    {{-- <p class="section-sub-title">@lang('transFront.our_services')</p> --}}
    {{-- <div class="section-title-shape-1"> --}}
    {{-- <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" --}}
    {{-- alt=""> --}}
    {{-- </div> --}}
    {{-- <div class="section-title-shape-2"> --}}
    {{-- <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" --}}
    {{-- alt=""> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <h2 class="section-title__title">{{ $serviceAbout->getTitle() }} --}}
    {{-- </h2> --}}
    {{-- </div> --}}
    {{-- <ul class="list-unstyled benefits-two__points"> --}}


    {{-- @foreach ($services as $service) --}}
    {{-- <li> --}}
    {{-- <div class="icon"> --}}
    {{-- <i class="fa fa-check"></i> --}}
    {{-- </div> --}}
    {{-- <div class="text"> --}}
    {{-- <p> --}}
    {{-- <a href="{!! route('front.service.service_single', $service->slug) !!}">{{ $service->getTitle() }}</a> --}}
    {{-- </p> --}}
    {{-- </div> --}}
    {{-- </li> --}}
    {{-- @endforeach --}}
    {{-- </ul> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </section> --}}
    {{-- <!--Benefits Two End--> --}}


    <!--Team Page Start-->
    {{-- <section class="team-page-carousel">
        <div class="container">
            <div class="thm-owl__carousel owl-theme owl-carousel team-carousel carousel-dot-style" data-owl-options='{
                    "items": 3,
                    "margin": 108,
                    "smartSpeed": 700,
                    "loop":true,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":true,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        }
                    }
                }'>
            @foreach ($certificates as $certificate)

                <!--Team One Single Start-->
                    <div class="item">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <div class="team-one__img-box ">
                                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("certificate/image/".$certificate->img) !!}"
                                         alt="">
                                </div>

                            </div>
                            <div class="team-one__content">

                            </div>
                        </div>
                    </div>

              Team One Single End-->
                @endforeach

            </div>
        </div>
    </section> --}}
    <!--Team Page End-->

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
    </section> --}}
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
