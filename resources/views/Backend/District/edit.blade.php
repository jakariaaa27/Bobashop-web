@extends('Backend.layouts.app')
@section('title', 'Edit District | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Area</li>
    <li class="breadcrumb-item active" aria-current="page">Edit District {{ $data->district_name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit District</h4>
        <form class="cmxform" method="POST" action="{{ route('district.update', $data->district_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('cit') ? ' has-error' : '' }}">
              <select class="js-example-basic-single w-100" name="city">
                <option selected value="{{ $data->city_id }}">{{ $data->city_name }}</option>
                @foreach($cit as $city)
                  @if($city->city_id != $data->city_id)
                    <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                  @endif
                @endforeach
                @if ($errors->has('cit'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('cit') }}</strong>
                  </span>
                @endif
              </select>
            </div>
            <div class="form-group{{ $errors->has('district_name') ? ' has-error' : '' }}">
              <label >District Name</label>
              <input id="name" class="form-control" name="district_name" type="text" placeholder="Input City Name" value="{{ $data->district_name }}">
                @if ($errors->has('district_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('district_name') }}</strong>
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
