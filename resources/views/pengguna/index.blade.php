@extends('pengguna.layouts.main')
@section('content')
    <div class="p-4 sm:ml-20" id="close">
        <div class="py-4 px-10 border- mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <input type="text" id="latitude" name="latitude">
                <input type="text" id="longitude" name="longitude">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-center h-96 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div id="map" class="container" style="height: 400px"></div>
                <script>
                    let map, infoWindow;

                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {
                                // lat: -34.397,
                                // lng: 150.644

                                lat: map.data.map.center.lat(),
                                lng: map.data.map.center.lng()
                            },
                            zoom: 6,
                        });
                        infoWindow = new google.maps.InfoWindow();

                        const locationButton = document.createElement("button");

                        locationButton.textContent = "Pan to Current Location";
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
                                        infoWindow.setContent("Location found.");
                                        infoWindow.open(map);
                                        map.setCenter(pos);
                                    },
                                    () => {
                                        handleLocationError(true, infoWindow, map.getCenter());
                                    }
                                );
                            } else {
                                // Browser doesn't support Geolocation
                                handleLocationError(false, infoWindow, map.getCenter());
                            }
                        });
                    }

                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(
                            browserHasGeolocation ?
                            "Error: The Geolocation service failed." :
                            "Error: Your browser doesn't support geolocation."
                        );
                        infoWindow.open(map);
                    }

                    window.initMap = initMap;
                </script>

                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6gdhH-9Asec5cxoNt4XMEZ6GLGMeajLw&callback=initMap"></script>
                <script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v6.3/mapsJavaScriptAPI.js" async defer>
                </script>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
