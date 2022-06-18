@extends('Backend.layouts.app')
@section('title', 'Change Profile | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Profile {{ $data->name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit Profile</h4>
        <form class="cmxform" method="POST" action="{{ route('profile.update', $data->users_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label >Name</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="Input Name" value="{{ $data->name }}">
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>
            {{-- <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
              <label >Photo</label>
                <input type="file" id="myDropify" data-default-file="{{asset('/images/users/'.$data->photo)}}" name="photo" class="border"/>
                
                @if ($errors->has('photo'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('photo') }}</strong>
                  </span>
                @endif
            </div> --}}
            <input class="btn btn-primary" type="submit" value="Edit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
