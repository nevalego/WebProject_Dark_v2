"use script";

class WindemMap {

    constructor() {
        this.latMadrid=40.4165000;
        this.lngMadrid=-3.7025600;
        this.map=null;
        this.infoWindow = new google.maps.InfoWindow;
        this.initMap();
    }

    initMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(this.mostrar, this.errores);
        } else {
            alert("GeolocaciÃ³n no soportada por navegador.");
        }
    }

    mostrar() {

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                this.infoWindow.setPosition(pos);
                this.infoWindow.setContent('Location found.');

                var waypts = [{ location: { lat: 41.94, lng: 1.56 }, stopover: true },
                    { location: {lat: position.coords.latitude, lng: position.coords.longitude}, stopover: true },
                    { location: { lat: this.latMadrid, lng: this.lngMadrid }, stopover: true }];

                this.map = new google.maps.Map(document.getElementById('map'), {
                    el: '#map',
                    lat: waypts[0].location.lat,
                    lng: waypts[0].location.lng,
                    zoom: 4
                });
                this.map.drawRoute({
                    origin: [waypts[0].location.lat, waypts[0].location.lng],
                    destination: [waypts[waypts.length - 1].location.lat, waypts[waypts.length - 1].location.lng],
                    travelMode: 'walking',
                    strokeColor: '#0054c2',
                    strokeOpacity: 0.6,
                    strokeWeight: 6
                });

            }, function () {
                handleLocationError(true, this.infoWindow, this.map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
}
var mapaW = new WindemMap();