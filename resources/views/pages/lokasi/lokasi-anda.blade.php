@extends('layout.app')

@section('title', 'Lokasi Anda')

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
                <h4 class="page-title">Lokasi Anda</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Lokasi Anda
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="map"></div>
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
    

    // function initMap() {


    //     const myLatlng = { lat: -0.8814592, lng: 119.87189760000001 };
    //     const map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 17,
    //         center: myLatlng,
    //     });

    //     var marker = new google.maps.Marker({
    //         position: myLatlng,
    //         map: map,
    //     });
    // }

    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you. -5.665431872322224, 122.62142281138496
    let map, infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -5.665431872322224, lng: 122.62142281138496 },
            zoom: 16,
        });
        infoWindow = new google.maps.InfoWindow();
      
        const locationButton = document.createElement("button");
      
        locationButton.textContent = "Ketuk untuk melihat lokasi anda";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        
                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Lokasi ditemukan!");
                        infoWindow.open(map);
                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Peramban tidak mendukung geolokasi
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
        ? "Error: Layanan Geolokasi Gagal."
        : "Error: Peramban anda tidak mendukung layanan geolokasi."
    );
    infoWindow.open(map);
    }
  
</script>
@endpush