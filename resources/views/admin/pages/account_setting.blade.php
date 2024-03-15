@extends('admin.layouts.default')
@section('title', 'Account Setting')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Account Setting</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                      <li class="breadcrumb-item active">Account Setting</li>
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
                  <form id="webSetting" action="{{ route('update.setting',$setting->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Current Password</label>
                                <input type="password" id="current_password" class="form-control" name="current_password"
                                    placeholder="Enter current password...">
                                @error('current_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <span id="check_current_password"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">New Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Enter new password...">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 error-placeholder">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="password_confirmation"
                                    placeholder="Enter password again...">
                                @error('confirm_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group errorshow">
                                <label for="prin_title">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email..." value="{{ $setting->email }}">
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
  $('#webSetting').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            current_password: {
                required: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password"
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

     $("body").on("keyup", "#current_password", function (e) {
	    e.preventDefault();
        let current_password = $('#current_password').val();
        $.ajax({
            method: "Post",
            url: 'check-password',
            dataType: 'html',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'current_password': current_password,
            },
            success: function (response) {
                if (response == "false") {
                    $("#check_current_password").html(
                        "<font color=red>The current password is incorrect.</font>");
                } else if (response == "true") {
                    $("#check_current_password").html(
                        "<font color=green>The current password is correct.</font>");
                }
            }
        });
    });
</script>
@endpush
