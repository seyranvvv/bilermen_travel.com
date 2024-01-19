<div class="container">
    <ol class="breadcrumb small mb-0 py-1">
        <li class="breadcrumb-item">
            <a href="{!! route('home') !!}" class="text-secondary" title="@lang('transFront.home')">
                @lang('transFront.home')
            </a>
        </li>
        {!! $slot !!}
    </ol>
</div>