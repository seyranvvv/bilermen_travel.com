@extends('front.layouts.app')
@section('title')ADT | @lang('transFront.app-name')@endsection
@section('keywords')@lang('transFront.home')@endsection
@section('image'){!! asset('img/adt.jpg') !!}@endsection
@section('content')

    <link href="{!! asset('css/swiper.min.css') !!}" rel="stylesheet">
    <script type="text/javascript" src="{!! asset('js/swiper.min.js') !!}"></script>

    @if($sliders->count() > 0)
        <div class="bg-light">
            <div class="container px-0">
                @include('front.home.sliders')
            </div>
        </div>
    @endif
    @include('front.home.categories')
@endsection
