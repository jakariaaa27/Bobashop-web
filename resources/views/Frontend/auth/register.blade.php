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
            {{-- @yield('content') --}}
            <div class="contact-area section">
                <div class="container">
                    <div class="contact-info">
                        <div class="row">
                            <div class="col-md-12">
                                <center><p><h1>Registration Form</h1></p></center>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-form-inner box-shadow">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="from-area">
                                                <form class="registration-form" method="POST" action="{{ route('register.perform') }}">
                                                @csrf
                                                    <div class="form-group box-shadow{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                                        <input type="text" class="form-control" id="firstname" name="name"  value="{{ old('name') }}" required placeholder="Enter your Name">
                                                    </div>
                                                    <div class="form-group box-shadow{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                                        <input type="email" class="form-control" id="emailthree" name="email" value="{{ old('email') }}" required  placeholder="Enter Your Email address ">
                                                    </div>
                                                    <div class="from-btn text-right">
                                                        <button type="submit" class="primary-btn">Register</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- leaf left area start here	 -->
                <div class="leaf-left">
                    <img src="assets/images/leaf-left.png" alt="leaf-right">
                </div>
                <!-- leaf left area end here	 -->
                <!-- leaf right area start here	 -->
                <div class="leaf-right">
                    <img src="assets/images/leaf-right.png" alt="leaf-right">
                </div>
                <!-- leaf right area end here	 -->
            </div>
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