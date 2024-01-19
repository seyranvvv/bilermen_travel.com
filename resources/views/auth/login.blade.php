<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('transFront.app-name')</title>

    <!-- favicon.ico -->
    <link rel="icon" href="{{ asset('front/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{!! asset('admin/css/sb-admin-2.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/fontawesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/fontawesome.solid.min.css') !!}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{!! asset('admin/js/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/bootstrap.bundle.min.js') !!}"></script>
</head>
<body class="bg-gradient-primary">
@include('partials.alert')
@include('partials.loading')
<div class="container">
    <div class="row vh-100 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-7 col-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-sm-5 p-4">
                    <div class="text-center mb-3">

                        @if(\Request::route()->getName() == 'front.about.travel')
                            <img src="{{ asset('front/logo-travel.png') }}" alt=""
                                 class="img-fluid w-50 mb-3">
                        @elseif(\Request::route()->getName() == 'front.about.logistics')
                            <img src="{{ asset('front/logo-logistics.png') }}"
                                                                  alt=""
                                 class="img-fluid w-50 mb-3">
                        @elseif(\Request::route()->getName() == 'front.service.index' || \Request::route()->getName() == 'front.service.service_single' )
                            <img src="{{ asset('front/logo-it.png') }}"
                                                                  alt=""
                                 class="img-fluid w-50 mb-3">
                        @elseif(\Request::route()->getName() == 'front.about.advertisement')
                            <img src="{{ asset('front/logo-advertisement.png') }}"
                                                                  alt=""
                                 class="img-fluid w-50 mb-3">
                        @else
                            <img src="{{ asset('front/logo.png') }}" alt=""
                                 class="img-fluid w-50 mb-3">
                        @endif



                        {{--   <div class="h5 font-weight-bold">Ak kent</div>--}}
                    </div>
                    <form method="POST" action="{{route('login')}}" class="user" id="login-form">
                        @csrf
                        <div class="form-label-group">
                            <input type="text" id="username"
                                   class="form-control form-control-user{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                   value="{{ old('username') }}" name="username"
                                   placeholder="@lang('transFront.username')" required autofocus>
                            <label for="username">@lang('transFront.username')</label>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="password"
                                   class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="Açar sözi" required>
                            <label for="password">Açar sözi</label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input class="custom-control-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="remember">Ýatda sakla</label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-user btn-block" id="submit-button">
                                @lang('transFront.login') <i class="fas fa-caret-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#login-form").submit(function () {
        $("#loading-screen").fadeIn(400);
        $("#submit-button").html("<i class='fas fa-spinner fa-pulse fa-lg'></i>");
    });
</script>

<style>
    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group > input,
    .form-label-group > label {
        height: 3.125rem;
        padding: .75rem;
    }

    .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0.5rem;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text; /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    /* Fallback for Edge
    -------------------------------------------------- */
    @supports (-ms-ime-align: auto) {
        .form-label-group > label {
            display: none;
        }

        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }

    /* Fallback for IE
    -------------------------------------------------- */
    @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
        .form-label-group > label {
            display: none;
        }

        .form-label-group input:-ms-input-placeholder {
            color: #777;
        }
    }
</style>
</body>
</html>
