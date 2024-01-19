@extends('admin.layouts.app')

@section('content')
    <link href="{{ asset('admin/css/summernote/summernote-lite.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/summernote-lite.js') }}"></script>

    <link href="{{ asset('admin/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>


    <div class="card">
        <div class="card-header">
            Makalany üýtget
            <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-secondary pull-right"><i class="fa fa-bars mr-1" aria-hidden="true"></i> Makalalar</a>
        </div>
        <div class="card-body">

            <form action="{{ route ('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data" class="row">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}

                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="RUS" class="border mr-1 mb-2">
                        @lang('transAdmin.title')
                        <input type="text" class="form-control" name="title_tm" required autofocus value="{{ $post->title_tm }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="RUS" class="border mr-1 mb-2">
                        @lang('transAdmin.title')
                        <input type="text" class="form-control" name="title_ru"value="{{ $post->title_ru }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mazmuny</label>
                        <textarea name="body_tm" class="form-control summernote" rows="10" required>{{ $post->body_tm }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mazmuny (ru)</label>
                        <textarea name="body_ru" class="form-control summernote" rows="10" >{{ $post->body_ru }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="RUS" class="border mr-1 mb-2">
                        @lang('transAdmin.title')
                        <input type="text" class="form-control" name="title_en"  value="{{ $post->title_en }}">
                    </div>
                    <div class="form-group">

                        @lang('transAdmin.body')
                        <textarea name="body_en" class="form-control summernote" rows="10" >{{ $post->body_en }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Makalanyň suraty (770x410)</label>
                        @if($post->img)
                            <div class="mb-2">
                                <img src="{{ Storage::disk('local')->url("post/admin/".$post->img) }}" style="max-height: 150px;"/>
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>@lang('transAdmin.datetime')</label>
                        <input type="text" value="{{ $post->datetime }}" name="datetime" class="form_datetime form-control">
                    </div>


                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlActive" name="active" value="1" {{ $post->active == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlActive">
                                @lang('transAdmin.status')
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

    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            minView: 2,
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true,
            todayHighlight : true
        });
    </script>
@endsection
