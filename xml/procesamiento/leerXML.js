"use script";

class ReadMultimedia {

    read() {
        $(document).ready(function () {

            $.get("documeto.xml", function (xml) {

                $(xml).find("elemento").each(function () {

                    // Leer atributo de elemento
                    var numero = $(this).attr('numero');
                    var tipo = $(this).attr('tipo');

                    // Leer nodos de elemento
                    var url = $(this).find("url").text();
                    var pie = $(this).find("pie").text();

                    var img = '<section><h3>'+pie+'</h3><img src="' + url + '" numero="' + numero +
                        '" alt="' + pie +'" /></section>';

                    $('main').append($(img));
                });
            });
        });

    }
}

let procesador = new ReadMultimedia();
procesador.read();