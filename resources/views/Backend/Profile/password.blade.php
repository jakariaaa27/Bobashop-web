@extends('Backend.layouts.app')
@section('title', 'Change Password | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Change Password</h4>
        <form class="cmxform" method="POST" action="{{ route('ChangePW', Auth::user()->users_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
            <div class="form-group{{ $errors->has('password_old') ? ' has-error' : '' }}">
              <label >Old Password</label>
              <input id="password" class="form-control" name="password_old" type="password" placeholder="Input Old Password" value="{{ old('Old Password') }}">
                @if ($errors->has('password_old'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('password_old') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label >New Password</label>
              <input id="password" class="form-control" onkeyup='check();' name="password" type="password" placeholder="Input New Password" value="{{ old('Password') }}">
                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('password') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label >Retype New Password</label>
              <input id="confirm_password" class="form-control" onkeyup="check()" name="password_confirmation" type="password" placeholder="Retype New Password" value="{{ old('Retype Password') }}">
                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif
            </div>
            <input class="btn btn-primary" type="submit" value="Change Password">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

