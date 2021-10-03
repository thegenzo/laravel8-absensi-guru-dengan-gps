@extends('layout.app')

@section('title', 'Lokasi Sekolah')

@push('addon-style')
<style>
    #map {
        height: 500px;
        width: 100%;
    }
    
   .custom-map-control-button {
     background-color: #fff;
     border: 0;
     border-radius: 2px;
     box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
     margin: 10px;
     padding: 0 0.5em;
     font: 400 18px Roboto, Arial, sans-serif;
     overflow: hidden;
     height: 40px;
     cursor: pointer;
   }
   .custom-map-control-button:hover {
     background: #ebebeb;
   }

</style>
    
@endpush

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Lokasi Sekolah</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-danger">
                            Fitur ini digunakan untuk menyesuaikan koordinat guru dan sekolah agar absensi bisa dilakukan, dan hanya sebagai pengujian semata
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="map"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="ubah-koordinat" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Latitude</label>
                                            <input type="text" class="form-control" name="latitude" value="{{ $koord->latitude }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Longitude</label>
                                            <input type="text" class="form-control" name="longitude" value="{{ $koord->longitude }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-round">Simpan Koordinat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiCgqFCjR9uNOe1BJ9-QN8-SS6r6d07Ik&callback=initMap&libraries=&v=weekly" async></script>

<script type="text/javascript">
    // getLocation();

    // function getLocation() {
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(showPosition);
    //     } else {
    //         alert('Geolocation tidak didukung oleh peramban ini');
    //     }
    // }

    // function showPosition(position) {
    //     var lat = position.coords.latitude;
    //     var lng = position.coords.longitude;

    //     document.getElementById('lat').value = lat;
    //     document.getElementById('lng').value = lng;
    // }
    

    function initMap() {


        const myLatlng = { lat: {{$koord->latitude}}, lng: {{$koord->longitude}} };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: myLatlng,
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            content: "Klik untuk mendapatkan koordinat lokasi di GMaps",
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
        });
    }

    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you. -5.665431872322224, 122.62142281138496
  
</script>
@endpush