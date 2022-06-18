@extends('Backend.layouts.app')
@section('title', 'Setting Frontend | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Setting</li>
    <li class="breadcrumb-item active" aria-current="page">Setting Frontend</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Setting Frontend</h4>
        @foreach($datas as $data)
        <form class="cmxform" method="POST" action="{{ route('UpdateFrontend', $data->setting_id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
          <fieldset>
          <div class="form-group{{ $errors->has('simple_text') ? ' has-error' : '' }}">
              <label >Simple text</label>
              <input id="name" class="form-control" name="simple_text" type="text" placeholder="Input Simple text" value="{{ $data->simple_text }}">
                @if ($errors->has('simple_text'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('simple_text') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('footer') ? ' has-error' : '' }}">
              <label >Footer</label>
              <input id="name" class="form-control" name="footer" type="text" placeholder="Input Footer" value="{{ $data->footer_frontend }}">
                @if ($errors->has('footer'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('footer') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
              <label >Logo</label>
                <input type="file" id="myDropify" data-default-file="{{asset('/images/frontend/'.$data->logo)}}" name="logo" class="border"/>
                
                @if ($errors->has('logo'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('logo') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('front_logo') ? ' has-error' : '' }}">
              <label >Front logo</label>
                <input type="file" id="myDropify2" data-default-file="{{asset('/images/frontend/'.$data->front_logo)}}" name="front_logo" class="border"/>
                
                @if ($errors->has('front_logo'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('front_logo') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('jumbotron') ? ' has-error' : '' }}">
              <label >Jumbotron</label>
                <input type="file" id="myDropify3" data-default-file="{{asset('/images/frontend/'.$data->jumbotron)}}" name="jumbotron" class="border"/>
                
                @if ($errors->has('jumbotron'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('jumbotron') }}</strong>
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
