@extends('admin.layouts.default')
@section('title', 'Event Calender')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Event Calender Section 1</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Events</li>
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
                            <form action="{{ route('event-calender.store') }}" id="calender" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter event title...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Event date</label>
                                            <input type="date" name="event_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">From Time</label>
                                            <input type="Time" name="from_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">To Time</label>
                                            <input type="Time" name="to_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Event Category</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="" selected disabled>Select Category</option>
                                                <option value="1">Chamber Events</option>
                                                <option value="2">Community Events</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Location</label>
                                            <input type="text" name="location" class="form-control" placeholder="Enter events location...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Description</label>
                                            <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background:none;">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
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
    $('#calender').validate({ 
        rules: {
            title: {
                required: true,
            },
            event_date: {
                required: true,
            },
            from_time: {
                required: true,
            },
            to_time: {
                required: true,
            },
            category: {
                required: true,
            },
            location: {
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