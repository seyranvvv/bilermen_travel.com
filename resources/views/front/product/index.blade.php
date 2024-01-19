@extends('front.layouts.app')
@section('title')@lang('transAdmin.shop') | @lang('transFront.app-name')@endsection
@section('keywords')@lang('transAdmin.shop')@endsection
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
                    <li>@lang('transAdmin.shop')</li>
                </ul>
                <h2>{{request()->get('category') ? $products->first()->category->getName() : __('transAdmin.shop')}}</h2>
            </div>
        </div>
    </section>


    <!--News One Start-->
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="product__sidebar">
                        <div class="shop-search product__sidebar-single">
                            <form action="#">
                                <input type="text" placeholder="@lang('transFront.search_here')">
                            </form>
                        </div>

                        <div class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title">@lang('transFront.categories')</h3>
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                    <li class="{{request()->get('category') == $category->id  ? 'active' : ''}}"><a
                                                href="{{route('front.product.index', ['category' => $category->id])}}">{{$category->getName()}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">

                    <div class="product__all">
                        <div class="row">
                        @foreach($products as $product)
                            <!--Product All Single Start-->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="row pb-4">
                                        <div class="col-4">
                                            <div class="product__all-img">

                                                <img
                                                        src="{!! Request::root() !!}{!! Storage::disk('local')->url("product/image/".$product->img) !!}"
                                                        alt="">
                                                <div class="product__all-btn-box">
                                                    <a href="{{--{{route('front.product.show', $product->slug)}}--}}#"
                                                       class="thm-btn product__all-btn">@lang('transFront.read_more')</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="product__all-content">
                                                <h4 class="product__all-title pb-4"><a
                                                            href="{{--{{route('front.product.show', $product->slug)}}--}}#">{{$product->getTitle()}}</a>
                                                </h4>

                                                <div>
{!! $product->getBody() !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--Product All Single End-->
                            @endforeach
                        </div>
                        <div class="d-flex flex-row justify-content-center">
                            {{ $products->withQueryString()->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>    <!--News One End-->

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
