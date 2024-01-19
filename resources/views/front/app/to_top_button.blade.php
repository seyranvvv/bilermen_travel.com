<button type="button" class="btn btn-sm btn-light rounded-pill m-3" id="scroll-top">
    <i class="fas fa-angle-double-up text-secondary fa-lg"></i>
</button>
<style>
    #scroll-top {
        opacity:0.5;
        position:fixed;
        bottom:0;
        right:0;
        z-index:2000;
    }
</style>
<script>
    $(document).ready(function () {
        $('#scroll-top').click(function () {
            $("html, body").animate({
                scrollTop:0
            }, 1500);
            return false;
        }).fadeOut(0);
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
    });
</script>