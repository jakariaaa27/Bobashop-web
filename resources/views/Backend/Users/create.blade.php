@extends('Backend.layouts.app')
@section('title', 'Create User | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
    <li class="breadcrumb-item active" aria-current="page">Add Users</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Add Users</h4>
        <form class="cmxform" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <fieldset>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label >Name</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="Input Name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="Input Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
            {{-- <div class="form-group{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password">Password</label>
              <input id="password" class="form-control" name="password" type="password" placeholder="Input Password" value="{{ old('password') }}">
                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('password') }}</strong>
                  </span>
                @endif
            </div> --}}
            {{-- <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
              <label >Photo</label>
                <input type="file" id="myDropify" name="photo" class="border"/>
                @if ($errors->has('photo'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('photo') }}</strong>
                  </span>
                @endif
            </div> --}}
            <input class="btn btn-success" type="submit" value="Add">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

