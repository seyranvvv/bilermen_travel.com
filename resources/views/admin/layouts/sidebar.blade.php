<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{!! route('admin.dashboard') !!}">
        <img src="{{ asset('front/logo.png') }}" alt="@lang('transFront.app-name')" class="img-fluid sidebar-brand-text-mini">
        <img src="{{ asset('front/logos.png') }}" alt="@lang('transFront.app-name')" class="img-fluid sidebar-brand-text"
            style="max-height: 80px;">
    </a>

    <hr class="sidebar-divider my-0">


    <li class="nav-item" id="navItem0">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse0"
            aria-expanded="true" aria-controls="collapse0">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('transAdmin.panels')</span>
        </a>
        <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">


                <a class="collapse-item ci-sidebar" href="{!! route('admin.visitor-panel') !!}">@lang('transAdmin.visitor-panel')</a>

                <a class="collapse-item ci-sidebar" href="{!! route('admin.admin-panel') !!}">@lang('transAdmin.admin-panel')</a>

            </div>
        </div>
    </li>




    <li class="nav-item" id="navItem1">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1"
            aria-expanded="true" aria-controls="collapse1">

            <i class="fas fa-fw fa-cogs"></i>
            <span>@lang('transAdmin.settings')</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">


                <a class="collapse-item ci-sidebar" href="{!! route('admin.translations.index') !!}">Terjimeler</a>
                <a class="collapse-item ci-sidebar" href="{!! route('admin.iconCards.index') !!}">Icon</a>
                {{-- <a class="collapse-item ci-sidebar" href="{!! route('admin.recommendation.index') !!}">@lang('transAdmin.recommendation')</a> --}}
                <a class="collapse-item ci-sidebar" href="{!! route('admin.sliders.index') !!}">@lang('transAdmin.sliders')</a>
                <a class="collapse-item ci-sidebar" href="{!! route('admin.greet.index') !!}">@lang('transAdmin.partners')</a>
                {{-- <a class="collapse-item ci-sidebar" href="{!! route('admin.vacancy.index') !!}">@lang('transAdmin.vacancy')</a> --}}

            </div>
        </div>
    </li>

    <li class="nav-item" id="navItem23">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse23"
            aria-expanded="true" aria-controls="collapse23">

            <i class="fas fa-fw fa-cogs"></i>
            <span>@lang('transFront.contact')</span>
        </a>
        <div id="collapse23" class="collapse" aria-labelledby="heading23" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item ci-sidebar" href="{!! route('admin.contact.index') !!}">@lang('transFront.contact')</a>
                <a class="collapse-item ci-sidebar" href="{!! route('admin.contactBanner.index') !!}">@lang('transAdmin.baner')</a>
                <a class="collapse-item ci-sidebar" href="{!! route('admin.contactWith.index') !!}">@lang('transFront.contact-us')</a>

                <a class="collapse-item ci-sidebar" href="{!! route('admin.districts.index') !!}">@lang('transFront.district')</a>


            </div>
        </div>
    </li>

    <li class="nav-item" id="navItem2">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
            aria-expanded="true" aria-controls="collapse2">

            <i class="fas fa-fw fa-newspaper"></i>
            <span>@lang('transAdmin.customers')</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item ci-sidebar" href="{!! route('admin.post.index') !!}">@lang('transAdmin.posts')</a> 
                <a class="collapse-item ci-sidebar" href="{!! route('admin.certificate.index') !!}">@lang('transAdmin.customers')</a>

                <a class="collapse-item ci-sidebar" href="{!! route('admin.postBanner.index') !!}">@lang('transAdmin.baner')</a>
            </div>
        </div>
    </li>

    <li class="nav-item" id="navItem3">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
            aria-expanded="true" aria-controls="collapse3">

            <i class="fas fa-fw fa-newspaper"></i>
            <span>@lang('transFront.services')</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item ci-sidebar" href="{!! route('admin.service.index') !!}">@lang('transFront.services')</a>
                <a class="collapse-item ci-sidebar" href="{!! route('admin.serviceBanner.index') !!}">@lang('transAdmin.baner')</a>
                {{-- <a class="collapse-item ci-sidebar" href="{!! route('admin.serviceAbout.index') !!}">@lang('transFront.our_services')</a> --}}
            </div>
        </div>
    </li>



    {{-- <li class="nav-item" id="navItem4">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
            aria-expanded="true" aria-controls="collapse4">

            <i class="fas fa-fw fa-newspaper"></i>
            <span>@lang('transAdmin.shop')</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item ci-sidebar" href="{!! route('admin.product.index') !!}">@lang('transFront.products')</a>

                <a class="collapse-item ci-sidebar" href="{!! route('admin.category.index') !!}">@lang('transAdmin.category')</a>

                <a class="collapse-item ci-sidebar" href="{!! route('admin.shopBanner.index') !!}">@lang('transAdmin.baner')</a>
            </div>
        </div>
    </li> --}}


    <li class="nav-item" id="navItem6">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
            aria-expanded="true" aria-controls="collapse6">

            <i class="fas fa-fw fa-newspaper"></i>
            <span>@lang('transFront.abouts')</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item ci-sidebar" href="{!! route('admin.about.index') !!}">@lang('transFront.abouts')</a>
                <a class="collapse-item ci-sidebar" href="{!! route('admin.tehnology.index') !!}">@lang('transFront.tehnology')</a>

                {{--                <a class="collapse-item ci-sidebar" href="{!! route('admin.shop.index') !!}">@lang('transFront.services')</a> --}}
                <a class="collapse-item ci-sidebar" href="{!! route('admin.aboutBanner.index') !!}">@lang('transAdmin.baner')</a>
            </div>
        </div>
    </li>

    <li class="nav-item" id="navItem6">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse9"
            aria-expanded="true" aria-controls="collapse9">

            <i class="fas fa-fw fa-newspaper"></i>
            <span>@lang('transFront.why-choose-us')</span>
        </a>
        <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item ci-sidebar" href="{!! route('admin.why-choose-us.index') !!}">@lang('transFront.why-choose-us')</a>

            </div>
        </div>
    </li>

    <li class="nav-item" id="navItem5">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
            aria-expanded="true" aria-controls="collapse5">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>@lang('transAdmin.visitors')</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item ci-sidebar" href="{!! route('admin.ip-addresses.index') !!}">@lang('transAdmin.ip-addresses')</a>


                <a class="collapse-item ci-sidebar" href="{!! route('admin.user-agents.index') !!}">@lang('transAdmin.user-agents')</a>


                <a class="collapse-item ci-sidebar" href="{!! route('admin.visitors.index') !!}">@lang('transAdmin.visitors')</a>


                <a class="collapse-item ci-sidebar" href="{!! route('admin.login-attempts.index') !!}">@lang('transAdmin.login-attempts')</a>

            </div>
        </div>
    </li>


    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<script>
    $(document).ready(function() {
        function ciSidebar() {
            var url = window.location.pathname;
            var activePage = url.substring(url.indexOf('/') + 1);
            $('.ci-sidebar').each(function() {
                var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1);
                if (activePage.indexOf(linkPage) !== -1) {
                    $(this).addClass('active');
                    if (Boolean(sessionStorage.getItem("sidebar-toggled"))) {
                        $(this).parent().parent().addClass('show');
                    }
                    $(this).parent().parent().parent().addClass('active');
                }
            });
        }

        ciSidebar();
        $(window).on('hashchange', function() {
            ciSidebar();
        });
    });

    if (Boolean(sessionStorage.getItem("sidebar-toggled"))) {
        $("#accordionSidebar").removeClass('toggled');
        sessionStorage.setItem("sidebar-toggled", "1");
    } else {
        $("#accordionSidebar").addClass('toggled');
        sessionStorage.setItem("sidebar-toggled", "");
    }

    $('#sidebarToggle').click(function() {
        event.preventDefault();
        if (Boolean(sessionStorage.getItem("sidebar-toggled"))) {
            sessionStorage.setItem("sidebar-toggled", "");
        } else {
            sessionStorage.setItem("sidebar-toggled", "1");
        }
    });
</script>
