@extends('front.layouts.app')
@section('title'){!! $brand->getName() !!} | @lang('transFront.app-name')@endsection
@section('keywords'){!! $brand->getName() !!}@endsection
@section('image'){!! asset('img/adt.jpg') !!}@endsection
@section('content')
    @component('front.app.breadcrumb')
        <li class="breadcrumb-item">
            @lang('transAdmin.brands')
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {!! $brand->getName() !!}
        </li>
    @endcomponent

    <div class="container py-sm-2 py-1">
        <div class="row">
            <div class="col-12 py-2">
                <div class="d-flex justify-content-between align-items-center text-primary border-bottom py-2">
                    <div class="h5 mb-0">
                        <span class="text-secondary">@lang('transAdmin.brand'):</span> {!! $brand->getName() !!}
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-pill dropdown-toggle" type="button"
                                id="dropdownProductOrder"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort"></i>
                            @switch($productOrder)
                                @case('arzandan-gymmada')
                                @lang('transFront.cheap-expensive')
                                @break
                                @case('gymmatdan-arzana')
                                @lang('transFront.expensive-cheap')
                                @break
                                @case('tazeden-kona')
                                @lang('transFront.new-old')
                                @break
                                @case('in-kop-satylanlar')
                                @lang('transFront.bestseller')
                                @break
                                @default
                                @lang('transFront.new-old')
                            @endswitch
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownProductOrder"
                             style="!important;min-width:auto;">
                            <a class="dropdown-item px-3"
                               href="{!! request()->fullUrlWithQuery(['tertip' => 'arzandan-gymmada', 'sahypa' => 1, 'uah' => null]) !!}"
                               title="@lang('transFront.cheap-expensive')">
                                @lang('transFront.cheap-expensive')</a>
                            <a class="dropdown-item px-3"
                               href="{!! request()->fullUrlWithQuery(['tertip' => 'gymmatdan-arzana', 'sahypa' => 1, 'uah' => null]) !!}"
                               title="@lang('transFront.expensive-cheap')">
                                @lang('transFront.expensive-cheap')</a>
                            <a class="dropdown-item px-3"
                               href="{!! request()->fullUrlWithQuery(['tertip' => 'tazeden-kona', 'sahypa' => 1, 'uah' => null]) !!}"
                               title="@lang('transFront.new-old')">
                                @lang('transFront.new-old')</a>
                            <a class="dropdown-item px-3"
                               href="{!! request()->fullUrlWithQuery(['tertip' => 'in-kop-satylanlar', 'sahypa' => 1, 'uah' => null]) !!}"
                               title="@lang('transFront.bestseller')">
                                @lang('transFront.bestseller')</a>
                        </div>
                    </div>
                </div>
                @if($products->count() > 0 or $filterOptions->count() > 0)
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                @include('front.app.filter')
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-8">
                                <div class="row">
                                    @forelse($products as $product)
                                        <div class="col-lg-3 col-md-4 col-6 mb-3">
                                            @include('front.app.single_product')
                                        </div>
                                    @empty
                                        <div class="col-12 mb-3">
                                            <i class="fas fa-exclamation-circle text-warning"></i>
                                            @lang('transAdmin.product') @lang('transAdmin.not-found')
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($products->hasPages())
                        <div class="d-flex justify-content-end" data-aos-once="true" data-aos="zoom-in-up">
                            {!! $products->appends(request()->except(['uah']))->links() !!}
                        </div>
                    @endif
                @else
                    <div class="my-3">
                        <i class="fas fa-exclamation-circle text-warning"></i>
                        @lang('transAdmin.product') @lang('transAdmin.not-found')
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection