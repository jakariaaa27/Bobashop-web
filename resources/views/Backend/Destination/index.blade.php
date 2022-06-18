@extends('Backend.layouts.app')
@section('title', 'List Destination | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Destination</li>
    <li class="breadcrumb-item active" aria-current="page">List Destination</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">List Destination</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Destination</th>
                <th>City</th>
                <th>District</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              @if(count($datas))
              @php $no = 0; @endphp
              @foreach($datas as $data)
              @php $no++; @endphp
                <th>{{ $no }}</th>
                <th>{{ $data->dest_name }}</th>
                <th>{{ $data->city_name }}</th>
                <th>{{ $data->district_name }}</th>
                <th>
                    <img src="{{ url('images/destination/'. $data->pict) }}" alt="image" style="margin-right: 10px; height: 50px; width: 50px;" />  
                </th>
                <th>
                  <a class="btn btn-primary btn-icon-text" href="{{ route('destination.edit', $data->dest_id) }}"> 
                    <i class="btn-icon-prepend" data-feather="edit"></i>Edit 
                  </a>
                  <a class="btn btn-danger btn-icon-text hapus" href=""  data-id="{{$data->dest_id}}">
                        Delete<i class="btn-icon-append" data-feather="trash"></i>
                    </a>
                </th>
              </tr>
              @endforeach
              @else
                  <th colspan="6"><center>No Data Of Destination</center></th>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scriptPage')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.hapus', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
            $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "<?php echo url('admin/delete/destination/') ?>/"+id,
                data: {id:id},
                success: function (data) {
                        window.location.href = "<?php echo url('admin/destination/') ?>";
                    }     
                });
        });
      });
</script>
@endsection
