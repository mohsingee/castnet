@extends('web.layouts.default')
@section('content')
<link rel="stylesheet" href="{{asset('assets/web/css/user_dashboard.css')}}">
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb partners_sponsors_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">User Dashboard</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Dashboard Start -->
    <section class="section_dashboard">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-12">
                    <div class="d-flex flex-column flex-lg-row gap-3">
                        <div class="dashboard_side flex-lg-grow-1">
                            <div class="profile-box">
                                <img src="{{ asset('assets/web/images/dashboard_profile.png') }}" alt="profile" class="profile-img">
                                <h3 class="profile-text mb-3">{{ Auth::user()->first_name }}</h3>
                            </div>
                            <div class="d-flex gap-4 gap-lg-0 align-items-center justify-content-center flex-lg-column flex-wrap w-lg-100 tab-list">
                                <a class="dashboard-link tablinks active" href="{{route('web.user-dashboard')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>Account setting</span>
                                        </div>
                                    </div>
                                </a>
                                @if(auth()->user()->member==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-member')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>member account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(auth()->user()->sponsor==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-sponsor')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>sponser account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(auth()->user()->partner==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-partner')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>partner account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="dashboard_content flex-lg-grow-1">
                            <section class="section_content tabcontent">
                                <div class="container-fluid">
                                    <div class="row mb-5">
                                        <div class="col-12 mt-3">
                                            <h2 class="section_title">Update Password</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form id="passchange" action="{{ route('user.updPass',$setting->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row row-cols-1 row-cols-md-2 gy-4 gx-4">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 errorshow">
                                                        <label class="form-label">Current Password</label>
                                                        <input type="password" id="current_password" class="form-control" name="current_password"
                                                            placeholder="Enter current password...">
                                                        @error('current_password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span id="check_current_password"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 errorshow">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" id="password" class="form-control" name="password"
                                                            placeholder="Enter new password...">
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 errorshow">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="password_confirmation"
                                                            placeholder="Enter password again...">
                                                        @error('confirm_password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 errorshow">
                                                        <label for="prin_title">Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Enter Email..." value="{{ $setting->email }}" readonly disabled>
                                                    </div>
                                                </div>     
                                            </div>
                                            <div class="row justify-content-end form-edit-btns mb-3 mt-3 me-2">
                                                <button type="submit" class="btn btn-primary btn-edit">Save changes</button>
                                            </div>
                                          </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard End -->
@stop
@push('scripts')
<script>
  $('#passchange').validate({
        rules: {
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