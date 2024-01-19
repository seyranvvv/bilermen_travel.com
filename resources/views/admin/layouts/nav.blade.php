<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fas fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">



        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item mx-1">
            <a class="nav-link text-gray-500" href="{!! route('index') !!}" target="_blank">
                <i class="fas fa-home fa-fw"></i>
            </a>
        </li>

            <li class="nav-item mx-1">
                <a class="nav-link text-gray-500" href="{!! route('admin.password.edit') !!}">
                    <i class="fas fa-key fa-fw"></i>
                </a>
            </li>


        <li class="nav-item mx-1">
            <a class="nav-link text-gray-500" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-fw"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>


            <li class="nav-item mx-1">
                <a href="{!! route('language', $key = 'tm') !!}" class="nav-link">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="Türkmen" class="border" height="16">
                </a>
            </li>



            <li class="nav-item mx-1">
                <a href="{!! route('language', $key = 'ru') !!}" class="nav-link">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="Русский" class="border" height="16">
                </a>
            </li>



            <li class="nav-item mx-1">
                <a href="{!! route('language', $key = 'en') !!}" class="nav-link">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="English" class="border" height="16">
                </a>
            </li>


    </ul>
</nav>

<script>
    $(document).ready(function () {
        orderFirstCheck();
        contactFirstCheck();
    });

    setInterval(function() {
        orderCheck();
        contactCheck();
    }, 20 * 1000);


</script>