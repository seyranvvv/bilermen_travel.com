@extends('front.layouts.app')
@section('title')
    @lang('transAdmin.customers') | @lang('transFront.app-name')
@endsection
@section('keywords')
    @lang('transAdmin.customers')
@endsection
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({!! Request::root() !!}{!! Storage::disk('local')->url('postBanner/image/' . optional($customerBanner)->getImage()) !!})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>@lang('transAdmin.customers')</li>
                </ul>
                <h2>@lang('transAdmin.customers')</h2>
            </div>
        </div>
    </section>

    <!--Insurance Page One Start-->
    <section class="insurance-page-one">
        <div class="services-one__container">
            <div class="row">
                <!--Services One Single Start-->
                @foreach ($customers as $customer)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__single">
                            <div class="service-one__img">
                                <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('certificate/image/' . $customer->img) !!}" alt="">
                            </div>
                            <div class="service-one__content">

                                <h2 class="service-one__title">{{ $customer->getTitle() }}
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Insurance Page One End-->



    <!--Team Page Start-->
    {{-- <section class="team-page-carousel">
        <div class="container">
            <div class="thm-owl__carousel owl-theme owl-carousel team-carousel carousel-dot-style"
                data-owl-options='{
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
                                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('certificate/image/' . $certificate->img) !!}" alt="">
                                </div>

                            </div>
                            <div class="team-one__content">

                            </div>
                        </div>
                    </div>

                    <!--Team One Single End-->
                @endforeach

            </div>
        </div>
    </section> --}}
    <!--Team Page End-->




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
