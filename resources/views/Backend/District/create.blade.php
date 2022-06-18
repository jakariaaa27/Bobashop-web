@extends('Backend.layouts.app')
@section('title', 'Create District | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Area</li>
    <li class="breadcrumb-item active" aria-current="page">Add District</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Add District</h4>
        <form class="cmxform" method="POST" action="{{ route('district.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <fieldset>
            <div class="form-group{{ $errors->has('cit') ? ' has-error' : '' }}">
              <select class="js-example-basic-single w-100" name="city">
              <option selected>Choose City</option>
                @foreach($cit as $city)
                  <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                    @if ($errors->has('cit'))
                      <span class="help-block">
                          <strong style="color:red;">{{ $errors->first('cit') }}</strong>
                      </span>
                    @endif
                @endforeach
              </select>
            </div>
            <div class="form-group{{ $errors->has('district_name') ? ' has-error' : '' }}">
              <label >District Name</label>
              <input id="name" class="form-control" name="district_name" type="text" placeholder="Input District Name" value="{{ old('district_name') }}">
                @if ($errors->has('district_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('district_name') }}</strong>
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
