@extends('Backend.layouts.app')
@section('title', 'Create Guide | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manager</li>
    <li class="breadcrumb-item active" aria-current="page">Add Manager</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Add Manager</h4>
        <form class="cmxform" method="POST" action="{{ route('guide.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <fieldset>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label >Name</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="Input Guide Name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="Input Guide Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label >Phone</label>
              <input id="name" class="form-control" name="phone" type="text" placeholder="Input Guide Phone" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('dest') ? ' has-error' : '' }}">
              <select class="js-example-basic-single w-100" name="dest">
              <option selected>Choose Destination</option>
                @foreach($dest as $desti)
                  <option value="{{ $desti->dest_id }}">{{ $desti->dest_name }}</option>
                @endforeach
                @if ($errors->has('dest'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('dest') }}</strong>
                  </span>
                @endif
              </select>
            </div>
            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
              <label >Photo</label>
                <input type="file" id="myDropify" name="photo" class="border"/>
                @if ($errors->has('photo'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('photo') }}</strong>
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

