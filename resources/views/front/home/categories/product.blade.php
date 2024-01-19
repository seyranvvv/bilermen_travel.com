@if($category[2]->count() > 3)
    <div class="{!! $loop->index % 2 == 0 ? '':'bg-light' !!}">
        <div class="container py-sm-4 py-3">
            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                <div class="h5 mb-0">
                    <a href="{!! route('category', $category[0]->slug) !!}" class="text-primary"
                       title="{!! $category[0]->getName() !!}">
                        {!! $category[0]->getName() !!}
                    </a>
                </div>
                <a href="{!! route('category', $category[0]->slug) !!}" class="text-dark"
                   title="{!! $category[0]->getName() !!}">
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            @if($category[1])
                <div class="my-3">
                    {!! html_entity_decode($category[1]->getBody()) !!}
                </div>
            @endif
            <div class="swiper-container swiper-product my-3">
                <div class="swiper-wrapper">
                    @foreach($category[2] as $product)
                        <div class="swiper-slide">
                            @include('front.app.single_product')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        var swiperc = new Swiper('.swiper-product', {
            speed:750,
            loop:true,
            autoplay:{
                delay:3000,
                disableOnInteraction:false,
            },
            breakpoints:{
                0:{
                    slidesPerView:2,
                    spaceBetween:14,
                    slidesPerGroup:2,
                },
                576:{
                    slidesPerView:3,
                    spaceBetween:14,
                    slidesPerGroup:3,
                },
                768:{
                    slidesPerView:4,
                    spaceBetween:28,
                },
                992:{
                    slidesPerView:5,
                    spaceBetween:28,
                },
            }
        });
    </script>
@endif