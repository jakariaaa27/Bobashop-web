@extends('Backend.layouts.app')
@section('title', 'Edit Guide | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manager</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Manager {{ $data->name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Edit Manager</h4>
        <form class="cmxform" method="POST" action="{{ route('guide.update', $data->guide_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label >name</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="Input Name" value="{{ $data->name }}">
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="Input Email" value="{{ $data->email }}">
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label >Phone</label>
              <input id="name" class="form-control" name="phone" type="text" placeholder="Input Phone" value="{{ $data->phone }}">
                @if ($errors->has('phone'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('prov') ? ' has-error' : '' }}">
              <select class="js-example-basic-single w-100" name="dest">
                <option selected value="{{ $data->dest_id }}">{{ $data->dest_name }}</option>
                @foreach($dest as $desti)
                  @if($desti->dest_id != $data->dest_id)
                    <option value="{{ $desti->dest_id }}">{{ $desti->dest_name }}</option>
                  @endif
                @endforeach
                @if ($errors->has('prov'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('prov') }}</strong>
                  </span>
                @endif
              </select>
            </div>
            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
              <label >Photo</label>
                <input type="file" id="myDropify" data-default-file="{{asset('/images/guide/'.$data->photo)}}" name="photo" class="border"/>
                
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
