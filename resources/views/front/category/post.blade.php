<div class="row">
    <div class="col-lg-9 col-md-8 py-2">
        <div class="h5 text-primary border-bottom py-2">
            {!! $category->getName() !!}
        </div>
        @if($page)
            <div class="my-3">
                {!! html_entity_decode($page->getBody()) !!}
            </div>
        @endif
        @if($posts->count() > 0)
            <div class="mt-3">
                <div class="row">
                    @foreach($posts as $post)
                        @include('front.app.single_post')
                    @endforeach
                </div>
            </div>
            @if($posts->hasPages())
                <div class="d-flex justify-content-end" data-aos-once="true" data-aos="fade-up">
                    {!! $posts->links() !!}
                </div>
            @endif
        @else
            <div class="my-3">
                <i class="fas fa-exclamation-circle text-warning"></i>
                @lang('transAdmin.post') @lang('transAdmin.not-found')
            </div>
        @endif
    </div>
    <div class="col-lg-3 col-md-4 py-2">
        @include('front.app.sidebar')
    </div>
</div>