<!-- header area start here -->
<header class="header-area" id="sticky">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-6">
                <div class="log-area">
                    @foreach($setting as $data)
                     <a href="{{ url('/') }}"><img src="{{ asset('Frontend/assets/images/boba.png') }}" alt=""></a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu-area white">
                    <nav>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/maps') }}">Maps</a></li>
                            <li><a href="{{ route('register.show') }}">Register</a></li>
                            <li><a href="{{ url('/admin/login') }}">Login</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-1 col-xs-6">
                <div class="humbargar-area">
                    <div class="menu-icon text-right">
                        <span class="flaticon-menu humbargar color"></span>
                    </div>
                    <div class="close-area">
                        <span class="close"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area start here -->
<!-- menu area start here -->
<div class="sidebar-menu ">
    <div class="close-area">
        <span class="close"><i class="icon fa fa-times-circle"></i></span>
    </div>
    <div class="main-menu">
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>
            <ul>
                <li><a href="{{ url('/maps') }}">Maps</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('register.show') }}">Register</a></li>
            </ul>
            <ul>
                <li><a href="{{ url('/admin/login') }}">Login</a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- menu area start here -->
<!-- banner area start here -->
<div class="banner-area banner-three">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner-content">
                    @foreach($setting as $data)
                        <div class="banner-title white">
                            <h1>{{$data->site_name}}</h1>
                        </div>
                        <div class="banner-info">
                            <p>{{$data->simple_text}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div>
                {{-- <div  class="banner-img"> --}}
                    <img width="400px" height="400px" src="{{ asset('Frontend/assets/images/boba-icon.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner area start here -->