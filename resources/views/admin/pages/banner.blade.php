@extends('admin.layouts.default')
@section('title',$banner->title)
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$banner->title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Banner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <form action="{{ route('banner.update',$banner->id) }}" method="post" id="banner" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Page Title</label>
                                            <input type="text" name="title" value="{{$banner->title}}" placeholder="Enter the page title..." class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Banner Image <span class="text-danger">(1920 x 546)</span></label>
                                            <input type="file" name="image" class="form-control" id="">
                                            <input type="hidden" name="type" value="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="{{ asset('assets/web/images/'.$banner->image) }}" width="80" height="50">
                                    </div>
                                </div>
                                <div class="card-footer" style="background:none;">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
<script>
    $('#banner').validate({
        rules: {
            title: {
                required: true,
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.errorshow').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
</script>
@endpush
