<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login | Monitoring Absensi Guru</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('/assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset('/assets/css/fonts.css') }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
    <style>
        #gradient {
            background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 41%, rgba(0,212,255,1) 100%);
        }
    </style>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/azzara.min.css') }}">
</head>
<body class="login">
	<div class="wrapper wrapper-login" style="background-image: url(assets/img/login3.jpg); background-repeat: no-repeat; background-size: cover;">
		<div class="container container-login animated fadeIn">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-5">
					<img src="{{ asset('/assets/img/tutwuri.png') }}" style="width: 100px; height: 100px; margin: auto;">
				</div>
				<div class="col-sm-3"></div>
			</div>
			
			<h3 class="text-center pt-3">Sign In</h3>
			<div class="login-form">
				<form action="/login" method="POST">
					@csrf
					<p class="text-danger text-center">{{ Session::get('error') }}</p>
					<div class="form-group form-floating-label">
						<input id="email" name="email" type="text" class="form-control input-border-bottom" required>
						<label for="email" class="placeholder">Email</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					<div class="form-action mb-3">
						<button class="btn btn-primary btn-rounded btn-login" type="submit">Log in</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/js/ready.js') }}"></script>
</body>
</html>