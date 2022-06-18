<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('Backend.includes.head')
</head>

<body data-base-url="https://www.nobleui.com/laravel/template/light">
    <script src="assets/js/spinner.js"></script>
    <div class="main-wrapper" id="app">
        @include('Backend.includes.sidebar')
        <div class="page-wrapper">
            @include('Backend.includes.header')
            <div class="page-content">
                @include('Backend.flash-message')

                @yield('content')
            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                @include('Backend.includes.footer')
            </footer>
        </div>
    </div>
    @yield('scriptPage') 

    <!-- base js -->
    <script src="{{ asset('Backend/js/app.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <script src="{{ asset('Backend/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('Backend/assets/js/template.js') }}"></script>
    <!-- end common js -->

    <script src="{{ asset('Backend/assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/dropify.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/select2.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/datepicker.js') }}"></script>
    {{-- <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwx2LQQM6zmHj7oqZfI_oDrAuuXXN3tBk&callback=myMap&libraries=geometry"></script> --}}
    @section('script')


@show
</body>

</html>