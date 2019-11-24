<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        @yield('head_title')
    </title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href=" {{ asset('assets/css/icons/icomoon/styles.css') }} " rel="stylesheet" type="text/css">
	<link href=" {{ asset('assets/css/bootstrap.css') }}  " rel="stylesheet" type="text/css">
	<link href=" {{ asset('assets/css/core.css') }} " rel="stylesheet" type="text/css">
	<link href=" {{ asset('assets/css/components.css') }}  " rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.css') }}   " rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src=" {{ asset('assets/js/plugins/loaders/pace.min.js') }}  "></script>
	<script type="text/javascript" src=" {{ asset('assets/js/core/libraries/jquery.min.js') }}  "></script>
	<script type="text/javascript" src=" {{ asset('assets/js/core/libraries/bootstrap.min.js') }}  "></script>
	<script type="text/javascript" src=" {{ asset('assets/js/plugins/loaders/blockui.min.js') }}  "></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src=" {{ asset('assets/js/plugins/ui/moment/moment.min.js') }} "></script>
	<script type="text/javascript" src=" {{ asset('assets/js/plugins/pickers/daterangepicker.js') }} "></script>
	<script type="text/javascript" src=" {{ asset('assets/js/plugins/ui/nicescroll.min.js') }} "></script>
	<script type="text/javascript" src=" {{ asset('assets/js/plugins/forms/selects/select2.min.js') }} "></script>

	<script type="text/javascript" src="  {{ asset('assets/js/core/app.js') }} "></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
	<script type="text/javascript" src=" {{ asset('assets/js/pages/datatables_basic.js') }}  "></script>
	<script type="text/javascript" src="  {{ asset('assets/js/pages/layout_fixed_custom.js') }} "></script>
	<script type="text/javascript" src="{{asset('assets/js/pages/form_select2.js')}}"></script>

	<script type="text/javascript" src="  {{ asset('assets/js/plugins/ui/ripple.min.js') }} "></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
    	@include('admin.layouts.partial.navbar')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
				@include('admin.layouts.partial.sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Dashboard content -->
					@yield('content')
					<!-- /dashboard content -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2019. <a href="#">Smart Tickets Zambia</a> by <a href="#" target="_blank">Rex & Wellington</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	@yield('custom_js')
	@include('admin.partials.notifications')
</body>
</html>
