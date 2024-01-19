@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.aboutBanner.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.baner')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>
    <div class="my-4">

        <form action="{{ route ('admin.aboutBanner.update', $obj->id) }}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}


            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-lg-4 col-md-4 col-form-label text-md-right">@lang('transFront.type')</label>
                <select name="type" required class="form-control col-lg-4 col-md-8" id="exampleFormControlSelect1">
                    <option {{$obj->type == 'about' ? 'selected' : ''}} value="about">@lang('transFront.about')</option>
                    <option {{$obj->type == 'logistics' ? 'selected' : ''}} value="logistics">@lang('transFront.logistics')</option>
                    <option {{$obj->type == 'advertisement' ? 'selected' : ''}} value="advertisement">@lang('transFront.advertisement')</option>
                    <option {{$obj->type == 'travel' ? 'selected' : ''}} value="travel">@lang('transFront.travel')</option>
                </select>
            </div>


            <div class="form-group row">
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') <span class="text-secondary">(1221x310)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        @if($obj->img)
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("aboutBanner/admin/".$obj->img) !!}"
                                 alt="{{ $obj->img }}"
                                 class="img-fluid image_upload img-max border">
                        @else
                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_upload img-max border">
                        @endif
                    </div>
                    <div class="custom-file">
                        <input id="image" type="file"
                               class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                               name="image" accept="image/*" onChange="imageUpload(this);">
                        <label class="custom-file-label" for="image">. . .</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                    <script>
                        function imageUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="form-group row">
                <label for="image_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') RU<span class="text-secondary">(1221x310)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        @if($obj->img_ru)
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("aboutBanner/admin/".$obj->img_ru) !!}"
                                 alt="{{ $obj->img_ru }}"
                                 class="img-fluid image_ru_upload img-max border">
                        @else
                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_ru_upload img-max border">
                        @endif
                    </div>
                    <div class="custom-file">
                        <input id="image_ru" type="file"
                               class="custom-file-input {{ $errors->has('image_ru') ? ' is-invalid' : '' }}"
                               name="image_ru" accept="image/*" onChange="image_ruUpload(this);">
                        <label class="custom-file-label" for="image_ru">. . .</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_ru') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_ruUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image_ru').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_ru_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="form-group row">
                <label for="image_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') En<span class="text-secondary">(1221x310)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        @if($obj->img_en)
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("aboutBanner/admin/".$obj->img_en) !!}"
                                 alt="{{ $obj->img_en }}"
                                 class="img-fluid image_en_upload img-max border">
                        @else
                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_en_upload img-max border">
                        @endif
                    </div>
                    <div class="custom-file">
                        <input id="image_en" type="file"
                               class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                               name="image_en" accept="image/*" onChange="image_enUpload(this);">
                        <label class="custom-file-label" for="image_en">. . .</label>
                    </div>
                    @if ($errors->has('image_en'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_en') }}</strong>
                            </span>
                    @endif
                    <script>
                        function image_enUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image_en').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_en_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>




            <div class="form-group row">
                <div class="custom-control custom-checkbox col-lg-6 col-md-8 col-form-label text-md-right">

                    <input type="checkbox" class="custom-control-input" id="customControlActive" name="active" value="1" {{ $obj->active == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customControlActive">
                        Aktiw
                    </label>
                </div>
            </div>





            {{--submit button--}}
            <div class="form-group row mb-0">
                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-floppy-o mr-1" aria-hidden="true"></i> @lang('transAdmin.save')
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection
