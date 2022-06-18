<!DOCTYPE HTML>
<html class="no-js" lang="en">
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include('Frontend.includes.head')
</head>
	<body>
		<!-- header area start here -->
        @include('Frontend.includes.header')
		<!-- header area start here -->
		<!-- post area start here	 -->
            @yield('content')
		<!-- post area end here	 -->	
		<!-- footer area start here -->
		<footer class="footer-area">
			@include('Frontend.includes.footer')
		</footer>
		<!-- footer area end here -->		
		<!-- js file start -->
		<script src="{{ asset('Frontend/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/plugins.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/Popper.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/isotope.pkgd.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>	
		<script src="{{ asset('Frontend/assets/js/scrollup.js') }}"></script>	
		<script src="{{ asset('Frontend/assets/js/jquery.counterup.min.js') }}"></script>	
		<script src="{{ asset('Frontend/assets/js/waypoints.min.js') }}"></script>	
		<script src="{{ asset('Frontend/assets/js/jquery.appear.js') }}"></script>	
		<script src="{{ asset('Frontend/assets/js/jquery.barfiller.js') }}"></script>																																		
		<script src="{{ asset('Frontend/assets/js/main.js') }}"></script>
		<!-- End js file -->
		<script src="http://maps.google.com/maps/api/js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwx2LQQM6zmHj7oqZfI_oDrAuuXXN3tBk&callback=myMap&libraries=geometry"></script>
		{{-- <script src="http://maps.google.com/maps/api/js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzRnayHt1gzvPJ0X9cptjCA1zZ9WSjXN0&callback=myMap&libraries=geometry"></script> --}}
	</body>

<!-- Mirrored from xfar.netlify.com/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jan 2020 08:12:11 GMT -->
</html>