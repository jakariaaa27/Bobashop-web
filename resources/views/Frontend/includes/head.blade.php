<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="author" content="smartit-source">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- title here -->
<title>@yield('title')</title>
<!-- Favicon and Touch Icons -->
@foreach($setting as $data)
<link rel="shortcut icon" href="{{ asset('/images/frontend/'.$data->favicon) }}">
@endforeach
<!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" href="apple-touch-icon.html">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/flaticon.css') }}">
<!-- Plugin CSS -->
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/jquery.barfiller.css') }}">
<!--Theme custom css -->
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css') }}">
<!--Theme Responsive css-->
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css') }}" />
<script src="{{ asset('Frontend/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>