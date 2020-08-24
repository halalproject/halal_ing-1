<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>{{ config('app.name') }}</title>
		<link rel="shortcut icon" type="image/png" href=""/>
    	<meta name="keywords" content="Halal Ingredient " />
		<meta name="description" content="Halal Ingredient">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta http-equiv="Content-Security-Policy" content="connect-src 'self'">
    	<meta http-equiv="X-Content-Type" content="nosniff">
    	<meta http-equiv="Feature-Policy" content="unsized-media 'none'; geolocation 'self'">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
		<!--<link rel="stylesheet" href="{{ asset('assets/vendor/morris/morris.css') }}" />-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css') }}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css') }}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">
		<link rel="stylesheet" href="{{ asset('salert/sweetalert2.css') }}">

		<!-- Vendor -->
		<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>

		<!-- Head Libs -->
		<script src="{{ asset('assets/vendor/modernizr/modernizr.js') }}"></script>
		<script src="{{ asset('salert/sweetalert2.min.js') }}"></script>
		<script src="{{ asset('salert/sweetalert2.common.js') }}"></script>

  	</head>
	  @if(\Request::is('admin'))
	  	@yield('content')
	  @else	  
		<x-menu />
		@yield('page')
	  @endif
		
		<div class="bs-example">
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg static">
					<div class="modal-content">
					</div>
				</div>
			</div>
		</div>
	
		</form>
		
		<!-- Vendor -->
		<script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		
		<!-- Specific Page Vendor -->
		<script src="{{ asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-appear/jquery.appear.js') }}"></script>
		<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js') }}"></script>
		<script src="{{ asset('assets/vendor/flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js') }}"></script>
		<script src="{{ asset('assets/vendor/flot/jquery.flot.pie.js') }}"></script>
		<script src="{{ asset('assets/vendor/flot/jquery.flot.categories.js') }}"></script>
		<script src="{{ asset('assets/vendor/flot/jquery.flot.resize.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
		<script src="{{ asset('assets/vendor/raphael/raphael.js') }}"></script>
		<script src="{{ asset('assets/vendor/morris/morris.js') }}"></script>
		<script src="{{ asset('assets/vendor/gauge/gauge.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('assets/javascripts/theme.js') }}"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('assets/javascripts/theme.custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ asset('assets/javascripts/theme.init.js') }}"></script>


		<!-- Examples -->
		<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
		<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>        
        
	</body>
</html>