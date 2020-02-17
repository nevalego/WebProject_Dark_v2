"use script";

class WindemMap {
    constructor() {
        this.latitud=48.148825;
        this.longitud=8.043453;
        this.datos=new Map();
        this.initMap();
    }

    initMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(this.mostrar, this.errores);
        } else {
            alert("Geolocación no soportada por navegador.");
        }
    }

    mostrar() {
        var map = new google.maps.Map(document.getElementsByTagName('main')[0], {
            zoom: 12,
            center: {lat: this.latitud,
                lng: this.longitud}
        });
        var marker = new google.maps.Marker({
            position: {lat: this.latitud,
                lng: this.longitud},
            map: map,
            title:'Windem'
        });
    }

    errores(error) {
        alert('Error: ' + error.code + ' ' + error.message);
    }
}
var mapaW = new WindemMap();