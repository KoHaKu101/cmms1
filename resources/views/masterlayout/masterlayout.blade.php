<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	@yield('meta')
	<title>@yield('tittle')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="{{asset ('assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset ('/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
	WebFont.load({
		google: {"families":["Lato:300,400,700,900"]},
		custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/assets/css/fonts.min.css']},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

  @yield('css')

</head>

<body >
	<div class="wrapper sidebar_minimize">
		@if ($errors->count() > 0)
			<div id="Errorsystem" style="display:none;" class="alert alert-danger">
				@foreach ($errors->all() as $error)
						{{ $error }}<br/>
				@endforeach
			</div>
		@endif
		<div class="main-header">

      @yield('Logoandnavbar')

		</div>

    @yield('sidebar')

    <div class="main-panel">
    @yield('contentandfooter')

    </div>

	</div>
	<!--   Core JS Files   -->
	<script type="text/javascript" src="{{ asset('/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script type="text/javascript" src="{{ asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script type="text/javascript" src="{{ asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- jQuery Sparkline -->
	<script type="text/javascript" src="{{ asset('/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>



	<!-- Datatables -->
	<script type="text/javascript" src="{{ asset('/assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('/assets/js/plugin/sweetalert/sweetalert2.js') }}"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

	<script type="text/javascript" src="{{ asset('/js/dashboard/notifity.js') }}"></script>
	@include('/errorsweetalert/errormessed')
	{{-- <script type="text/javascript" src="{{ asset('/js/errorsweetalert/errormessed.js') }}"></script> --}}


	<script type="text/javascript" src="{{ asset('assets/js/atlantis.min.js') }}"></script>
		@include('sweetalert::alert')


@yield('javascript')

</body>
</html>
