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
                    @foreach($category[2] as $post)
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="card shadow-sm" data-aos-once="true" data-aos="fade-up">
                                <div class="card-body p-0">
                                    <div class="row no-gutters">
                                        <div class="col-5">
                                            <a href="{!! route('post', $post->slug) !!}" title="{!! $post->getTitle() !!}">
                                                @if($post->image)
                                                    <img src="{!! asset('img/temp/post-sm.png') !!}"
                                                         data-src="{!! Storage::disk('local')->url('sm/'.$post->image) !!}"
                                                         alt="{{ $post->getTitle() }}"
                                                         class="load-image img-fluid rounded-left">
                                                @else
                                                    <img src="{!! asset('img/temp/post-sm.png') !!}"
                                                         alt="{{ $post->getTitle() }}"
                                                         class="img-fluid rounded-left">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-7 p-sm-2 p-2">
                                            <div class="h6 line-clamp">
                                                <a href="{!! route('post', $post->slug) !!}" title="{!! $post->getTitle() !!}"
                                                   class="stretched-link">
                                                    {!! $post->getTitle() !!}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif