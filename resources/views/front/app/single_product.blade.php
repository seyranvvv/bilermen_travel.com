<div class="single-sm-product" data-aos-once="true" data-aos="zoom-in-up">
    <a href="{!! route('product', $product->slug) !!}" title="{!! $product->getName() !!}"
       class="d-flex align-items-start justify-content-end o-hidden rounded border">
        @if($product->image)
            <img src="{!! asset('img/temp/product-sm.png') !!}"
                 data-src="{!! Storage::disk('local')->url('sm/'.$product->image) !!}"
                 alt="{{ $product->getName() }}"
                 class="load-image img-fluid">
        @else
            <img src="{!! asset('img/temp/product-sm.png') !!}"
                 alt="{{ $product->getName() }}"
                 class="img-fluid">
        @endif
    </a>
    @if($product->inStock())
    <div class="button-bottom-right w-100 d-flex justify-content-end position-absolute">
        <button type="button" class="btn btn-sm btn-danger rounded-pill add-product" value="{!! $product->id !!}">
            <i class="fas fa-cart-plus"></i>
        </button>
    </div>
    @endif
    <div class="text-center py-1">
        <div class="h6 line-clamp mb-1">
            <a href="{!! route('product', $product->slug) !!}" title="{!! $product->getName() !!}">
                {!! $product->getName() !!}
            </a>
            @if($product->new())
                <i class="fas fa-gift text-warning"></i>
            @endif
        </div>
        <div class="small text-secondary">
            @if($product->inStock())
                @if($product->price())
                    <div class="h6 mb-0 text-danger">
                        <small class="text-secondary">
                            <s>{!! number_format((float)$product->price, 2, '.', '') !!}</s>
                            <small>TMT</small>
                        </small>
                        {!! number_format((float)$product->price(), 2, '.', '') !!} <small>TMT</small>
                    </div>
                @else
                    <div class="h6 mb-0 text-primary">
                        {!! number_format((float)$product->price, 2, '.', '') !!} <small>TMT</small>
                    </div>
                @endif
            @else
                <div class="text-secondary">
                    @lang("transFront.out-of-stock")
                </div>
            @endif
        </div>
    </div>
</div>