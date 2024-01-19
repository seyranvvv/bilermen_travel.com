<div class="card shadow-sm single-video" data-aos-once="true" data-aos="fade-up">
    <a href="{!! route('video', $video->slug) !!}" title="{!! $video->getTitle() !!}" class="d-flex align-items-center justify-content-center">
        <img src="{!! asset('img/play-button.svg') !!}" alt="Play" class="play-button position-absolute">
        @if($video->image)
        <img src="{!! asset('img/temp/video-sm.png') !!}"
             data-src="{!! Storage::disk('local')->url('sm/'.$video->image) !!}"
             alt="{{ $video->getTitle() }}"
             class="load-image card-img-top">
        @else
        <img src="{!! asset('img/temp/video-sm.png') !!}"
             alt="{{ $video->getTitle() }}"
             class="card-img-top">
        @endif
    </a>
    <div class="card-body p-sm-3 p-2">
        <div class="h6 line-clamp">
            <a href="{!! route('video', $video->slug) !!}" title="{!! $video->getTitle() !!}"
               class="stretched-link">
                {!! $video->getTitle() !!}
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center small text-secondary">
            <div class="d-none d-sm-inline">{!! $video->date_start->format('d.m.Y') !!}</div>
            <div>
                <i class="fas fa-play-circle text-secondary"></i> {!! $video->viewed !!}
            </div>
        </div>
    </div>
</div>