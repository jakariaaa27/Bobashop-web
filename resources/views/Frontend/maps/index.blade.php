@extends('Frontend.layouts.app') 
@section('title', 'Detail Destination | '.ucwords($config->site_name))
@section('content')
<div class="blog-details-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-post box-shadow">
                    <div class="blog-content">
                        <div>
                            <div class="row">
                                <div style="width: 100%; height: 500px;">
                                    {!! $mapRender !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget">
                    <div class="single-widget search-widget box-shadow">
                        <div class="widget-inner">
                            <form action="{{ route('searchDest') }}" method="POST">
                            @csrf
                                <div class="search-from box-shadow">
                                    <input type="text" id="search" name="search" placeholder="Serach">
                                    <button class="search-icon"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  <!-- Google maps server -->
@endsection