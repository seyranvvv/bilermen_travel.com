@extends('admin.layouts.app')
@section('content')
    <link href="{{ asset('admin/css/summernote/summernote-lite.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/summernote-lite.js') }}"></script>

    <link href="{{ asset('admin/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>

    <div class="card">
        <div class="card-header">

            <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary pull-right"><i class="fa fa-bars mr-1" aria-hidden="true"></i>@lang('transFront.news')</a>
        </div>
        <div class="card-body">

            <form action="{{ route ('admin.product.store') }}" method="post" enctype="multipart/form-data" class="row">
                {!! csrf_field() !!}
                <div class="col-md-6 pb-3">

                        @lang('transAdmin.category')
                        <select id="category_id"
                                class="form-control select2"
                                name="category_id">
                            <option value="{{NULL}}" SELECTED>-</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->getName() }}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="col-md-6 pb-3">

                    @lang('transAdmin.stars')
                    <input value="1" type="number" min="1" max="5" class="form-control" name="stars">
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="RUS" class="border mr-1 mb-2">
                        @lang('transAdmin.title')
                        <input type="text" class="form-control" name="title_tm" required autofocus>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS" class="border mr-1 mb-2">
                        @lang('transAdmin.title')
                        <input type="text" class="form-control" name="title_ru">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        @lang('transAdmin.body')
                        <textarea name="body_tm" class="form-control summernote" rows="10" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        @lang('transAdmin.body')
                        <textarea name="body_ru" class="form-control summernote" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        @lang('transAdmin.description')
                        <textarea name="description_tm" class="form-control summernote" rows="10" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        @lang('transAdmin.description')
                        <textarea name="description_ru" class="form-control summernote" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="RUS" class="border mr-1 mb-2">
                        @lang('transAdmin.title')
                        <input type="text" class="form-control" name="title_en">
                    </div>
                    <div class="form-group">

                        @lang('transAdmin.body')
                        <textarea name="body_en" class="form-control summernote" rows="10"></textarea>
                    </div>

                    <div class="form-group">

                        @lang('transAdmin.description')
                        <textarea name="description_en" class="form-control summernote" rows="10"></textarea>
                    </div>
                </div>



                <div class="col-md-6">


                    <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                        @lang('transAdmin.image') <span class="text-secondary">(570x610)</span>
                    </label>
                    <div class="col-lg-8 col-md-8">
                        <div class="mb-3">
                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image_upload img-max border">
                        </div>
                        <div class="custom-file">
                            <input id="image" type="file"
                                   class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                   name="image" onChange="imageUpload(this);">
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

                    <label for="main_img" class="col-lg-4 col-md-4 col-form-label text-md-right">
                        @lang('transAdmin.main_img') <span class="text-secondary">(270x320)</span>
                    </label>
                    <div class="col-lg-8 col-md-8">
                        <div class="mb-3">
                            <img src="{{ asset('front/placeholder.jpg') }}" alt="@lang('transAdmin.not-found')"
                                 class="img-fluid image2_upload img-max border">
                        </div>
                        <div class="custom-file">
                            <input id="main_img" type="file"
                                   class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                   name="main_img" onChange="image2Upload(this);">
                            <label class="custom-file-label" for="image">. . .</label>
                        </div>
                        @if ($errors->has('main_img'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('main_img') }}</strong>
                            </span>
                        @endif
                        <script>
                            function image2Upload(input) {
                                if (input.files && input.files[0]) {
                                    var label = input.files[0].name;
                                    $('#main_img').next('label').text(label);
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('.image2_upload').attr('src', e.target.result);
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>


                    {{--<div class="form-group">--}}
                        {{--<label>@lang('transAdmin.barcode')</label>--}}
                        {{--<input type="text" name="barcode" class=" form-control">--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label>@lang('transAdmin.price')</label>--}}
                        {{--<input value="1" type="number" step="0.01"  name="price" class=" form-control">--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlActive" name="active" value="1">
                            <label class="custom-control-label" for="customControlActive">
                                Aktiw
                            </label>
                        </div>
                    </div>

                </div>



                {{--submit button--}}
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-floppy-o mr-1" aria-hidden="true"></i> @lang('transAdmin.save')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // $('.summernote').summernote({
        //     tabsize: 2,
        //     height: 200
        // });
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
