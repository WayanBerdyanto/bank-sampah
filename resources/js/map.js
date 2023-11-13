var map, mapOptions;
var pinInfobox = null;
var loc;
var existingPin = null;
var isPinAdded = false;

function GetMap() {
    var bingkey = "AjXKMCtulq4nJHNAOduup_pZA-263SCe3nZPT9kOGv0maVrYwYTlSc7Uk6LOUgv4";
    navigator.geolocation.getCurrentPosition(function(position) {
        var loc = new Microsoft.Maps.Location(
            position.coords.latitude,
            position.coords.longitude);

        // Add a pushpin at the user's location.
        existingPin = new Microsoft.Maps.Pushpin(loc);
        map.entities.push(existingPin);

        // Set the center of the map to the user's location.
        map.setView({
            center: loc,
            zoom: 15.2
        });
    });

    mapOptions = {
        credentials: bingkey,
        mapTypeId: Microsoft.Maps.MapTypeId.aerial
    }

    map = new Microsoft.Maps.Map(document.getElementById("myMap"), mapOptions);
    Microsoft.Maps.Events.addHandler(map, 'click', addManualMarker);
}

function addManualMarker(e) {
    // Remove the existing pin if it exists.
    if (existingPin) {
        map.entities.remove(existingPin);
    }

    var point = new Microsoft.Maps.Point(e.getX(), e.getY());
    var locTemp = e.target.tryPixelToLocation(point);
    var location = new Microsoft.Maps.Location(locTemp.latitude, locTemp.longitude);

    // Add a new pushpin at the manually selected location.
    var pin = new Microsoft.Maps.Pushpin(location, {
        'draggable': false
    });
    map.entities.push(pin);

    // Store the reference to the added pin for later removal.
    existingPin = pin;

    document.getElementById("latitude").value = locTemp.latitude;
    document.getElementById("longitude").value = locTemp.longitude;
}