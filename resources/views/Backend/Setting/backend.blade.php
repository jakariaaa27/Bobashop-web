@extends('Backend.layouts.app')
@section('title', 'Setting Backend | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Setting</li>
    <li class="breadcrumb-item active" aria-current="page">Setting Backend</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Setting Backend</h4>
        @foreach($datas as $data)
        <form class="cmxform" method="POST" action="{{ route('UpdateBackend', $data->setting_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
              <label >Site Name</label>
              <input id="name" class="form-control" name="site_name" type="text" placeholder="Input Site Name" value="{{ $data->site_name }}">
                @if ($errors->has('site_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('site_name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('site_desc') ? ' has-error' : '' }}">
              <label >Site Desc</label>
              <input id="name" class="form-control" name="site_desc" type="text" placeholder="Input Site Desc" value="{{ $data->site_desc }}">
                @if ($errors->has('site_desc'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('site_desc') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('logo_text1') ? ' has-error' : '' }}">
              <label >Logo Text 1</label>
              <input id="name" class="form-control" name="logo_text1" type="text" placeholder="Input Logo Text 1" value="{{ $data->logo_text1 }}">
                @if ($errors->has('logo_text1'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('logo_text1') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('logo_text2') ? ' has-error' : '' }}">
              <label >Logo Text 2</label>
              <input id="name" class="form-control" name="logo_text2" type="text" placeholder="Input Logo Text 2" value="{{ $data->logo_text2 }}">
                @if ($errors->has('logo_text2'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('logo_text2') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('footer') ? ' has-error' : '' }}">
              <label >Footer</label>
              <input id="name" class="form-control" name="footer" type="text" placeholder="Input footer" value="{{ $data->footer_backend }}">
                @if ($errors->has('footer'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('footer') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('background_login') ? ' has-error' : '' }}">
              <label >Background Login</label>
                <input type="file" id="myDropify" data-default-file="{{asset('/images/backend/'.$data->background_login)}}" name="background_login" class="border"/>
                
                @if ($errors->has('background_login'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('background_login') }}</strong>
                  </span>
                @endif
            </div>
            <input class="btn btn-primary" type="submit" value="Edit">
          </fieldset>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
