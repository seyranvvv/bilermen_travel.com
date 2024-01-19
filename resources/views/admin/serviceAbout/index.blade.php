@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transFront.our_services')</div>
    </div>

    <table class="table shadow table-bordered table-striped table-hover table-md bg-white mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>@lang('transAdmin.name')</th>
            <th>@lang('transAdmin.image')</th>
            <th><i class="fas fa-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse($objs as $obj)
            <tr>
                <td>{!! $obj->id !!}</td>
                <td>
                    <div class="mb-1">
                        <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM"
                             class="border mr-1"> {!! $obj->title_tm !!}
                    </div>
                    <div class="mb-1">
                        <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS"
                             class="border mr-1"> {!! $obj->title_ru !!}
                    </div>
                    <div class="">
                        <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="ENG"
                             class="border mr-1"> {!! $obj->title_en !!}
                    </div>

                </td>
                <td>
                    @if($obj->img)
                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("serviceAbout/admin/".$obj->img) !!}"
                         alt="{{ $obj->img }}"
                         class="img-fluid image_upload img-max border">
                        @else
                        <img src="{{ asset('front/placeholder.jpg') }}"
                             alt=""
                             class="img-fluid image_upload img-max border">
                        @endif
                </td>
                <td>
                    <a href="{{ route('admin.serviceAbout.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                        <i class="fas fa-pen"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center bg-light text-secondary">
                    <i class="fas fa-exclamation-circle"></i> @lang('transFront.abouts') @lang('transAdmin.not-found')
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>


@endsection