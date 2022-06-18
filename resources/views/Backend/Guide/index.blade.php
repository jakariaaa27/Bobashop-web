@extends('Backend.layouts.app')
@section('title', 'List Guide | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manager</li>
    <li class="breadcrumb-item active" aria-current="page">List Manager</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">List Manager</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
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
                <th>{{ $data->name }}</th>
                <th>{{ $data->email }}</th>
                <th>
                    <img src="{{ url('images/guide/'. $data->photo) }}" alt="image" style="margin-right: 10px; height: 50px; width: 50px;" />  
                </th>
                <th>
                  <a class="btn btn-primary btn-icon-text" href="{{ route('guide.edit', $data->guide_id) }}"> 
                    <i class="btn-icon-prepend" data-feather="edit"></i>Edit 
                  </a>
                  <a class="btn btn-danger btn-icon-text hapus" href=""  data-id="{{$data->guide_id}}">
                        Delete<i class="btn-icon-append" data-feather="trash"></i>
                    </a>
                </th>
              </tr>
              @endforeach
              @else
                  <th colspan="5"><center>No Data Of Manager</center></th>
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
                url: "<?php echo url('admin/delete/guide/') ?>/"+id,
                data: {id:id},
                success: function (data) {
                        window.location.href = "<?php echo url('admin/guide/') ?>";
                    }     
                });
        });
      });
</script>
@endsection
