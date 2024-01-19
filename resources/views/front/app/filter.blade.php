<form action="{!! url()->current() !!}" method="get" class="mb-3">

    @if(array_key_exists('tertip', request()->query()))
        <input type="hidden" name="tertip" value="{!! request()->query()['tertip'] !!}">
    @endif
    @if(array_key_exists('search', request()->query()))
        <input type="hidden" name="search" value="{!! request()->query()['search'] !!}">
    @endif

    <div class="accordion mb-2" id="filter">
        @foreach($options as $option)
            @if($option->values->count() > 0)
                <div class="card">
                    <div class="card-header d-flex justify-content-between font-weight-bold p-1"
                         id="he{!! $option->id !!}">
                        <span class="p-1">{!! $option->getName() !!}</span>
                        <button type="button"
                                class="btn btn-sm btn-light rounded-pill {!! $loop->index==0 and false ? '':'collapsed' !!}"
                                data-toggle="collapse"
                                data-target="#col{!! $option->id !!}"
                                aria-expanded="{!! $loop->index==0 and false ? 'true':'false' !!}"
                                aria-controls="col{!! $option->id !!}">
                            <i class="fas fa-plus text-secondary"></i>
                        </button>
                    </div>
                    <div id="col{!! $option->id !!}" class="collapse {!! $loop->index==0 and false ? 'show':'' !!}"
                         aria-labelledby="he{!! $option->id !!}"
                         data-parent="#filter">
                        <div class="card-body small p-2">
                            <div class="row">
                                @foreach($option->values as $value)
                                    <div class="col-6 col-sm-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="ch{!! $value->id !!}" name="{!! $option->id !!}[]"
                                                   value="{!! $value->id !!}"
                                                    {{ $filterOptions->contains($value->id) ? 'checked':'' }}>
                                            <label class="custom-control-label pt-1" for="ch{!! $value->id !!}">
                                                {!! $value->getName() !!}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @if(!empty($options))
        <div class="row">
            <div class="col-6 col-sm-12">
                <button type="submit" class="btn btn btn-outline-primary btn-block mb-2" id="btn-filter">
                    <i class="fas fa-filter"></i> @lang('transFront.filter')
                </button>
            </div>
            <div class="col-6 col-sm-12">
                <a href="{!! array_key_exists('search', request()->query()) ? url()->current().'?'.http_build_query(['search' => request()->query()['search']]):url()->current() !!}"
                   class="btn btn btn-outline-secondary btn-block mb-2" id="btn-clear">
                    <i class="fas fa-broom"></i> @lang('transFront.clear')
                </a>
            </div>
        </div>
    @endif
</form>

<script>
    $("#btn-filter").click(function () {
        $(this).children(":first").removeClass('fa-filter').addClass('fas fa-spinner fa-pulse');
    });
    $("#btn-clear").click(function () {
        $(this).children(":first").removeClass('fa-filter').addClass('fas fa-spinner fa-pulse');
    });
</script>