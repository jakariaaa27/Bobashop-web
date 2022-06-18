<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  @foreach($setting as $data)
    <title>Login Admin | {{$data->site_name}}</title>
    @endforeach
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="qAZACjyS7nOoAZz2T6C2KZAsNHqcUQu7Qga8Lu4v">
  
  @foreach($setting as $data)
    <link rel="shortcut icon" href="{{ asset('/images/frontend/'.$data->front_logo) }}">
    @endforeach

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('/Backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('/Backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
  <!-- end plugin css -->

  
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('/Backend/css/app.css') }}">
  <!-- end common css -->

  </head>
<body data-base-url="https://www.nobleui.com/laravel/template/light">

  <script src="../assets/js/spinner.js"></script>

  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
          @foreach($setting as $data)
            <div class="auth-left-wrapper" style="background-image: url({{ asset('/Backend/images/boba-icon.png')}})">
          @endforeach
            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
            @foreach($setting as $data)
              <a href="#" class="noble-ui-logo d-block mb-2">{{$data->logo_text1}}<span>{{$data->logo_text2}}</span></a>
            @endforeach
                <form method="POST" action="{{ route('login') }}" class="forms-sample">
                  @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email">
                    @if ($errors->has('email'))
                      <span id="error_email" class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" autocomplete="current-password" placeholder="Password" name="password">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</button>
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
  </div>

    <!-- base js -->
    <script src="{{ asset('/Backend/js/app.js') }}"></script>
    <script src="{{ asset('/Backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('/Backend/assets/js/template.js') }}"></script>
    <!-- end common js -->

    </body>

</html>