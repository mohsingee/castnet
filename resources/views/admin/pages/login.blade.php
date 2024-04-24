<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Castnet | Log in</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="{{ asset('/assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="shortcut icon" href="{{ asset('assets/web/images/favicon.png') }}">
	<style>
        .message {
            align-items: center !important;
            justify-content: center !important;
            position: absolute;
            width: 100%;
            z-index: 99;
            display: flex;
            top: 50px;
        }
    </style>
</head>
<body class="hold-transition login-page">
	<div class="message">
		@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ strtoupper(session()->get('success')) }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		@if (session()->has('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ strtoupper(session()->get('error')) }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
	</div>
	<div class="login-box">
		<div class="login-logo"> Admin Castnet </div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<form action="{{ route('login') }}" method="post" id="login">
					@csrf
					<div class="input-group mb-3 errorshow">
						<input type="email" name="email" class="form-control" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
						</div>
					</div>
					<div class="input-group mb-3 errorshow">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text"> <span class="fas fa-lock"></span> </div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('/assets/admin/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('/assets/admin/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
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
</body>
</html>