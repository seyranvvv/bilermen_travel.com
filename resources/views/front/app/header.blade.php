<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner">
                <div class="main-header__top-address">
                    <ul class="list-unstyled main-header__top-address-list">
                        <li>
                            <i class="icon">
                                <span class="icon-pin"></span>
                            </i>
                            <div class="text">
                                <p>{!! html_entity_decode($contact->getName()) !!}</p>
                            </div>
                        </li>
                        <li>
                            <i class="icon">
                                <span class="icon-email"></span>
                            </i>
                            <div class="text">
                                <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                            </div>
                        </li>




                        <li>
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="#015fc9" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                            </i>
                            <div class="text">
                                <p><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></p>
                            </div>
                        </li>
                        {{-- <li>
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="#015fc9" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                    <path
                                        d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                    </path>
                                    <rect x="6" y="14" width="12" height="8"></rect>
                                </svg>
                            </i>
                            <div class="text">
                                <p><a href="tel:{{ $contact->fax }}">{{ $contact->fax }}</a></p>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="main-header__top-right">
                    <div class="main-header__top-menu-box">
                        <ul class="list-unstyled main-header__top-menu">
                            <li><a class="{{ app()->getLocale('language') == 'tm' ? 'lang-active' : '' }}"
                                    href="{!! route('language', $key = 'tm') !!}">TM</a></li>
                            <li><a class="{{ app()->getLocale('language') == 'ru' ? 'lang-active' : '' }}"
                                    href="{!! route('language', $key = 'ru') !!}">RU</a></li>
                            <li><a class="{{ app()->getLocale('language') == 'en' ? 'lang-active' : '' }}"
                                    href="{!! route('language', $key = 'en') !!}">EN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu__wrapper clearfix">
            <div class="container">
                <div class="main-menu__wrapper-inner clearfix">
                    <div class="main-menu__left">
                        <div class="main-menu__logo" style="position: relative; margin-right: 90px">

                            <a href="{!! route('index') !!}"><img src="{{ asset('front/logo.png') }}" alt=""
                                    style="width: 76px; top: -13px; position: absolute"></a>

                        </div>







                        <div class="main-menu__main-menu-box" style="margin-left: 34px">
                            <div class="main-header__top-center " id="locales" style="margin-right: 20px">
                                <div class="main-header__top-menu-box">
                                    <ul class="list-unstyled main-header__top-menu">
                                        <li><a class="{{ app()->getLocale('language') == 'tm' ? 'lang-active' : '' }}"
                                                href="{!! route('language', $key = 'tm') !!}"><img
                                                    src="{{ asset('admin/img/flags/tkm.png') }}"></a></li>
                                        <li><a class="{{ app()->getLocale('language') == 'ru' ? 'lang-active' : '' }}"
                                                href="{!! route('language', $key = 'ru') !!}"><img
                                                    src="{{ asset('admin/img/flags/rus.png') }}"></a></li>
                                        <li><a class="{{ app()->getLocale('language') == 'en' ? 'lang-active' : '' }}"
                                                href="{!! route('language', $key = 'en') !!}"><img
                                                    src="{{ asset('admin/img/flags/eng.png') }}"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="main-menu__main-menu-box-inner">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li class="{{ Route::currentRouteName() == 'index' ? 'current' : '' }}">
                                        <a href="{{ route('index') }}">@lang('transFront.home') </a>

                                    </li>
                                    <li
                                        class="{{ Route::currentRouteName() == 'front.about.index' ? 'current' : '' }}">
                                        <a href="{{ route('front.about.index') }}">@lang('transFront.abouts') </a>

                                    </li>

                                    <li
                                        class="{{ Route::currentRouteName() == 'front.service.index' || Route::currentRouteName() == 'front.service.service_single' ? 'current' : '' }}">
                                        <a href="{{ route('front.service.index') }}">@lang('transFront.services') </a>

                                    </li>

                                    {{-- <li
                                        class="{{ Route::currentRouteName() == 'front.customers.index' ? 'current ' : '' }}">
                                        <a href="{{ route('front.customers.index') }}">@lang('transAdmin.customers')</a>
                                    </li> --}}
                                    <li class="{{ Route::currentRouteName() == 'front.post.index' ? 'current ' : '' }}">
                                        <a href="{{ route('front.post.index') }}">@lang('transAdmin.posts')</a>
                                    </li>

                                    <li class="{{ Route::currentRouteName() == 'front.contact' ? 'current ' : '' }}">
                                        <a href="{{ route('front.contact') }}">@lang('transFront.contact')</a>
                                    </li>

                                  

                                    {{--  <li   class="{{Route::currentRouteName() == 'front.about.travel' ? 'current ' : ''}}">
                                        <a href="{{ route('front.about.travel') }}">@lang('transFront.travel')</a>
                                    </li>
                                    <li   class="{{Route::currentRouteName() == 'front.about.logistics' ? 'current ' : ''}}">
                                        <a href="{{ route('front.about.logistics') }}">@lang('transFront.logistics')</a>
                                    </li>
                                    <li   class="{{Route::currentRouteName() == 'front.about.advertisement' ? 'current ' : ''}}">
                                        <a href="{{ route('front.about.advertisement') }}">@lang('transFront.advertisement')</a>
                                    </li>
--}}

                                </ul>
                            </div>
                            <div class="main-menu__main-menu-box-search-get-quote-btn">
                                {{--                                <div class="main-menu__main-menu-box-search"> --}}
                                {{--                                    --}}{{-- <a href="#" --}}
                                {{--                                       class="main-menu__search search-toggler icon-magnifying-glass"></a> --}}
                                {{--                                    <a href="cart.html" --}}
                                {{--                                       class="main-menu__cart insur-two-icon-shopping-cart"></a> --}}
                                {{--                                </div> --}}
                                {{--                                <div class="main-menu__main-menu-box-get-quote-btn-box"> --}}
                                {{--                                    <a href="contact.html" --}}
                                {{--                                       class="thm-btn main-menu__main-menu-box-get-quote-btn">TM RU EN</a> --}}
                                {{--                                </div> --}}
                                <ul class="pagination " style="padding-right: 8px; height: 100% ">

                                    {{--                                    <li class="page-item"> --}}
                                    {{--                                        <a class="page-link" href="http://127.0.0.1:8000/harytlar?uah=1&amp;page=1" rel="prev" aria-label="« Öňki">‹</a> --}}
                                    {{--                                    </li> --}}

                                    {{-- <li class="page-item {{app()->getLocale('language') == 'tm' ? 'active' : ''}}"><a class="page-link"  href="{!! route('language', $key = 'tm') !!}">TM</a></li> --}}
                                    {{-- <li class="page-item {{app()->getLocale('language') == 'ru' ? 'active' : ''}}"><a class="page-link"  href="{!! route('language', $key = 'ru') !!}">RU</a></li> --}}
                                    {{-- <li class="page-item {{app()->getLocale('language') == 'en' ? 'active' : ''}}"><a class="page-link"  href="{!! route('language', $key = 'en') !!}">EN</a></li> --}}


                                    {{--                                    <li class="page-item " aria-disabled="true" aria-label="Indiki »"> --}}
                                    {{--                                        <span class="page-link" aria-hidden="true">›</span> --}}
                                    {{--                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="main-menu__right"> --}}
                    {{--                        <div class="main-menu__call"> --}}
                    {{--                            <div class="main-menu__call-icon"> --}}
                    {{--                                <i class="fas fa-phone"></i> --}}
                    {{--                            </div> --}}
                    {{--                            <div class="main-menu__call-content"> --}}
                    {{--                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a> --}}
                    {{--                                --}}{{-- <p>Call to Our Experts</p> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
