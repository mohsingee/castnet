@extends('admin.layouts.default')
@section('title', 'Rules Of Engagement')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rules Of Engagement Section 2</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Rules of engagement</li>
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
                            <form action="{{ route('roe.update', $section2->id) }}" id="rules" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" value="{{ $section2->title }}" class="form-control" placeholder="Enter Title...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Sub Title</label>
                                            <input type="text" name="sub_title" value="{{ $section2->sub_title }}" class="form-control" placeholder="Enter Sub Title...">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Image</label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>                                    
                                    <div class="col-sm-3">
                                        <img src="{{ asset('assets/web/images/'.$section2->image)}}" height="90" width="80">
                                    </div>                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" id="summernote">{!! $section2->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background:none;">
                                    <button id="sectionslist" type="submit" class="btn btn-sm btn-primary" style="float: right;">Save changes</button>
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
    $('#rules').validate({ 
        rules: {
            title: {
                required: true,
            },
            sub_title: {
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