<script type="text/javascript" src="{!! asset('admin/js/topbar.min.js') !!}"></script>
<style>
    div#loading-screen {
        opacity: 0.75;
        z-index: 100000;
    }
</style>
<script>
    topbar.show();
    $(window).on("load", function () {
        $("#loading-screen").fadeOut(400);
        topbar.hide();
    });
</script>
<div id="loading-screen" class="bg-gradient-light position-fixed w-100 h-100 bg-light">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <img src="{!! asset('front/logo.png') !!}" alt="@lang('transFront.app-name')" class="position-absolute" style="height: 6.55rem;">
        <span class="spinner-border border-light border-bottom-primary"></span>
    </div>
</div>