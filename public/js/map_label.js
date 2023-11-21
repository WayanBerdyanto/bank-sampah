// map_label.js

var map;
function initMapLabel() {
    map = new google.maps.Map(document.getElementById("maplabel"), {
        center: {
            lat: -6.175392,
            lng: 106.827153,
        },
        zoom: 15,
    });

    // Get the user label from the data attribute
    var userLabel = document.getElementById("userLabel").getAttribute("data-user-label") || "L";

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
                    label: {
                        text: userLabel,
                        color: "black",
                    },
                });

                map.setCenter(userLocation);

                // Mengisi nilai latitude dan longitude ke dalam input teks
                document.getElementById("latitudeInput").value = userLocation.lat;
                document.getElementById("longitudeInput").value = userLocation.lng;
            },
            function (error) {
                console.error("Error: " + error.message);
            }
        );
    } else {
        console.error("Error: Your browser doesn't support geolocation.");
    }
}
