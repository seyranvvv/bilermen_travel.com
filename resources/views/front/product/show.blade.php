@extends('front.layouts.app')
@section('title'){{$product->getTitle()}} | @lang('transAdmin.products') | @lang('transFront.app-name')@endsection
@section('keywords')@lang('transAdmin.products')@endsection
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg"
             style="background-image: url({!! Request::root() !!}{!! Storage::disk('local')->url("shopBanner/image/".$shopBanner->getImage()) !!})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>@lang('transAdmin.products')</li>
                </ul>
                <h2 class="d-none">{{$product->getTitle()}}</h2>
            </div>
        </div>
    </section>


    <!--Product Details Start-->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__img">
                        <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("product/image/".$product->img) !!}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top pb-4">
                        <h3 class="product-details__title">{{$product->getTitle()}}{{-- <span>{{$product->price}} tmt</span>--}} </h3>
                    </div>
                    {{--<div class="product-details__reveiw">--}}
                        {{--@for($i=0; $i<$product->stars; $i++)--}}
                            {{--<i class="fa fa-star"></i>--}}
                        {{--@endfor--}}
{{--                        <span>2 Customer Reviews</span>--}}
                    {{--</div>--}}
                    <div class="product-details__content">
                        <p class="product-details__content-text1">{!! $product->getBody() !!}</p>
                        {{--<p class="product-details__content-text2">{!! $product->barcode !!} </p>--}}
                    </div>

{{--                    <div class="product-details__quantity">--}}
{{--                        <h3 class="product-details__quantity-title">Choose quantity</h3>--}}
{{--                        <div class="quantity-box">--}}
{{--                            <button type="button" class="sub"><i class="fa fa-minus"></i></button>--}}
{{--                            <input type="number" id="1" value="1" />--}}
{{--                            <button type="button" class="add"><i class="fa fa-plus"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="product-details__buttons">--}}
{{--                        <div class="product-details__buttons-1">--}}
{{--                            <a href="cart.html" class="thm-btn">Add to Cart</a>--}}
{{--                        </div>--}}
{{--                        <div class="product-details__buttons-2">--}}
{{--                            <a href="product-details.html" class="thm-btn">Add to Wishlist</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="product-details__social">--}}
{{--                        <div class="title">--}}
{{--                            <h3>@lang('transFront.share')</h3>--}}
{{--                        </div>--}}
{{--                        <div class="product-details__social-link">--}}
{{--                            <a href="#"><span class="fab fa-twitter"></span></a>--}}
{{--                            <a href="#"><span class="fab fa-facebook"></span></a>--}}
{{--                            <a href="#"><span class="fab fa-pinterest-p"></span></a>--}}
{{--                            <a href="#"><span class="fab fa-instagram"></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="pt-5 product__all">
                <div class="row">
                    <h2 class="py-3 text-center">@lang('transFront.other_products')</h2>
                @foreach($products as $product)
                    <!--Product All Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="product__all-single">
                                <div class="product__all-img">
                                    <img
                                            src="{!! Request::root() !!}{!! Storage::disk('local')->url("product/image/".$product->img) !!}"
                                            alt="">
                                    <div class="product__all-btn-box">
                                        <a href="{{route('front.product.show', $product->slug)}}"
                                           class="thm-btn product__all-btn">@lang('transFront.read_more')</a>
                                    </div>
                                </div>
                                <div class="product__all-content">
                                    <h4 class="product__all-title"><a
                                                href="{{route('front.product.show', $product->slug)}}">{{$product->getTitle()}}</a></h4>
                                    {{--<p class="product__all-price">{{$product->barcode}}</p>--}}
                                    {{--<div class="product__all-review">--}}
                                        {{--@for($i=0; $i<$product->stars; $i++)--}}
                                            {{--<i class="fa fa-star"></i>--}}
                                        {{--@endfor--}}

                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <!--Product All Single End-->
                    @endforeach
                </div>


            </div>

        </div>

    </section>
    <!--Product Details End-->

    <!--Product Description Start-->
    {{--<section class="product-description">--}}
        {{--<div class="container">--}}
            {{--<h3 class="product-description__title">@lang('transFront.description')</h3>--}}
            {{--{!! $product->getDescription() !!}--}}
        {{--</div>--}}
    {{--</section>--}}
    <!--Product Description End-->


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
