<style>
    .swiper-slider {
        width:100%;
    }

    .swiper-slider .swiper-slide {
        text-align:center;
        -webkit-box-sizing:border-box;
        box-sizing:border-box;
        width:auto;
        /* Center slide text vertically */
        overflow:hidden;
        display:-webkit-box;
        display:-ms-flexbox;
        display:-webkit-flex;
        display:flex;
        -webkit-box-pack:center;
        -ms-flex-pack:center;
        -webkit-justify-content:center;
        justify-content:center;
        -webkit-box-align:center;
        -ms-flex-align:center;
        -webkit-align-items:center;
        align-items:center;
    }

    @media (min-width:768px) {
        .swiper-slider .swiper-slide img {
            width:100%;
        }
    }

    .swiper-slider .swiper-slide img {
        width:120%;
        max-height:450px;
        display:block;
        margin-left:auto;
        margin-right:auto;
    }
</style>

<div class="swiper-container swiper-slider" id="swiper-container">
    <div class="swiper-wrapper">
        @foreach($sliders as $slider)
            @if( $slider->url)
                @if($slider->getImage())
                    <a class="swiper-slide swiper-image" href="{!! $slider->url !!}"
                       title="{!! $slider->getTitle() !!}">
                        <img class="load-image"
                             src="{{ asset('img/temp/slider.png') }}"
                             data-src="{!! Storage::disk('local')->url($slider->getImage()) !!}"
                             alt="{!! $slider->getTitle() !!}">
                    </a>
                @else
                    <a class="swiper-slide swiper-image" href="{!! $slider->url !!}"
                       title="{!! $slider->getTitle() !!}">
                        <img src="{{ asset('img/temp/slider.png') }}"
                             alt="{!! $slider->getTitle() !!}">
                    </a>
                @endif
            @else
                <div class="swiper-slide swiper-image">
                    @if($slider->getImage())
                        <img class="load-image"
                             src="{{ asset('img/temp/slider.png') }}"
                             data-src="{!! Storage::disk('local')->url($slider->getImage()) !!}"
                             alt="{!! $slider->getTitle() !!}">
                    @else
                        <img src="{{ asset('img/temp/slider.png') }}"
                             alt="{!! $slider->getTitle() !!}">
                    @endif
                </div>
            @endif
        @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
    // function setImageRatio(){
    //     // $('.swiper-image img').css({'height':$('.swiper-image').width() * 0.5});
    // }
    //
    // $(document).ready(function() {
    //     setImageRatio();
    //     $(window).resize(function() {
    //         setImageRatio();
    //     })
    // });

    var swiper = new Swiper('.swiper-slider', {
        speed:1000,
        loop:true,
        autoplay:{
            delay:5000,
            disableOnInteraction:false,
        },
        navigation:{
            nextEl:'.swiper-button-next',
            prevEl:'.swiper-button-prev',
        },
        pagination:{
            el:'.swiper-pagination',
            dynamicBullets:true,
        },
    });
</script>