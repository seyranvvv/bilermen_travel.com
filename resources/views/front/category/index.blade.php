@extends('front.layouts.app')
@section('title'){!! $category->getName() !!} | @lang('transFront.app-name')@endsection
@section('keywords'){!! $category->getName() !!}@endsection
@section('image'){!! asset('img/adt.jpg') !!}@endsection
@section('content')
    @component('front.app.breadcrumb')
        @if($category->parent)
        <li class="breadcrumb-item">
            <a href="{!! route('category', $category->parent->slug) !!}" class="text-secondary"
               title="{!! $category->parent->getName() !!}">
                {!! $category->parent->getName() !!}
            </a>
        </li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">
            {!! $category->getName() !!}
        </li>
    @endcomponent

    <div class="container py-sm-2 py-1">
        @switch($category->type)
            @case(0)
            @include('front.category.parent')
            @break
            @case(1)
            @include('front.category.product')
            @break
            @case(2)
            @include('front.category.post')
            @break
            @case(3)
            @include('front.category.page')
            @break
            @case(4)
            @include('front.category.video')
            @break
            @default
        @endswitch
    </div>
@endsection