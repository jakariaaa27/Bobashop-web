@extends('Backend.layouts.app')
@section('title', 'Edit Province | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Area</li>
    <li class="breadcrumb-item active" aria-current="page">Edit City {{ $data->city_name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit City</h4>
        <form class="cmxform" method="POST" action="{{ route('city.update', $data->city_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
            <div class="form-group{{ $errors->has('city_name') ? ' has-error' : '' }}">
              <label >City Name</label>
              <input id="name" class="form-control" name="city_name" type="text" placeholder="Input City Name" value="{{ $data->city_name }}">
                @if ($errors->has('city_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('city_name') }}</strong>
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
