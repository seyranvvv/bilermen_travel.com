<footer class="site-footer">
    <div class="site-footer-bg" style="background-image: url(front/assets/images/backgrounds/site-footer-bg.png);">
    </div>
    <div class="container">
        <div class="site-footer__top pt-5 pb-4">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo pb-3">

                            <a href="{!! route('index') !!}"><img src="{{ asset('front/logos.png') }}" alt=""
                                    style="width: 350px"></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            {{-- @if (in_array(\Request::route()->getName(), ['front.about.travel', 'front.about.logistics', 'front.service.index', 'front.service.service_single', 'front.about.advertisement']))
                            @else --}}
                            <p class="footer-widget__about-text">{!! html_entity_decode($contact->getSlogan()) !!}</p>
                            {{-- @endif --}}
                        </div>

                    </div>
                </div>


                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    {{-- <div class="footer-widget__column footer-widget__newsletter"> --}}
                    {{-- <h3 class="footer-widget__title">@lang('transFront.sahypalar')</h3> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('index') }}">@lang('transFront.home') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.about.index') }}">@lang('transFront.abouts') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.product.index') }}">@lang('transAdmin.shop') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.post.index') }}">@lang('transAdmin.posts') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.contact') }}">@lang('transFront.contact') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.service.index') }}">@lang('transFront.services')  </a></p> --}}


                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.about.travel') }}">@lang('transFront.travel') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.about.logistics') }}">@lang('transFront.logistics') </a></p> --}}
                    {{-- <p class="footer-widget__newsletter-text pb-1"><a --}}
                    {{-- href="{{ route('front.about.advertisement') }}">@lang('transFront.advertisement') </a> --}}
                    {{-- </p> --}}


                    {{-- </div> --}}


                    @foreach ($districts as $district)
                        @if ($district->phone)
                            <div class="footer-widget__phone mt-0">
                                <div class="footer-widget__phone-icon">
                                    <span class="icon-telephone"></span>
                                </div>
                                <div class="footer-widget__phone-text">
                                    <p>{{ $district->getName() }}</p>

                                    <a href="tel:{{ $district->phone }}">{{ $district->phone }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__contact clearfix">
                        <h3 class="footer-widget__title">@lang('transFront.habarlashmak')</h3>
                        <ul class="footer-widget__contact-list list-unstyled clearfix">
                            <li>
                                <div class="icon">
                                    <span class="icon-email"></span>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-pin"></span>
                                </div>
                                <div class="text">
                                    <p>{!! html_entity_decode($contact->getName()) !!}</p>
                                </div>
                            </li>


                            {{-- @if (!in_array(\Request::route()->getName(), ['front.about.travel', 'front.about.logistics', 'front.service.index', 'front.service.service_single', 'front.about.advertisement'])) --}}
                            <li>

                                <div class="">
                                    <p class="site-footer__bottom-text">
                                        © {!! date('Y') !!} @lang('transFront.rights')<a href="#"></a>
                                    </p>

                                </div>
                            </li>
                            {{-- @endif --}}


                        </ul>
                    </div>
                </div>


            </div>
        </div>

    </div>
</footer>
