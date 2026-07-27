<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Forum Lingkar Merapi</title>	

		<meta name="keywords" content="Forum Lingkar Merapi" />
		<meta name="description" content="Forum Lingkar Merapi">
		<meta name="author" content="forum lingkar merapi">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('logo/favicon.png') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ asset('theme/img/apple-touch-icon.png') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('theme/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('theme/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/css/theme-shop.css') }}">

		<!-- Revolution Slider CSS -->
		<link rel="stylesheet" href="{{ asset('theme/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/vendor/rs-plugin/css/navigation.css') }}">
		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('theme/vendor/circle-flip-slideshow/css/component.css') }}">

		<!-- Skin CSS -->
		{{-- <link id="skinCSS" rel="stylesheet" href="{{ asset('theme/css/skins/default.css') }}"> --}}
        <link id="skinCSS" rel="stylesheet" href="{{ asset('theme/css/skins/skin-corporate-5.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">

	</head>
	<body data-plugin-page-transition>
		<div class="body">
			@include('layout.depan.header')
            @yield('content')
			@include('layout.depan.footer')
		</div>

		<!-- Vendor -->
		<script src="{{ asset('theme/vendor/plugins/js/plugins.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('theme/js/theme.js') }}"></script>

		<!-- Revolution Slider Scripts -->
		<script src="{{ asset('theme/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ asset('theme/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
		<!-- Circle Flip Slideshow Script -->
		<script src="{{ asset('theme/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
		<!-- Current Page Views -->
		<script src="{{ asset('theme/js/views/view.home.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('theme/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('theme/js/theme.init.js') }}"></script>

	</body>
</html>
