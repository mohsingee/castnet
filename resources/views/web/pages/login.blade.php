@extends('web.layouts.default')
@section('content')
<!-- Breadcrumb Start -->
<section class="section_breadcrumb login_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="breadcrumb_title">login</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!-- Login Start -->
<section class="section_block">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="login_form" data-aos="zoom-in" data-aos-duration="1000">
                    <h2 class="form_title">Log in to your account</h2>
                    <form action="{{ route('login') }}" method="post" id="login">
                        @csrf
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group mt-3">
                            <input type="password" name="password" id="passinput" class="form-control border-end-0" placeholder="Password">
                            <span class="input-group-text" onclick="showPassword()">
                                <img src="{{asset('assets/web/images/icon_eye.png')}}" alt="eye">
                            </span>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-login">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login End -->
@stop
@push('scripts')
<script>
    function showPassword(){
        var passwordField = $('#passinput');
        var fieldType = passwordField.attr('type');
        if (fieldType === 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        } 
    }
    
    $('#login').validate({ 
        rules: {
            email: {
                required: true,
            },
            password: {
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