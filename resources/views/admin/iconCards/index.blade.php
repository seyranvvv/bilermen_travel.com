@extends('admin.layouts.app')
@section('title') @lang('transAdmin.iconCards') @endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transAdmin.iconCards')</div>
       {{-- <a href="{{ route('admin.iconCards.index') }}" class="btn btn-sm btn-danger">
           --}}{{-- <i class="fas fa-plus"></i> @lang('transAdmin.iconCards')--}}{{--
        </a>--}}
    </div>

    <table class="table shadow table-bordered table-striped table-hover table-md bg-white mt-4">
        <thead>
        <tr>
            <th>@lang('transAdmin.title')</th>
            <th>@lang('transAdmin.body')</th>

            <th>@lang('transAdmin.image')</th>
            <th>@lang('transAdmin.type')</th>
            <th >@lang('transAdmin.counter')</th>
            <th>@lang('transAdmin.plus')</th>
            <th><i class="fas fa-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse($objs as $obj)
            <tr>
                <td>
                    <div class="mb-1">
                      {!! $obj->name !!}
                    </div>

                </td>
 <td>
                    <div class="mb-1">
                      {!! $obj->text !!}
                    </div>

                </td>

                <td>
                    @if($obj->icon)
                        <img src="{{ Storage::disk('local')->url('icon/'.$obj->icon) }}"
                             alt="{{ $obj->icon }}"
                             class="img-fluid img-max border">
                    @else
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid img-max border">
                    @endif

                </td>

                <td>{!! $obj->type !!}</td>
                <td>{!! $obj->counter !!}</td>
                <td>
                    {!! $obj->after_text !!}
                </td>
                <td>
                    <a href="{{ route('admin.iconCards.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                        <i class="fas fa-pen"></i>
                    </a>
                    <br>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center bg-light text-secondary">
                    <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.slider') @lang('transAdmin.not-found')
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="mb-4">
        {{--{!! $objs->links() !!}--}}
    </div>
@endsection