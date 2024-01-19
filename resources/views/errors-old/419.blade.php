@extends('errors.layouts.app')
@section('title')419 @endsection
@section('content')
    <div class="container">
        <div class="row vh-100 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-sm-6 col-10 text-center">
                <div class="py-4">
                    <img src="{{ asset('img/adt-white.svg') }}" alt="@lang('transFront.app-name')"
                         class="img-fluid w-50 my-2">
                    <div class="text-white display-4">
                        @lang('transFront.error')
                    </div>
                    <div class="text-white display-1">
                        419
                    </div>
                    <div class="font-weight-bold text-light my-2">
                        @lang('transFront.error-419')
                    </div>
                    <a href="{{ route('home') }}" class="text-light h5">
                        <i class="fas fa-reply"></i> @lang('transFront.home')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
