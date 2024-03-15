@extends('admin.layouts.default')
@section('title', 'Job Openings')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Job</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Job Openings</li>
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
                            <form action="{{ route('jobs.store')}}" id="jobs" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Job Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Job Title...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Job Location</label>
                                            <input type="text" name="job_location" class="form-control" placeholder="Enter Job Location...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Job Description" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 errorshow">
                                        <label>Job Detail</label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary1" name="duration[]" value="Temporary">
                                                <label for="checkboxPrimary1">Temporary</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary2" name="duration[]" value="Contract">
                                                <label for="checkboxPrimary2">Contract</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary3" name="duration[]" value="Part-Time">
                                                <label for="checkboxPrimary3">Part-Time</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary4" name="duration[]" value="Hybrid">
                                                <label for="checkboxPrimary4">Hybrid</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary5" name="duration[]" value="Remote">
                                                <label for="checkboxPrimary5">Remote</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary6" name="duration[]" value="Operations">
                                                <label for="checkboxPrimary6">Operations</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary7" name="duration[]" value="Finance">
                                                <label for="checkboxPrimary7">Finance</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary8" name="duration[]" value="Legal">
                                                <label for="checkboxPrimary8">Legal</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary9" name="duration[]" value="Administrative">
                                                <label for="checkboxPrimary9">Administrative</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary10" name="duration[]" value="Technology">
                                                <label for="checkboxPrimary10">Technology</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary11" name="duration[]" value="Communications">
                                                <label for="checkboxPrimary11">Communications</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary12" name="duration[]" value="Human Resources">
                                                <label for="checkboxPrimary12">Human Resources</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background:none;">
                                    <button id="sectionslist" type="submit" class="btn btn-sm btn-primary" style="float: right;">Save</button>
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
    $('#jobs').validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            job_location: {
                required: true,
            },
            'duration[]':{
                required: true,
            },
        },
        messages: {
            'duration[]': {
                required: "You must check at least 1 checkbox"
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

