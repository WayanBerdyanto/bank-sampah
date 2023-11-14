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

            <div class="flex items-center justify-center h-96 mb-4 rounded bg-gray-50 dark:bg-gray-800" id="map">
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-
                                   20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                <script>
                    // Initialize the map
                    var map = L.map('map').setView([0, 0], 30);
                    // Add a basemap (e.g., OpenStreetMap)
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <ahref = "http://www.openstreetmap.org/copyright" > OpenStreetMap < /a>'
                    }).addTo(map);

                    // Get the user's geolocation and add a marker
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var lat = position.coords.latitude;
                        var lon = position.coords.longitude;
                        map.setView([lat, lon], 18);
                        var userLocation = L.marker([lat, lon]).addTo(map);
                        userLocation.bindPopup('You are here!').openPopup();
                    });
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
