@foreach($categories as $category)
    @switch($category[0]->type)
        @case(1)
        @include('front.home.categories.product')
        @break
        @case(2)
        @include('front.home.categories.post')
        @break
        @case(3)
        @include('front.home.categories.page')
        @break
        @case(4)
        @include('front.home.categories.video')
        @break
        @default
    @endswitch
@endforeach