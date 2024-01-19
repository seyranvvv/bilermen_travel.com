<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@lang('transFront.description')">
    <link rel="canonical" href="{!! URL::current() !!}">
    <meta name="keywords" content="@lang('transFront.app-name'), @yield('keywords'), @lang('transFront.keywords')">

    <!-- favicon.ico -->
    <link rel="apple-touch-icon" sizes="180x180" href="front/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="front/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="front/favicon-16x16.png">
    <link rel="manifest" href="front/site.webmanifest">
    <link rel="mask-icon" href="front/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('front.layouts.meta')

    <!-- Styles -->

    {{--    <link rel="preconnect" href="https://fonts.googleapis.com"> --}}

    {{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}

    {{--    <link --}}
    {{--            href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" --}}
    {{--            rel="stylesheet"> --}}


    <link rel="stylesheet" href="{!! asset('front/assets/vendors/bootstrap/css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/fonts/fonts.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/animate/animate.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/animate/custom-animate.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/fontawesome/css/all.min.css') !!}" />
    {{-- <link rel="stylesheet" href="{!! asset('front/assets/vendors/jarallax/jarallax.css') !!}" /> --}}
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') !!}" />
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/nouislider/nouislider.min.css') !!}" /> --}}
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/nouislider/nouislider.pips.css') !!}" /> --}}
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/odometer/odometer.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/swiper/swiper.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/insur-icons/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/insur-two-icon/style.css') !!}">
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/tiny-slider/tiny-slider.min.css') !!}" /> --}}
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/reey-font/stylesheet.css') !!}" /> --}}
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/owl-carousel/owl.carousel.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/owl-carousel/owl.theme.default.min.css') !!}" />
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/bxslider/jquery.bxslider.css') !!}" /> --}}
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') !!}" /> --}}
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/vegas/vegas.min.css') !!}" /> --}}
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/jquery-ui/jquery-ui.css') !!}" /> --}}
    {{-- <link rel="stylesheet" href="{!! asset('front/assets/vendors/timepicker/timePicker.css') !!}" /> --}}
    <link rel="stylesheet" href="{!! asset('front/assets/vendors/nice-select/nice-select.css') !!}" />
    {{--    <link rel="stylesheet" href="{!! asset('front/assets/vendors/ion.rangeSlider/css/ion.rangeSlider.min.css') !!}"> --}}

    <!-- template styles -->
    <link rel="stylesheet" id="langLtr" href="{!! asset('front/assets/css/insur.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/assets/css/insur-responsive.css') !!}" />


</head>

<body class="custom-cursor">
    {{-- @include('partials.alert')
@include('partials.loading') --}}

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a {
            font-family: 'Roboto-Regular', serif !important;
        }

        * {
            text-indent: unset !important;
        }

        .counter-one__plus {
            padding-left: 4px !important;
        }

        .odometer.odometer-auto-theme .odometer-digit .odometer-digit-inner,
        .odometer.odometer-theme-default .odometer-digit .odometer-digit-inner {
            overflow: visible !important;
        }

        .lang-active {
            color: var(--insur-primary) !important;
        }

        .about-one__right ul,
        .about-four__right ul {
            list-style: none;
            padding-left: 0;

        }

        .about-one__right li,
        .about-four__right li {
            display: flex;
            flex-direction: row-reverse;
            justify-content: start;

        }

        .about-one__right .icon,
        .about-four__right .icon {
            height: 16px;
            width: 16px;
            background-color: var(--insur-primary);
            font-size: 10px;
            color: var(--insur-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-direction: column;
            margin-top: 4px;
        }

        @media only screen and (min-width: 991px) {
            #locales {
                display: none;
            }
        }
    </style>
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>


    <div class="page-wrapper">

        @include('front.app.header')
        @yield('content')
        @include('front.app.footer')
    </div>
    @include('front.app.nav')
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="{!! asset('front/assets/vendors/jquery/jquery-3.6.0.min.js') !!}"></script>
    <script src="{!! asset('front/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/jarallax/jarallax.min.js') !!}"></script> --}}
    {{-- <script src="{!! asset('front/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') !!}"></script> --}}
    <script src="{!! asset('front/assets/vendors/jquery-appear/jquery.appear.min.js') !!}"></script>
    <script src="{!! asset('front/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') !!}"></script>
    <script src="{!! asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('front/assets/vendors/jquery-validate/jquery.validate.min.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/nouislider/nouislider.min.js') !!}"></script> --}}
    <script src="{!! asset('front/assets/vendors/odometer/odometer.min.js') !!}"></script>
    <script src="{!! asset('front/assets/vendors/swiper/swiper.min.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/tiny-slider/tiny-slider.min.js') !!}"></script> --}}
    {{-- <script src="{!! asset('front/assets/vendors/wnumb/wNumb.min.js') !!}"></script> --}}
    <script src="{!! asset('front/assets/vendors/wow/wow.js') !!}"></script>
    <script src="{!! asset('front/assets/vendors/isotope/isotope.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/countdown/countdown.min.js') !!}"></script> --}}
    <script src="{!! asset('front/assets/vendors/owl-carousel/owl.carousel.min.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/bxslider/jquery.bxslider.min.js') !!}"></script> --}}
    <script src="{!! asset('front/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/vegas/vegas.min.js') !!}"></script> --}}
    {{-- <script src="{!! asset('front/assets/vendors/jquery-ui/jquery-ui.js') !!}"></script> --}}
    <script src="{!! asset('front/assets/vendors/nice-select/jquery.nice-select.min.js') !!}"></script>
    {{-- <script src="{!! asset('front/assets/vendors/timepicker/timePicker.js') !!}"></script> --}}
    {{-- <script src="{!! asset('front/assets/vendors/circleType/jquery.circleType.js') !!}"></script> --}}
    {{-- <script src="{!! asset('front/assets/vendors/circleType/jquery.lettering.min.js') !!}"></script> --}}
    {{-- <script src="{!! asset('front/assets/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js') !!}"></script> --}}



    <!-- template js -->
    <script src="{!! asset('front/assets/js/insur.js') !!}"></script>

    <script>
        let element = '<div class="icon"><i class="fa fa-check"></i></div>'

        $('.about-one__right li').each(function() {
            $(this).append(element)
        })
        $('.about-four__right li').each(function() {
            $(this).append(element)
        })
    </script>
</body>

</html>
