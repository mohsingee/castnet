@extends('admin.layouts.default')
@section('title', 'Edit Section 1')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Section 1</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                            <form action="{{ route('homesection1.update',$section1->id)}}" id="section1" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Update Image</label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <img style="background-color:black;" src="{{ asset('assets/web/images/'.$section1->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Heading</label>
                                                <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="{{ $section1->heading }}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label>Button Text</label>
                                            <input type="text" name="button" placeholder="Enter Button Text" class="form-control" value={{ $section1->button }}>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label>Button Link</label>
                                            <input type="text" name="buttonlink" placeholder="Enter Button Link" pattern="^#|https?://\S+$" value={{ $section1->buttonlink }} class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description" style="resize: none;">{{ $section1->description }}
                                            </textarea>
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
    $('#section1').validate({ 
        rules: {
            heading: {
                required: true,
            },
            description: {
                required: true,
            },
            button: {
                required: true,
            },
            buttonlink: {
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