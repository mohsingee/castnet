@extends('admin.layouts.default')
@section('title','Contact Us')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Contact Us Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('contactus.update',$contact->id) }}" id="contactus" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Phone 1</label>
                                            <input type="text" name="phone1" class="form-control" placeholder="Enter Phone 1..." value="{{ $contact->phone1 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="prin_title">Phone 2</label>
                                            <input type="text" name="phone2" class="form-control" placeholder="Enter Phone 2..." value="{{ $contact->phone2 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Email 1</label>
                                            <input type="email" name="email1" class="form-control" placeholder="Enter Email 1..." value="{{ $contact->email1 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="prin_title">Email 2</label>
                                            <input type="email" name="email2" class="form-control" placeholder="Enter Email 2..." value="{{ $contact->email2 }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter Address..." value="{{ $contact->address }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Google Map Src</label>
                                            <textarea name="map" id="" class="form-control" cols="30" rows="3" placeholder="Enter Map Src...">{{ $contact->map }}</textarea>
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
    $('#contactus').validate({ 
        rules: {
            phone1: {
                required: true,
            },
            email1: {
                required: true,
            },
            address: {
                required: true,
            },
            map: {
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