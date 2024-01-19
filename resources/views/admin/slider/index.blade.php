@extends('admin.layouts.app')
@section('title') @lang('transAdmin.sliders') @endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transAdmin.sliders')</div>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-plus"></i> @lang('transAdmin.slider')
        </a>
    </div>

    <table class="table shadow table-bordered table-striped table-hover table-md bg-white mt-4">
        <thead>
        <tr>
            <th>@lang('transAdmin.title')</th>
            <th>@lang('transAdmin.image')</th>
            <th width="25%">@lang('transAdmin.url')</th>
            <th>@lang('transAdmin.status')</th>
            <th><i class="fas fa-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse($objs as $obj)
            <tr>
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
                    @if($obj->image_tm)
                        <img src="{{ Storage::disk('local')->url('sm/'.$obj->image_tm) }}"
                             alt="{{ $obj->image_tm }}"
                             class="img-fluid img-max border">
                    @else
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid img-max border">
                    @endif
                    <hr class="my-1">
                    @if($obj->image_ru)
                        <img src="{{ Storage::disk('local')->url('sm/'.$obj->image_ru) }}"
                             alt="{{ $obj->image_ru }}"
                             class="img-fluid img-max border">
                    @else
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid img-max border">
                    @endif
                    <hr class="my-1">
                    @if($obj->image_en)
                        <img src="{{ Storage::disk('local')->url('sm/'.$obj->image_en) }}"
                             alt="{{ $obj->image_en }}"
                             class="img-fluid img-max border">
                    @else
                        <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid img-max border">
                    @endif
                </td>

                <td>{!! $obj->url !!}</td>
                <td>
                    <span class="badge {{ $obj->status == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                        {{ $obj->status == 1 ? trans('transAdmin.enable'):trans('transAdmin.disable') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.sliders.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                        <i class="fas fa-pen"></i>
                    </a>
                    <br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                            data-target="#d{{ $obj->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="d{{ $obj->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div>
                                        @lang('transAdmin.are-you-sure-want-to-delete')
                                        <div class="mt-2 small">
                                            <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-right">
                                    <form action="{{ route('admin.sliders.delete', $obj->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">@lang('transAdmin.cancel')
                                        </button>
                                        <button type="submit" class="btn btn-dark btn-sm">@lang('transAdmin.delete')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
        {!! $objs->links() !!}
    </div>
@endsection