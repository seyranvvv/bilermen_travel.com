@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.certificate.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.customer')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>
    <div class="my-4">

        <form action="{{ route('admin.certificate.update', $obj->id) }}" method="post" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}


            <div class="form-group row">
                <label for="exampleFormControlSelect1"
                    class="col-lg-4 col-md-4 col-form-label text-md-right">@lang('transFront.type')</label>
                <select name="type" required class="form-control col-lg-4 col-md-8" id="exampleFormControlSelect1">
                    <option {{ $obj->type == 'about' ? 'selected' : '' }} value="about">@lang('transFront.about')</option>
                    <option {{ $obj->type == 'logistics' ? 'selected' : '' }} value="logistics">@lang('transFront.logistics')</option>
                    <option {{ $obj->type == 'advertisement' ? 'selected' : '' }} value="advertisement">@lang('transFront.advertisement')
                    </option>
                    <option {{ $obj->type == 'travel' ? 'selected' : '' }} value="travel">@lang('transFront.travel')</option>
                    <option {{ $obj->type == 'it' ? 'selected' : '' }} value="it">@lang('transFront.it')</option>
                </select>
            </div>

            <div class="form-group row">
                <label for="title_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="title_tm" type="text"
                        class="form-control{{ $errors->has('title_tm') ? ' is-invalid' : '' }}" name="title_tm"
                        value="{{ $obj->title_tm }}" required>
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
                        value="{{ $obj->title_en }}">
                    @if ($errors->has('title_en'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title_en') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') <span class="text-secondary">(275x410)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        @if ($obj->img)
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('certificate/admin/' . $obj->img) !!}" alt="{{ $obj->img }}"
                                class="img-fluid image_upload img-max border">
                        @else
                            <img src="{{ asset('front/img/iltifat.webp') }}" alt="@lang('transAdmin.not-found')"
                                class="img-fluid image_upload img-max border">
                        @endif
                    </div>
                    <div class="custom-file">
                        <input id="image" type="file"
                            class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"
                            accept="image/*" onChange="imageUpload(this);">
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
                                reader.onload = function(e) {
                                    $('.image_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>




            <div class="form-group row">
                <div class="custom-control custom-checkbox col-lg-6 col-md-8 col-form-label text-md-right">

                    <input type="checkbox" class="custom-control-input" id="customControlActive" name="active"
                        value="1" {{ $obj->active == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customControlActive">
                        Aktiw
                    </label>
                </div>
            </div>





            {{-- submit button --}}
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
