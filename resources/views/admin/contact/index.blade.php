@extends('admin.layouts.app')
@section('title')
    @lang('transFront.contact')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transFront.contact')</div>
    </div>

    <table class="table shadow table-bordered table-striped table-hover table-md bg-white mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('transAdmin.address')</th>
                <th>@lang('transFront.email')</th>

                <th>@lang('transFront.phone')</th>
                <th>Fax</th>
                <th>@lang('transFront.type')</th>
                <th><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            @forelse($objs as $obj)
                <tr>
                    <td>{!! $obj->id !!}</td>
                    <td>
                        <div class="mb-1">
                            <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1"> {!! $obj->adress_tm !!}
                        </div>
                        <div class="mb-1">
                            <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS" class="border mr-1"> {!! $obj->adress_ru !!}
                        </div>
                        <div class="">
                            <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="ENG" class="border mr-1"> {!! $obj->adress_en !!}
                        </div>
                    </td>

                    <td>
                        <div class="mb-1">
                            {!! $obj->email !!}
                        </div>
                    </td>




                    <td>
                        <div class="mb-1">
                            {!! $obj->phone !!}<br>
                            {!! $obj->phone1 !!}
                        </div>
                    </td>
                    <td>
                        <div class="mb-1">
                            {!! $obj->fax !!}
                        </div>
                    </td>
                    <td>
                        @lang('transFront.' . $obj->type)
                    </td>
                    <td>
                        <a href="{{ route('admin.contact.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center bg-light text-secondary">
                        <i class="fas fa-exclamation-circle"></i> @lang('transFront.contact') @lang('transAdmin.not-found')
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
