@extends('admin.layouts.default')
@section('title', 'Join')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Join</li>
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
                            <form action="{{ route('join-form-setting.update',$join->id) }}" id="join" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title..." value="{{ $join->dropdowns }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label>Select</label>
                <select class="form-control" name="dropdown_menu">
                    <option selected disabled>Select Dropdown Menu</option>
                    <option value="member_level" {{ $join->type == 'member_level' ? 'selected' : '' }}>Member Level</option>
                    <option value="business_description" {{ $join->type == 'business_description' ? 'selected' : '' }}>Business Description</option>
                    <option value="ownership_structure" {{ $join->type == 'ownership_structure' ? 'selected' : '' }}>Ownership Structure</option>
                    <option value="reason_for_joining" {{ $join->type == 'reason_for_joining' ? 'selected' : '' }}>Reason For Joining</option>
                </select>
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
    $('#join').validate({
        rules: {
            title: {
                required: true,
            },
            description: {
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
