@if($category[2]->count() > 0)
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
            <div class="mt-3">
                <div class="row">
                    @foreach($category[2] as $video)
                        <div class="col-lg-3 col-md-4 {{ $loop->index > 2 ? 'd-md-none d-lg-block':'' }} col-6 mb-3">
                            @include('front.app.single_video')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif