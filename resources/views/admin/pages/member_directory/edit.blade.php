@extends('admin.layouts.default')
@section('title', 'Member Directory')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Member Directory</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Member Directory</li>
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
                            <form action="{{ route('memberdirectory.update',$member->id)}}" id="member" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Name</label>
                                            <input type="text" name="name" value="{{$member->name}}" class="form-control" placeholder="Enter Name...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="prin_title">Image</label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="{{ asset('assets/web/images/'.$member->image) }}" width="55" height="70">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Company</label>
                                            <input type="text" name="company" value="{{$member->company}}" class="form-control" placeholder="Enter Company...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Position</label>
                                            <input type="text" name="position" value="{{$member->position}}" class="form-control" placeholder="Enter Position...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Member Type</label>
                                            <select name="member_type" class="form-control" id="">
                                                <option value="Industry Sector" @if($member->member_type=="Industry Sector") selected @endif>Industry Sector</option>
                                                <option value="Advocacy" @if($member->member_type=="Advocacy") selected @endif>Advocacy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Linkedin</label>
                                            <input type="text" name="linkedin" value="{{$member->linkedin}}" class="form-control" placeholder="Enter Lindedin url...">
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
    $('#member').validate({ 
        rules: {
            name: {
                required: true,
            },
            company: {
                required: true,
            },
            position: {
                required: true,
            },
            linkedin: {
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