var map, mapoptions;
var pinInfobox = null;
var loc;
var existingPin = null;
var isPinAdded = false;

function GetMap() {
    var bingkey = "AjXKMCtulq4nJHNAOduup_pZA-263SCe3nZPT9kOGv0maVrYwYTlSc7Uk6LOUgv4";
    navigator.geolocation.getCurrentPosition(function (position) {
        loc = new Microsoft.Maps.Location(
            position.coords.latitude,
            position.coords.longitude);

        // Isi nilai awal input "Latitude" dan "Longitude" dengan lokasi saat ini.
        document.getElementById("latitude").value = loc.latitude;
        document.getElementById("longitude").value = loc.longitude;

        // Add a pushpin at the user's location.
        var pin = new Microsoft.Maps.Pushpin(loc);
        map.entities.push(pin);
    });

    mapOptions = {
        credentials: bingkey,
        center: loc,
        zoom: 15.2,
        mapTypeId: Microsoft.Maps.MapTypeId.aerial
    }

    map = new Microsoft.Maps.Map(document.getElementById("myMap"), mapOptions);
    // Microsoft.Maps.Events.addHandler(map, 'click', getLatlng);
}


function getLatlng(e) {
    if (e.targetType == "map") {
        var point = new Microsoft.Maps.Point(e.getX(), e.getY());
        var locTemp = e.target.tryPixelToLocation(point);
        var location = new Microsoft.Maps.Location(locTemp.latitude, locTemp.longitude);

        // Hapus pin yang sudah ada jika ada.
        if (existingPin) {
            map.entities.remove(existingPin);
        }

        // Buat elemen HTML untuk ikon Bootstrap.
        var iconHTML = '<span class="bi bi-geo-fill" style="font-size: 24px;"></span>';

        // Buat overlay custom untuk ikon tersebut.
        var customIcon = new Microsoft.Maps.CustomOverlay({
            htmlContent: iconHTML,
            position: location
        });

        // Tambahkan overlay custom ke peta.
        map.layers.insert(customIcon);
        
        existingPin = customIcon;
        document.getElementById("latitude").value = locTemp.latitude;
        document.getElementById("longitude").value = locTemp.longitude;
        isPinAdded = true;
    }
}
