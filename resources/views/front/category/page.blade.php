<div class="row">
    <div class="col-lg-9 col-md-8 py-2">
        <div class="h5 text-primary border-bottom py-2">
            {!! $category->getName() !!}
        </div>
        @if($page)
            <div class="my-3">
                {!! html_entity_decode($page->getBody()) !!}
            </div>
        @else
            <div class="my-3">
                @include('front.app.under_construction')
            </div>
        @endif
    </div>
    <div class="col-lg-3 col-md-4 py-2">
        @include('front.app.sidebar')
    </div>
</div>