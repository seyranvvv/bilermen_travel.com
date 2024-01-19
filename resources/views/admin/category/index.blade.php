@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transAdmin.category')</div>
        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-plus"></i> @lang('transAdmin.category')
        </a>
    </div>

    <table class="table shadow table-bordered table-striped table-hover table-md bg-white mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>@lang('transAdmin.name')</th>
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
                    <a href="{{ route('admin.category.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                        <i class="fas fa-pen"></i>
                    </a>
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
                                        "{{ $obj->getName() }}" @lang('transAdmin.are-you-sure-want-to-delete')
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-right">
                                    <form action="{{ route('admin.category.delete', $obj->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="button" class="btn btn-sm btn-success"
                                                data-dismiss="modal">@lang('transAdmin.cancel')
                                        </button>
                                        <button type="submit"
                                                class="btn btn-dark btn-sm">@lang('transAdmin.delete')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center bg-light text-secondary">
                    <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.category') @lang('transAdmin.not-found')
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="mb-4">
        {!! $objs->links() !!}
    </div>
@endsection