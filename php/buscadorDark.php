<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML de pruebas PHP - Proyecto Estrenos - Software y Estándares para la Web</title>
    <meta name="author" content="Nerea Valdés Egocheaga"/>
    <meta name="description" content="Pruebas PHP Estrenos"/>
    <meta name="keywords" content="HTML,Estrenos,series,Netflix,PHP"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
</head>
<body>
<header>
    <h1>Dark</h1>
    <nav>
            <ul>
                <li><a href="../html/index.html">Inicio</a></li>
                <li><a href="../html/historia.html">Historia</a></li>
                <li><a href="../xml/xsl/cronologia.html">Cronología</a></li>
                <li><a href="../html/personajes.html">Personajes</a></li>
                <li><a href="../html/familias.html">Mapa Familiar</a></li>
                <li><a href="../html/buscadorDark.php">Buscador</a></li>
                <li><a href="../html/teorias.html">Teorias</a></li>
                <li><a href="../html/explicacion.html">Explicacion</a></li>
                <li><a href="../EcmaScript/estrenos.html">Estrenos</a></li>
                <li><a href="../EcmaScript/windem.html">Windem</a></li>
                <li><a href="../xml/procesamiento/multimedia.html">Fotos</a></li>
            </ul>
        </nav>
</header>
<main>

    <?php
    include("darkBD.php");
    $darkBD = new Database();

    $darkBD->initBasedatos();
    $darkBD->cargarDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['todos'])) $darkBD->listarPersonajes();
        if (isset($_POST['familia'])) $darkBD->listarPersonajesFamilia($_POST['familia_id']);
    }

    echo "<form action='#' method='post' name='buttons'>
                <input type = 'submit' class='button' name = 'todos' value = 'Ver todos los personajes'/>
                <p>Introduce el id de una familia 1,2,3 o 4</p>  
                <p><input type='text' name='familia_id' >
                <input type = 'submit' class='button' name = 'familia' value = 'Ver familia'/></p>
               </form>";


    ?>
</main>
</body>
<footer>
    <h4>Más información:</h4>
    <address>
        <p> Autor: Nerea Valdés Egocheaga</p>
        <p>Más detalles:
            <a href="mailto:nereavaldes@outlook.com">nereavaldes@outlook.com</a></p></address>

    <p>
        <a href="http://validator.w3.org/check/referer" hreflang="en-us"> <img
                    src="../multimedia/valid-html5-button.png"
                    alt="¡HTML5  válido!" height="31"
                    width="87"/></a>
        <a href="http://jigsaw.w3.org/css-validator/validator?uri=http://di002.edv.uniovi.es/~cueva/css/miestilo.css"><img
                    height="31" width="88" src="../multimedia/vcss.gif" alt="¡CSS válido!"/></a>
    </p>
</footer>
</html>