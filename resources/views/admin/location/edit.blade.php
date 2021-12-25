@extends('layouts.admin3')
@section('content')


 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">The Main </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sellers') }}"> Sellers </a>
                            </li>
                            <li class="breadcrumb-item active">Edit Location
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> Edit <span class="text-warning">@foreach ($sellers as $seller) @if($seller->id == $location->seller_id) {{ $seller->store_name }} @endif @endforeach </span> Location </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.location.update',$location->id) }}" method="POST" >
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> Location Data </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Seller Name </label>
                                                        <select name="seller_id" id="seller_id" class="custom-select">
                                                            @foreach ($sellers as $seller)
                                                                @if($seller->id == $location->seller_id)
                                                                    <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>    
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error("seller_id")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Address </label>
                                                        <input type="text" value="{{ $location->theAddress }}" id="address"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith  "
                                                               name="theAddress">
                                                        @error("theAddress")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Location </label>
                                                        <input type="text" value="{{ $location->location }}" id="location"
                                                               class="form-control"
                                                               placeholder="Ex: Nasr City "
                                                               name="location">
                                                        @error("location")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Location in Arabic </label>
                                                        <input type="text" value="{{ $location->location_ar }}" id="location"
                                                               class="form-control"
                                                               placeholder="Ex: مدينة نصر"
                                                               name="location_ar">
                                                        @error("location_ar")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Latitude </label>
                                                        <input type="text" value="{{ $location->latitude }}" id="lat"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith  "
                                                               name="latitude">
                                                        @error("latitude")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Longitude </label>
                                                        <input type="text" value="{{ $location->longitude }}" id="long"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith  "
                                                               name="longitude">
                                                        @error("longitude")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Distance </label>
                                                        <input type="text" value="{{ $location->distance }}" id="distance"
                                                               class="form-control"
                                                               placeholder="Ex: John Smith  "
                                                               name="distance">
                                                        @error("distance")
                                                         <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                </div>
                                                
                                                <div id="map"></div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    function initMap() {
      const myLatlng = { lat: 29.9859349, lng: 31.1621756 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: myLatlng,
      });
      // Create the initial InfoWindow.
      let infoWindow = new google.maps.InfoWindow({
        content: "Click the map to get Lat/Long!",
        position: myLatlng,
      });
      infoWindow.open(map);
      // Configure the click listener.
      map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
          position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
          JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);
          var langlatude = infoWindow.content;
          var latlangtude = JSON.parse(langlatude);
          console.log(latlangtude.lng);
            var latitude = document.getElementById('lat').value = latlangtude.lat;
            var longitude = document.getElementById('long').value = latlangtude.lng;
      });
    }
      
</script>

@endsection
