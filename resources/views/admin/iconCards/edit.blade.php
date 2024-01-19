@extends('admin.layouts.app')
@section('title') @lang('transAdmin.iconCards') @endsection
@section('content')

    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.iconCards.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.iconCards')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>

    <div class="my-4">
        <form action="{{ route('admin.iconCards.update', $obj->id) }}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}





<div class="form-group row">
                <label for="text" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.body') TM<span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="text" type="text"
                           class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text"
                           value="{{ $obj->text }}" required>
                    @if ($errors->has('text'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('text') }}</strong>
                            </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="text_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.body') RU<span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="text_ru" type="text"
                           class="form-control{{ $errors->has('text_ru') ? ' is-invalid' : '' }}" name="text_ru"
                           value="{{ $obj->text_ru }}">
                    @if ($errors->has('text_ru'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('text_ru') }}</strong>
                            </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="text_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.body') En <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="text_en" type="text"
                           class="form-control{{ $errors->has('text_en') ? ' is-invalid' : '' }}" name="text_en"
                           value="{{ $obj->text_en }}" >
                    @if ($errors->has('text_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('text_en') }}</strong>
                            </span>
                    @endif
                </div>
            </div>



            <div class="form-group row">
                <label for="name" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.title') TM<span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="name" type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                           value="{{ $obj->name }}" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="name_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.title') RU<span class="text-danger">*</span>
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
                    @lang('transAdmin.title') En <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="name_en" type="text"
                           class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en"
                           value="{{ $obj->name_en }}" >
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_en') }}</strong>
                            </span>
                    @endif
                </div>
            </div>



            <div class="form-group row">
                <label for="counter" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.counter')
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="counter" type="integer"
                           class="form-control{{ $errors->has('counter') ? ' is-invalid' : '' }}" name="counter"
                           value="{{ $obj->counter ?? 1 }}" required>
                    @if ($errors->has('counter'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('counter') }}</strong>
                            </span>
                    @endif
                </div>
            </div>





            <div class="form-group row">
                <label for="image_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') <span class="text-secondary"></span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        @if($obj->icon)
                            <img src="{{ Storage::disk('local')->url('icon/'.$obj->icon) }}"
                                 alt="{{ $obj->icon }}"
                                 class="img-fluid image_tm_upload img-max border">
                        @else
                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_tm_upload img-max border">
                        @endif
                    </div>
                    <div class="custom-file">
                        <input id="icon" type="file"
                               class="custom-file-input {{ $errors->has('icon') ? ' is-invalid' : '' }}"
                               name="icon" accept="image/*" onChange="image_tmUpload(this);">
                        <label class="custom-file-label" for="icon">. . .</label>
                    </div>
                    @if ($errors->has('image_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('icon') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_tmUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#icon').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_tm_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>


            <div class="form-group row">
                <label for="after_after_text" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    after text <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="after_text" type="text"
                           class="form-control{{ $errors->has('after_text') ? ' is-invalid' : '' }}" name="after_text"
                           value="{{ $obj->after_text }}" required>
                    @if ($errors->has('after_text'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('after_text') }}</strong>
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
@endsection