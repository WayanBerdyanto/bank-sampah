@extends('pengguna.layouts.main')
@section('content')
    <div class="p-4 sm:ml-20" id="close">
        <div class="py-4 px-10 border- mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <input type="text" id="latitudeInput" name="latitudeInput" class="border border-black" readonly>
                <input type="text" id="longitudeInput" name="longitudeInput" readonly>

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
                <script>
                    var map;

                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: -6.175392,
                                lng: 106.827153
                            },
                            zoom: 15
                        });

                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                var userLocation = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };

                                var marker = new google.maps.Marker({
                                    position: userLocation,
                                    map: map,
                                    title: 'Lokasi Saat Ini'
                                });

                                map.setCenter(userLocation);

                                // Mengisi nilai latitude dan longitude ke dalam input teks
                                document.getElementById('latitudeInput').value = userLocation.lat;
                                document.getElementById('longitudeInput').value = userLocation.lng;
                            }, function(error) {
                                console.error('Error: ' + error.message);
                            });
                        } else {
                            console.error('Error: Your browser doesn\'t support geolocation.');
                        }
                    }
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
