@extends('Backend.layouts.app')
@section('title', 'Edit User | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Users {{ $data->type_name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit Users</h4>
        <form class="cmxform" method="POST" action="{{ route('users.update', $data->users_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label >name</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="Input Name" value="{{ $data->name }}">
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="Input Email" value="{{ $data->email }}">
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
              <label >Photo</label>
                <input type="file" id="myDropify" data-default-file="{{asset('/images/users/'.$data->photo)}}" name="photo" class="border"/>
                
                @if ($errors->has('photo'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('photo') }}</strong>
                  </span>
                @endif
            </div>
            <input class="btn btn-primary" type="submit" value="Edit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
