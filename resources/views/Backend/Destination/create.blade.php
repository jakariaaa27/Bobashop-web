@extends('Backend.layouts.app')
@section('title', 'Create Destination | '.ucwords($config->site_name))
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Destination</li>
    <li class="breadcrumb-item active" aria-current="page">Add Destination</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Formulir Add Destination</h4>
        <form class="cmxform" method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <fieldset>
            <input type="hidden" name="users_id" value="{{ Auth::user()->users_id }}">
            <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
              <label >Destination Name</label>
              <input id="name" class="form-control" name="dest_name" type="text" placeholder="Input Destination Name" value="{{ old('dest_name') }}">
                @if ($errors->has('dest_name'))
                  <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('dest_name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
              <select class="js-example-basic-single w-100" name="type" id="type">
                <option selected>Choose Type</option>
                  @foreach($type as $typ)
                    <option value="{{ $typ->type_id }}">{{ $typ->type_name }}</option>
                  @endforeach
                  @if ($errors->has('type'))
                    <span class="help-block">
                      <strong style="color:red;">{{ $errors->first('type') }}</strong>
                    </span>
                  @endif
              </select>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                  <select class="js-example-basic-single w-100" name="city" id="city">
                  <option selected>Choose City</option>
                    @foreach($city as $citys)
                      <option value="{{ $citys->city_id }}">{{ $citys->city_name }}</option>
                    @endforeach
                    @if ($errors->has('city'))
                      <span class="help-block">
                          <strong style="color:red;">{{ $errors->first('city') }}</strong>
                      </span>
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                  <select class="js-example-basic-single w-100" name="district" id="district">
                  <option selected>Choose District</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('pict') ? ' has-error' : '' }}">
              <label >Picture</label>
                <input type="file" id="myDropify" name="pict" class="border"/>
                @if ($errors->has('pict'))
                  <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('pict') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              <label>Description</label>
              <textarea class="form-control" name="desc" id="tinymceExample" rows="10"></textarea>
              @if ($errors->has('desc'))
                <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('desc') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label>Choose Destination Coordinate</label> 
                   <div class="col-sm-9">
                      <input id="pac-input" class="controls form-control" type="text" placeholder="Cari tempat...">
                          <div id="map" style="height:400px;border: 2px solid #3872ac; margin-bottom:0px;"></div>
                  </div>  
            </div>
            <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
              <label>longitude</label> 
                  <input type="text" placeholder="140.404984" id="lon" value="{{ old('longitude') }}" maxlength="50" class="form-control" name="longitude" >
                  @if ($errors->has('longitude'))
                      <span class="help-block">
                          <strong style="color: red;">{{ $errors->first('longitude') }}</strong>
                      </span>
                  @endif
            </div>
            <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                <label>latitude</label> 
                    <input type="text" placeholder="-8.4991" id="lat" maxlength="50" value="{{ old('latitude') }}" class="form-control" name="latitude" >
                    @if ($errors->has('latitude'))
                        <span class="help-block">
                            <strong style="color: red;">{{ $errors->first('latitude') }}</strong>
                        </span>
                    @endif

            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label>Address</label>
              <textarea class="form-control" name="address" rows="10"></textarea>
              @if ($errors->has('address'))
                <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('address') }}</strong>
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
@section('scriptPage')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    	$('#city').change(function(){
    		var city_id = $(this).val();
			  var cit = {};
			  $('#district').html('');

			$.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type: 'post',
    			url: '{{ URL::to("admin/getdistrictbyid") }}',
          async: false,
    			data: {city_id : city_id},
    			success: function(e)
    				{
    					cit = JSON.parse(e);
    				}
    		})

        $.each(cit, function(index, k) {
          var opt = "<option value='"+k.district_id+"'>"+k.district_name+"</option>";
          $('#district').append(opt);
        });
    	});     
    	$('.select2').select2();
    });
</script>
@endsection
@section('script')
    <script>

                  function initMap() {
                    // Create a map object and specify the DOM element for display.
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: 22.997091, lng: 120.208756},
                      zoom: 13,
                      fullscreenControl: false,
                      mapTypeControl: true,
                      mapTypeId: 'hybrid',
                    });

                    var input = document.getElementById('pac-input');
                    var searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                    map.addListener('bounds_changed', function() {
                      searchBox.setBounds(map.getBounds());
                    });

                    function markerCoords(markerobject){
                      google.maps.event.addListener(markerobject, 'dragend', function(evt){
                          console.log("lat: "+evt.latLng.lat().toFixed(3)+" lon: "+evt.latLng.lng().toFixed(3));
                      });

                      google.maps.event.addListener(markerobject, 'drag', function(evt){
                          console.log("marker is being dragged");
                          console.log("lat: "+evt.latLng.lat().toFixed(3)+" lon: "+evt.latLng.lng().toFixed(3));

                          $('#lat').val(evt.latLng.lat().toFixed(6));
                          $('#lon').val(evt.latLng.lng().toFixed(6));
                      });
                    }

                    var marker = new google.maps.Marker({
                      position: {lat: 22.997091, lng: 120.208756},
                      map: map,
                      title: 'Pilih Lokasi!',
                      draggable:true,
                    });

                    markerCoords(marker);

                    google.maps.event.addListener(map, 'click', function(evt) {
                       console.log("lat: "+evt.latLng.lat().toFixed(3)+" lon: "+evt.latLng.lng().toFixed(3));
                        var latlng = new google.maps.LatLng(evt.latLng.lat().toFixed(6), evt.latLng.lng().toFixed(6));
                        marker.setPosition(latlng);
                        $('#lat').val(evt.latLng.lat().toFixed(6));
                        $('#lon').val(evt.latLng.lng().toFixed(6));
                        });

                      searchBox.addListener('places_changed', function() {
                       var places = searchBox.getPlaces();

                       if (places.length == 0) {
                         return;
                       }

                       places.forEach(function(place) {
                        marker.setPosition(place.geometry.location);
                        $('#lat').val(place.geometry.location.lat().toFixed(6));
                        $('#lon').val(place.geometry.location.lng().toFixed(6));
                        map.setCenter(marker.getPosition());
                       });

                     });

                     $("#pac-input").click(function(event) {
                       $(this).val('');
                     });

                  }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwx2LQQM6zmHj7oqZfI_oDrAuuXXN3tBk&callback=initMap&libraries=places&language=id"></script>

@endsection




