<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | @lang('transFront.app-name')</title>

    <!-- favicon.ico -->
    <link rel="icon" href="{{ asset('front/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{!! asset('admin/css/sb-admin-2.css') !!}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.solid.min.css') }}" rel="stylesheet">

    <style>
        .custom-file-label::after {
            content: "@lang('transAdmin.choose-file')";
        }
        .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "@lang('transAdmin.choose-file')";
        }
    </style>

    <!-- Scripts -->
    <script type="text/javascript" src="{!! asset('admin/js/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/bootstrap.bundle.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/jquery.easing.min.js') !!}"></script>
</head>
<body id="page-top">
@include('partials.loading')
@include('partials.alert')

<div id="wrapper">
    @include('admin.layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layouts.nav')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Scripts -->
<script type="text/javascript" src="{!! asset('admin/js/sb-admin-2.min.js') !!}"></script>
</body>
</html>