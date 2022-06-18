@extends('Backend.layouts.app')
@section('title', 'Dashboard | '.ucwords($config->site_name))
@section('content')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Dashboard</h4>
  </div>
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Type Destination</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $type->count() }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                  <div class="mt-md-3 mt-xl-0">
                    <img width="60px" height="60px" style="margin-left: 100px;" src="{{ asset('Backend/images/type.png') }}">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Destination</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $dest->count() }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                  <div class="mt-md-3 mt-xl-0">
                    <img width="75px" height="75px" style="margin-left: 100px;" src="{{ asset('Backend/images/map.png') }}">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Manager</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $guide->count() }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                 <div class="mt-md-3 mt-xl-0">
                    <img width="75px" height="75px" style="margin-left: 100px;" src="{{ asset('Backend/images/guide.png') }}">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

<div class="row">
<div class="col-lg-12 col-xl-12 grid-margin grid-margin-xl-0 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Recent Post</h6>
        </div>
        @foreach($desti as $des)
        <div class="d-flex flex-column">
          <a href="#" class="d-flex align-items-center border-bottom py-3">
            <div class="mr-3">
              <img src="{{ url('images/destination/'. $des->pict) }}" class="rounded-circle wd-35" alt="user">
            </div>
            <div class="w-100">
              <div class="d-flex justify-content-between">
                <h6 class="text-body mb-2">{{ $des->dest_name }}</h6>
                <p class="text-muted tx-12">{{ date('H:i', strtotime($des->created_at)) }}</p>
              </div>
                <p class="text-muted tx-13">
                  @php 
                    echo "<p>".substr(strip_tags($des->desc), 0, 200). '...'."</p>" 
                  @endphp
                </p>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div> <!-- row -->
@endsection
