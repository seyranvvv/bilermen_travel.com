@extends('admin.layouts.app')
@section('title')
    @lang('transFront.district')
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/summernote-bs4.css') }}" />
    <script type="text/javascript" src="{{ asset('admin/js/summernote-bs4.js') }}"></script>
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.districts.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transFront.district')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>

    <div class="my-4">
        <form action="{{ route('admin.districts.update', $obj->id) }}" method="post">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label for="name_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="name_tm" type="text"
                        class="form-control{{ $errors->has('name_tm') ? ' is-invalid' : '' }}" name="name_tm"
                        value="{{ $obj->name_tm }}" required>
                    @if ($errors->has('name_tm'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_tm') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="name_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="name_ru" type="text"
                        class="form-control{{ $errors->has('name_ru') ? ' is-invalid' : '' }}" name="name_ru"
                        value="{{ $obj->name_ru }}">
                    @if ($errors->has('name_ru'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_ru') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="name_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="ENG" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="name_en" type="text"
                        class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en"
                        value="{{ $obj->name_en }}">
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_en') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transFront.phone') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="phone" type="tel"
                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                        value="{{ $obj->phone }}" required>
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>



            <div class="form-group row">
                <label for="adress_tm" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.address')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="adress_tm" class="form-control{{ $errors->has('adress_tm') ? ' is-invalid' : '' }} summernote"
                        name="adress_tm" rows="3">{{ $obj->address_tm }}</textarea>
                    @if ($errors->has('adress_tm'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('adress_tm') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="adress_ru" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.address')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="adress_ru" class="form-control{{ $errors->has('adress_ru') ? ' is-invalid' : '' }} summernote"
                        name="adress_ru" rows="3">{{ $obj->address_ru }}</textarea>
                    @if ($errors->has('adress_ru'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('adress_ru') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="adress_en" class="col-lg-3 col-md-3 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.address')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="adress_en" class="form-control{{ $errors->has('adress_en') ? ' is-invalid' : '' }} summernote"
                        name="adress_en" rows="3">{{ $obj->address_en }}</textarea>
                    @if ($errors->has('adress_en'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('adress_en') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- submit button --}}
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
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
    </script>
@endsection
