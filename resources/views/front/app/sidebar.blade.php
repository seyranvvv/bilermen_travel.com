@if($sidebarProducts->count() > 0)
    <div class="h5 text-secondary border-bottom py-2">
        @lang('transFront.recommended-for-you')
    </div>
    <div class="mt-3">
        <div class="row">
            @foreach($sidebarProducts as $product)
                <div class="col-md-12 col-sm-6 mb-3">
                    <div class="row no-gutters single-th-product" data-aos-once="true" data-aos="zoom-in-up">
                        <div class="col-4">
                            <a href="{!! route('product', $product->slug) !!}" title="{!! $product->getName() !!}"
                               class="d-flex align-items-start justify-content-end">
                                @if($product->image)
                                    <img src="{!! asset('img/temp/product-th.png') !!}"
                                         data-src="{!! Storage::disk('local')->url('th/'.$product->image) !!}"
                                         alt="{{ $product->getName() }}"
                                         class="load-image img-fluid rounded border">
                                @else
                                    <img src="{!! asset('img/temp/product-th.png') !!}"
                                         alt="{{ $product->getName() }}"
                                         class="img-fluid rounded border">
                                @endif
                            </a>
                        </div>
                        <div class="col-8 pl-2">
                            <div class="h6 line-clamp mb-1">
                                <a href="{!! route('product', $product->slug) !!}" title="{!! $product->getName() !!}">
                                    {!! $product->getName() !!}
                                </a>
                                @if($product->new())
                                    <i class="fas fa-gift text-warning"></i>
                                @endif
                            </div>
                            @if($product->inStock())
                                @if($product->price())
                                    <div class="h6 mb-2 text-danger">
                                        <small class="text-secondary">
                                            <s>{!! number_format((float)$product->price, 2, '.', '') !!}</s>
                                            <small>TMT</small>
                                        </small>
                                        {!! number_format((float)$product->price(), 2, '.', '') !!} <small>TMT</small>
                                    </div>
                                @else
                                    <div class="h6 mb-2 text-primary">
                                        {!! number_format((float)$product->price, 2, '.', '') !!} <small>TMT</small>
                                    </div>
                                @endif
                            @else
                                <div class="text-secondary">
                                    @lang("transFront.out-of-stock")
                                </div>
                            @endif
                            @if($product->inStock())
                                <div class="button-bottom-right">
                                    <button type="button" class="btn btn-sm btn-danger rounded-pill add-product" value="{!! $product->id !!}">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif