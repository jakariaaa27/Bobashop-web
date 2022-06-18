@extends('Backend.layouts.app')
@section('title', 'Edit Type | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Area</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Type {{ $data->type_name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit Type</h4>
        <form class="cmxform" method="POST" action="{{ route('type.update', $data->type_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('type_name') ? ' has-error' : '' }}">
              <label >Type Name</label>
              <input id="name" class="form-control" name="type_name" type="text" placeholder="Input Type Name" value="{{ $data->type_name }}">
                @if ($errors->has('type_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('type_name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
              <label >Icon</label>
                <input type="file" id="myDropify" data-default-file="{{asset('/images/type/'.$data->icon)}}" name="icon" class="border"/>
                
                @if ($errors->has('icon'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('icon') }}</strong>
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
