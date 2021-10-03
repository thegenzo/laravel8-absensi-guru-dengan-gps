<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title') | Sistem Absensi Sekolah</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('/assets/img/icon.ico') }}" type="image/x-icon"/>
	<!-- Jam dan tanggal hari ini -->
	<script src="{{ asset('/assets/js/datetime.js')}}"></script>

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

    @include('include.style')
    @stack('addon-style')
	
</head>
<body data-background-color="bg3" onload=display_ct();>
	<div class="wrapper">
		@include('include.navbar')

		@include('include.sidebar')

		@yield('content')
		
	</div>
</div>
@include('include.script')
@include('sweetalert::alert')

@stack('addon-script')
</body>
</html>