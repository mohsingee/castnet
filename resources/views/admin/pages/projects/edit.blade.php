@extends('admin.layouts.default')
@section('title', 'Projects')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Projects</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
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
                            <form action="{{ route('listofpro.update',$section->id)}}" id="projects" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title..." value="{{ $section->title }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="prin_title">Image</label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="{{ asset('assets/web/images/'.$section->image) }}" width="55" height="70">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Description</label>
                                            <textarea name="description" class="summernote">{!! $section->description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Button Text</label>
                                            <input type="text" name="btn_text" class="form-control" value="{{$section->btn_text}}" placeholder="Enter Button Text...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Button Link</label>
                                            <input type="text" name="btn_link" class="form-control" value="{{$section->btn_link}}" placeholder="Enter Button Link...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Project Industry Sector</label>
                                            <select name="pro_industry_sector" class="form-control">
                                                <option value="Technology" @if($section->pro_detail->pro_industry_sector=="Technology") selected @endif>Technology</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Project Or Service</label>
                                            <select name="pro_or_ser" class="form-control">
                                                <option value="Product" @if($section->pro_detail->pro_or_ser=="Product") selected @endif>Product</option>
                                                <option value="Service" @if($section->pro_detail->pro_or_ser=="Service") selected @endif>Service</option>
                                            </select>
                                        </div>
                                    </div>                                  
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="region_country">Region/Country</label>
                                            <input type="text" name="region_country" value="{{$section->pro_detail->region_country}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Funded (Yes/No)</label>
                                            <select name="funded" class="form-control">
                                                <option value="Yes" @if($section->pro_detail->funded=="Yes") selected @endif>Yes</option>
                                                <option value="No" @if($section->pro_detail->funded=="No") selected @endif>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Summary Of Scope</label>
                                            <input type="text" value="{{$section->pro_detail->summary_of_scope}}" name="summary_of_scope" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="field_wrapper"></div>
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
    $('#projects').validate({ 
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            btn_text: {
                required: true,
            },
            btn_link: {
                required: true,
            },
            pro_industry_sector: {
                required: true,
            },
            pro_or_ser: {
                required: true,
            },
            region_country: {
                required: true,
            },
            funded: {
                required: true,
            },
            summary_of_scope: {
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