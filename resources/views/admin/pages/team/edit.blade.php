@extends('admin.layouts.default')
@section('title', 'Our Team')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Our Team</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Team</li>
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
                            <form action="{{ route('our-team.update',$team->id) }}" id="team" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Name</label>
                                            <input type="text" name="name" value="{{ $team->name ?? '' }}" class="form-control" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Linkedin Account Link</label>
                                            <input type="text" name="linkedin" value="{{$team->linkedin}}" class="form-control" placeholder="Enter Linkedin account link...">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <img src="{{ asset('assets/web/images/' . $team->image) }}" alt="" width="80" height="80">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Profession</label>
                                            <input type="text" name="profession" value="{{ $team->profession ?? '' }}" class="form-control" placeholder="Enter Profession">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="1" {{ $team->type == 1 ? 'selected' : '' }}>FOUNDER</option>
                                                    <option value="2" {{ $team->type == 2 ? 'selected' : '' }}>BOARD OF DIRECTORS</option>
                                                    <option value="3" {{ $team->type == 3 ? 'selected' : '' }}>MANAGEMENT TEAM</option>
                                                    <option value="4" {{ $team->type == 4 ? 'selected' : '' }}>COUNCIL OF COUNTRY DELEGATES</option>
                                                    <option value="5" {{ $team->type == 5 ? 'selected' : '' }}>COUNCIL OF INDUSTRY ADVISORS</option>
                                                    <option value="6" {{ $team->type == 6 ? 'selected' : '' }}>PROGRAM LEADERS</option>
                                                    <option value="7" {{ $team->type == 7 ? 'selected' : '' }}>STAFF</option>
                                                </select>
                                        </div>
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
    $('#team').validate({
        rules: {
            name: {
                required: true,
            },
            profession: {
                required: true,
            },
            linkedin: {
                required: true,
            },
            type: {
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