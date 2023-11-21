var map;
function initMap() {
    map = new google.maps.Map(document.getElementById("maps"), {
        center: {
            lat: -6.175392,
            lng: 106.827153,
        },
        zoom: 15,
    });
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                var marker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "Lokasi Saat Ini",
                });
                map.setCenter(userLocation);
                // Mengisi nilai latitude dan longitude ke dalam input teks
                document.getElementById("latitudeInput").value =
                    userLocation.lat;
                document.getElementById("longitudeInput").value =
                    userLocation.lng;
            },
            function (error) {
                console.error("Error: " + error.message);
            }
        );
    } else {
        console.error("Error: Your browser doesn't support geolocation.");
    }
}
