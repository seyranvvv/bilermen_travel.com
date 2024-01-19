<div class="col-6 mb-3">
    <div class="card shadow-sm" data-aos-once="true" data-aos="fade-up">
        <a href="{!! route('post', $post->slug) !!}" title="{!! $post->getTitle() !!}">
            @if($post->image)
            <img src="{!! asset('img/temp/post-sm.png') !!}"
                 data-src="{!! Storage::disk('local')->url('sm/'.$post->image) !!}"
                 alt="{{ $post->getTitle() }}"
                 class="load-image card-img-top">
            @else
            <img src="{!! asset('img/temp/post-sm.png') !!}"
                 alt="{{ $post->getTitle() }}"
                 class="card-img-top">
            @endif
        </a>
        <div class="card-body p-sm-3 p-2">
            <div class="h6 line-clamp">
                <a href="{!! route('post', $post->slug) !!}" title="{!! $post->getTitle() !!}"
                   class="stretched-link">
                    {!! $post->getTitle() !!}
                </a>
            </div>
            <div class="d-flex justify-content-between align-items-center small text-secondary">
                <div class="d-none d-sm-inline">{!! $post->date_start->format('d.m.Y') !!}</div>
                <div>
                    <i class="fas fa-glasses text-secondary"></i> {!! $post->viewed !!}
                </div>
            </div>
        </div>
    </div>
</div>