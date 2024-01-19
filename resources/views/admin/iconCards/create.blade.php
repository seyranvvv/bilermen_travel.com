@extends('admin.layouts.app')
@section('title') @lang('transAdmin.sliders') @endsection
@section('content')


    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.sliders.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.sliders')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.create')
        </div>
    </div>

    <div class="my-4">
        <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}


            <div class="form-group row">
                <label for="title_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">

                    @lang('transAdmin.title') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_tm" type="text"
                           class="form-control{{ $errors->has('title_tm') ? ' is-invalid' : '' }}" name="title_tm"
                           value="{{ old('title_tm') }}">
                    @if ($errors->has('title_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title_tm') }}</strong>
                            </span>
                    @endif
                </div>
            </div>




            <div class="form-group row">
                <label for="url" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.url')
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="url" type="text"
                           class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url"
                           value="{{ old('url') }}">
                    @if ($errors->has('url'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="body_tm" class="col-lg-3 col-md-3 col-form-label text-md-right">

                    @lang('transAdmin.body')
                </label>
                <div class="col-lg-7 col-md-9">
                    <textarea id="body_tm"
                              class="form-control{{ $errors->has('body_tm') ? ' is-invalid' : '' }} summernote"
                              name="body_tm" rows="3">{{ old('body_tm') }}</textarea>
                    @if ($errors->has('body_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body_tm') }}</strong>
                            </span>
                    @endif
                </div>
            </div>




            <div class="form-group row">
                <label for="image_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">

                    @lang('transAdmin.image') <span class="text-secondary">(1920x989)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('assets/webp/Untitled-2.png') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid image_tm_upload img-max border">
                    </div>
                    <div class="custom-file">
                        <input id="image_tm" type="file"
                               class="custom-file-input {{ $errors->has('image_tm') ? ' is-invalid' : '' }}"
                               name="image_tm" accept="image/*" onChange="image_tmUpload(this);">
                        <label class="custom-file-label" for="image_tm">. . .</label>
                    </div>
                    @if ($errors->has('image_tm'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_tm') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_tmUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image_tm').next('label').text(label);
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
                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlActive" name="status"
                               value="1">
                        <label class="custom-control-label" for="customControlActive">
                            @lang('transAdmin.enable')
                        </label>
                    </div>
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