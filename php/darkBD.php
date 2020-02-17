<?php

class Database
{
    function initBasedatos()
    {
        $db = new mysqli('localhost', 'DBUSER2018', 'DBPSWD2018');
        if ($db->connect_error) {
            echo "<h2>ERROR de conexión:" . $db->connect_error . ". No existe el usuario</h2>";
            exit();
        } else {
            echo "<h2>Conexión establecida</h2>";
        }

        $SQL = "CREATE DATABASE IF NOT EXISTS dark COLLATE utf8_spanish_ci";
        if ($db->query($SQL)) {
            echo "<h2>Base de datos Estrenos creada</h2>";
        } else {
            echo "<h2>ERROR en la creación de la Base de Datos Estrenos</h2>";
            exit();
        }

        $db->select_db("dark");

        $crearFamilia = "CREATE TABLE IF NOT EXISTS familia(
                    familia_id varchar(50) not null,
                    nombre varchar(15) not null,
                    numero numeric,
                    primary key (familia_id));";

        if ($db->query($crearFamilia)) {
            echo "<p> Tabla Familia creada</p>";
        } else {
            echo "<p>Error creando la tabla Familia</p>";
            exit();
        }

        $crearPersonaje = "CREATE TABLE IF NOT EXISTS personaje(
                    personaje_id varchar(50) not null,
                    nombre varchar(15) not null,
                    apellido varchar(15),
                    oficio varchar(15),
                    familia_id varchar(50),
                    primary key (personaje_id),
                    constraint familia_id FOREIGN KEY(familia_id) REFERENCES familia(familia_id));";

        if ($db->query($crearPersonaje)) {
            echo "<p> Tabla Personaje creada</p>";
        } else {
            echo "<p>Error creando la tabla Personaje</p>";
            echo "<script>console.log(' . $db->error . ')</script>";
            exit();
        }

        $crearActor = "CREATE TABLE IF NOT EXISTS actor(
                    actor_id varchar(50) not null,
                    nombre varchar(15) not null,
                    apellido varchar(15) not null,
                    edad numeric,
                    nacionalidad varchar(30),
                    anio numeric,
                    personaje_id varchar(50),
                    primary key (actor_id),
                    constraint personaje_id FOREIGN KEY(personaje_id) REFERENCES personaje(personaje_id));";


        if ($db->query($crearActor)) {
            echo "<p> Tabla Actor creada</p>";
        } else {
            echo "<p>Error creando la tabla Actor</p>";
            exit();
        }

        $db->close();
    }

    function cargarDatos()
    {
        $db = new mysqli('localhost', 'DBUSER2018', 'DBPSWD2018');
        if ($db->connect_error) {
            exit();
        }
        $db->select_db("dark");

        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (1,'Jonas','Kahnwald','Estudiante',1)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (2,'Hannah','Kahnwald','Masajista',1)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (3,'Inés','Kahnwald','Enfermera',1)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (4,'Daniel','Kahnwald','Jefe de Policía',1)");

        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (5,'Mikkel/Michael','Nielsen','Estudiante',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (6,'Martha','Nielsen','Estudiante',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (7,'Magnus','Nielsen','Estudiante',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (8,'Katharina','Nielsen','Directora Instituto',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (9,'Ulrich','Nielsen','Policía',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (10,'Mads','Nielsen','Estudiante',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (11,'Tronte','Nielsen','Periodista',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (12,'Jana','Nielsen','Ama de casa',2)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (13,'Agnes','Nielsen','Ama de casa',2)");

        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (14,'Bartosz','Tiedemann','Estudiante',3)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (15,'Regina','Tiedemann','Directora Hotel',3)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (16,'Aleksander','Tiedemann','Director Central Nuclear',3)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (17,'Claudia','Tiedemann','Directora Centrla Nuclear',3)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (18,'Egon','Tiedemann','Jefe de Policía',3)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (19,'Doris','Tiedemann','Ama de casa',3)");

        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (20,'Elisabeth','Doppler','Estudiante',4)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (21,'Franziska','Doppler','Estudiante',4)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (22,'Charlotte','Doppler','Jefa de Policía',4)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (23,'Peter','Doppler','Psicólogo',4)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (24,'Helge','Doppler','Barrendero',4)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (25,'Bernd','Doppler','Director Central Nuclear',4)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (26,'Greta','Doppler','Ama de casa',4)");

        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (27,'Noah',NULL,'Pastor de la Iglesia',NULL)");
        mysqli_query($db, "INSERT INTO personaje (personaje_id,nombre,apellido,oficio, familia_id) VALUES (28,'H.G.','Tannhaus','Relojero',NULL)");

        mysqli_query($db, "INSERT INTO familia (familia_id,nombre,numero) VALUES (1,'Kahnwald', 4)");
        mysqli_query($db, "INSERT INTO familia (familia_id,nombre,numero) VALUES (2,'Nielsen', 9)");
        mysqli_query($db, "INSERT INTO familia (familia_id,nombre,numero) VALUES (3,'Tiedemann', 6)");
        mysqli_query($db, "INSERT INTO familia (familia_id,nombre,numero) VALUES (4,'Doppler', 7)");

        // ACTORES
        // JONAS
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (1,'Louis','Holfmann',22,'Alemania',2019,1)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (2,'Andreas','Pietschmann',50,'Alemania',2052,1)");

        // HANNAH
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (3,'Maja','Schone',43,'Alemania',1986,2)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (4,'Ella','Lee',16,'Alemania',2019,2)");

        // INES
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (5,'Angela','Winkler',75,'Alemania',2019,3)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (6,'Anne','Rate-Polle',45,'Alemania',1986,3)");

        // DANIEL
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (7,'Florian','Panzner',42,'Alemania',1953,4)");

        // MICHAEL / MIKKEL
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (8,'Daan Lennard','Liebrenz',14,'Alemania',1986,5)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (9,'Sebastian','Rudolph',51,'Alemania',2019,5)");

        // MARTHA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (10,'Lisa','Vicari',22,'Alemania',2019,6)");

        // MAGNUS
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (11,'Moritz','Jahn',24,'Alemania',2019,7)");

        // KATHARINA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (12,'Jordis','Triebel',41,'Alemania',2019,8)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (13,'Nele','Trebs',19,'Alemania',1986,8)");

        // ULRICH
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (14,'Oliver' ,'Masucci',50,'Alemania',2019,9)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (15,'Ludger' ,'Bokerlmann',23,'Alemania',1986,9)");

        // MADS
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (16,'Valentin' ,'Oppermann',11,'Alemania',1986,10)");

        // TRONTE
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (17,'Walter','Kreye',76,'Alemania',2019,11)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (18,'Felix','Kramer',46,'Alemania',1986,11)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (19,'Joshio','Marlon',13,'Alemania',1953,11)");

        // JANA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (20,'Anne','Lebinsky',43,'Alemania',1986,12)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (21,'Tatja','Seibt',76,'Alemania',2019,12");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (22,'Rike','Sindler',10,'Alemania',1953,12)");

        // AGNES
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (23,'Antje','Traue',38,'Alemania',1953,13)");

        // BARTOSZ
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (24,'Paul','Lux',25,'Alemania',2019,14)");

        // REGINA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (25,'Deborah','Kaufmann',49,'Alemania',2019,15)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (26,'Lydia Maria','Makrides',17,'Alemania',1986,15)");

        // ALEKSANDER
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (27,'Peter','Benedict',56,'Alemania',2019,16)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (28,'Béla Gabor','Lenz',22,'Alemania',1986,16)");

        // CLAUDIA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (29,'Lisa','Kreuzer',74,'Alemania',2019,17)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (30,'Julika','Jenkins',48,'Alemania',1986,17)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (31,'Gwendolyn','Gobel',13,'Alemania',1953,17)");

        // EGON
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (32,'Christian','Patzold',58,'Alemania',1986,18");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (33,'Sebastian','Hulk',44,'Alemania',1953,18");

        // DORIS
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (34,'Luise','Heyer',34,'Alemania',1953,19");

        // ELISABETH
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (35,'Carlotta von','Falkenhayn',12,'Alemania',2019,20)");

        // FRANZISKA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (36,'Gina','Stiebitz',21,'Alemania',2019,21)");

        // CHARLOTTE
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (37,'Karoline' ,'Eichhorn',54,'Alemania',2019,22)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (38,'Stephanie','Amarell',23,'Alemania',1986,22)");

        // PETER
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (39,'Stephan','Kampwirth',52,'Alemania',2019,23)");

        // HELGE
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (40,'Hermann','Beyer',76,'Alemania',2019,24)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (41,'Peter','Scheneider',44,'Alemania',1986,24)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (42,'Tom','Philipp',11,'Alemania',1953,24)");

        // BERND
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (43,'Anatole','Taubman',48,'Alemania',1953,25)");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (44,'Michael','Mendi',81,'Alemania',1986,25)");

        // GRETA
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (43,'Anatole','Taubman',48,'Alemania',1953,26)");

        // NOAH
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,ani,personaje_id) VALUES (,'Cordella','Wege',43,'Alemania',1953,27");

        // T.G. TANNHAUS
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (,'Christian','Steyer',73,'Alemania',1986,28");
        mysqli_query($db, "INSERT INTO actor (actor_id,nombre,apellido,edad,nacionalidad,anio,personaje_id) VALUES (,'Arnd','Klawitter',50,'Alemania',1953,28");

        $db->close();
    }

    function listarPersonajes()
    {
        $db = new mysqli('localhost', 'DBUSER2018', 'DBPSWD2018');
        if ($db->connect_error) {
            exit();
        }

        $db->select_db("dark");

        if ($result = $db->query("SELECT nombre,apellido,oficio FROM personaje")) {

            echo "<table border = '1'> \n";
            echo "<tr><td>Nombre</td><td>Apellido</td><td>Oficio</td></tr> \n";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['nombre'] . "</td><td>".$row['apellido']."</td><td>".$row['oficio']."</td></tr> \n";
            }
            echo "</table> \n";

        }

        $db->close();
    }

    function listarPersonajesFamilia()
    {

        $db = new mysqli('localhost', 'DBUSER2018', 'DBPSWD2018');
        if ($db->connect_error) {
            exit();
        } else {
        }

        $db->select_db("dark");

        if ($preparedS = $db->prepare("SELECT nombre,apellido,oficio FROM personaje WHERE familia_id=?")) {
            $preparedS->bind_param('s', $_POST['familia_id']);
            $preparedS->execute();
            $result = $preparedS->get_result();

            echo "<table border = '1'> \n";
            echo "<tr><td>Nombre</td><td>Apellido</td><td>Oficio</td></tr> \n";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['nombre']."</td><td>".$row['apellido']."</td><td>".$row['oficio']."</td></tr> \n";
            }
            echo "</table> \n";
        }
        $db->close();
    }
}

?>