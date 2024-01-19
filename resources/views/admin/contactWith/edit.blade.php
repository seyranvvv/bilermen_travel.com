@extends('admin.layouts.app')
@section('content')
    <link href="{{ asset('admin/css/summernote/summernote-lite.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/summernote-lite.js') }}"></script>
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.contactWith.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transFront.contact-us')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>

    <div class="my-4">
        <form action="{{ route('admin.contactWith.update', $obj->id) }}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label for="title_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_tm" type="text"
                           class="form-control{{ $errors->has('title_tm') ? ' is-invalid' : '' }}" name="title_tm"
                           value="{{ $obj->title_tm }}" required    >
                    @if ($errors->has('title_tm'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_tm') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="title_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger"></span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_ru" type="text"
                           class="form-control{{ $errors->has('title_ru') ? ' is-invalid' : '' }}" name="title_ru"
                           value="{{ $obj->title_ru }}">
                    @if ($errors->has('title_ru'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_ru') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="title_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="ENG" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger"></span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_en" type="text"
                           class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en"
                           value="{{ $obj->title_en }}" >
                    @if ($errors->has('title_en'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_en') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="body_tm" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="body_tm"
                              class="form-control{{ $errors->has('body_tm') ? ' is-invalid' : '' }} summernote"
                              name="body_tm" rows="3">{{ $obj->body_tm }}</textarea>
                    @if ($errors->has('body_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body_tm') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="body_ru" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="body_ru"
                              class="form-control{{ $errors->has('body_ru') ? ' is-invalid' : '' }} summernote"
                              name="body_ru" rows="3">{{ $obj->body_ru }}</textarea>
                    @if ($errors->has('body_ru'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body_ru') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="body_en" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="body_en"
                              class="form-control{{ $errors->has('body_en') ? ' is-invalid' : '' }} summernote"
                              name="body_en" rows="3">{{ $obj->body_en }}</textarea>
                    @if ($errors->has('body_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body_en') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            {{--submit button--}}
            <div class="form-group row mb-0">
                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> @lang('transAdmin.save')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('.summernote').summernote({
            tabsize: 2,
            height: 200
        });
    </script>
    <style>
        .note-group-select-from-files {
            display: none;
        }
        .note-icon-picture {
            display: none;
        }
        .note-icon-video {
            display: none;
        }
    </style>
@endsection