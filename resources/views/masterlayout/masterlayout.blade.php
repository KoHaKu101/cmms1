<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
		<div class="main-header">

      @yield('Logoandnavbar')

		</div>

    @yield('sidebar')

    <div class="main-panel">
    @yield('contentandfooter')

    </div>

	</div>
	<!--   Core JS Files   -->
	<script type="text/javascript" src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>




	<!-- jQuery Sparkline -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>



	<!-- Datatables -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- jQuery Vector Maps -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Sweet Alert -->
	<script type="text/javascript" src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script type="text/javascript" src="{{ asset('assets/js/atlantis.min.js') }}"></script>


@yield('javascript')

</body>
</html>
