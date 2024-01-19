@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transFront.why-choose-us')</div>
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
                             class="border mr-1"> {!! $obj->name_tm !!}
                    </div>
                    <div class="mb-1">
                        <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS"
                             class="border mr-1"> {!! $obj->name_ru !!}
                    </div>
                    <div class="">
                        <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="ENG"
                             class="border mr-1"> {!! $obj->name_en !!}
                    </div>

                </td>
                <td>
                    <img src="{{ Storage::disk('local')->url('why-choose-us/admin/'.$obj->img) }}" width="100 px">
                </td>
                <td>
                    <a href="{{ route('admin.why-choose-us.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                        <i class="fas fa-pen"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center bg-light text-secondary">
                    <i class="fas fa-exclamation-circle"></i> @lang('transFront.why-choose-us') @lang('transAdmin.not-found')
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>


@endsection
