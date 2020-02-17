"use script";

class Estrenos {
    constructor() {
        this.apiKey = 'a5b8fe70c172015d51961225ca93b6ac';
        this.urlImage = 'https://image.tmdb.org/t/p/w500';
        this.url = 'https://api.themoviedb.org/3/tv/70523?api_key=' + this.apiKey + '&language=es-ES';
        this.name = '';
        this.Mapskey='AIzaSyDOtnSjoli1L8hdiBQ1iCjKSCquMlQFPzI';
    }

    cargarDatos() {
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: function (json) {
                dark.mostrar(json);
            },
            error: function () {
                alert("No se pudo obtener JSON de The Movie DataBase API")
            }

        });

    }

    mostrar(json) {


        let g = "<h2>";
        for(let i = 0; i < json.genres.length; i++) {
            g += json.genres[i].name+", ";
        }
        this.urlImage+= json.backdrop_path;
        $("main").append("<section><img src='"+this.urlImage+"' alt='Jonas Imagen'/></section>");
        g=g+"</h2>";
        $("main").append(g);
        $("main").append("<section><h4>Puntuación: "+ json.vote_average+"</h4>");
        $("main").append("<p> Serie de "+ json.networks[0].name+
            " creada por "+ json.created_by[0].name+
            ", producida por "+json.production_companies[0].name +"</p>");
        $("main").append("<p>"+ json.overview+"</p>");
        let t = "<section>";
        for(let i = 0; i < json.seasons.length; i++) {
            t += "<h4>"+json.seasons[i].name+"</h4>";
            t += "<p> Fecha de emisión "+ json.seasons[i].air_date+"</p>";
        }
        t=t+"</section>";
        $("main").append(t+"</section>");


    }
}

let dark = new Estrenos();
dark.cargarDatos();