<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>@yield('title')</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{csrf_token()}}">

@foreach($setting as $data)
<link rel="shortcut icon" href="{{ asset('/images/frontend/'.$data->front_logo) }}">
@endforeach

<!-- plugin css -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
<!-- end plugin css -->

<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/plugins/select2/select2.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/plugins/dropzone/dropzone.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/plugins/dropify/css/dropify.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}">

<!-- common css -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Backend/css/app.css') }}">
<!-- end common css -->

<!-- Global site tag (gtag.js) - Google Analytics start -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146586338-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-146586338-1');
</script>
<!-- Google Analytics end -->