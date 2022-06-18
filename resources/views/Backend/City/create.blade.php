@extends('Backend.layouts.app')
@section('title', 'Create Province | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Area</li>
    <li class="breadcrumb-item active" aria-current="page">Add City</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Add City</h4>
        <form class="cmxform" method="POST" action="{{ route('city.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <fieldset>
            <div class="form-group{{ $errors->has('city_name') ? ' has-error' : '' }}">
              <label >City Name</label>
              <input id="name" class="form-control" name="city_name" type="text" placeholder="Input City Name" value="{{ old('city_name') }}">
                @if ($errors->has('city_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('city_name') }}</strong>
                  </span>
                @endif
            </div>
            <input class="btn btn-success" type="submit" value="Add">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
