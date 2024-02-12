<?php
//Array que contiene nombre de equipos (claves) y puntos obtenidos en la liga (valor).
//Se supone que no va a haber 2 equipos con la misma puntuación.
$comunidadesYcapitales=array( "Andalucía"=>"Sevilla", "Aragón"=>"Zaragoza", "Principado de Asturias"=>"Oviedo", "Islas Baleares"=>"Santa Cruz de Tenerife y Las Palmas de Gran Canaria", "Canarias"=>"Santander", "Castilla y León"=>"Valladolid", "Castilla La Mancha"=>"Toledo", "Cataluña"=>"Barcelona", "Comunidad Valenciana"=>"Valencia", "Extremadura"=>"Mérida", "Galicia"=>"Santiago de Compostela", "Comunidad de Madrid"=>"Madrid", "Región de Murcia"=>"Murcia", "Comunidad Foral de Navarra"=>"Pamplona", "País Vasco"=>"Vitoria-Gasteiz", "La Rioja"=>"Logroño", "Ceuta"=>"Ceuta", "Melilla"=>"Melilla",);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoja 5. Ejercicio 3</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body>
    <header>
        <h1>EXAMEN 1ªEVALUACION</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1 class="titulo11" style="color:red;text-align: center;">EJERCICIO 2</h1>
            <br><br>
            <h2>Autonomias y capitales</h2>
            <br><br>
            <p>Esta aplicacion es un juego sobre conocimientos geograficos políticos de españa</p>
            <br><br>
            <h2>Enlaza la ciudad con la region a la que pertenece</h2>
            <br>
		<div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print "<form action='ejer2.php' method='GET'>";
    print "<label for='desplegable' style='font-size:12pt;'>Elija la comunidad autónoma:&nbsp;</label>";
    print "<select id='desplegable' name='indice'>";
    //Ordenamos el array por clave para que el menú de selección muestre los equipos en orden alfabético
    ksort($comunidadesYcapitales);

    foreach($comunidadesYcapitales as $nombre => $p) {
        print "<option value='$nombre'>$nombre</option>";
    }
    print "</select><br><br>";
    print "</form>";
    print "<br><br>";
    print "<form action='ejer2.php' method='GET'>";
    print "<label for='desplegable' style='font-size:12pt;'>Elija su capital:&nbsp;</label>";
    print "<select id='desplegable' name='indice'>";
    //Ordenamos el array por clave para que el menú de selección muestre los equipos en orden alfabético
    ksort($comunidadesYcapitales);

    foreach($comunidadesYcapitales as $nombre => $p) {
        print "<option value='$p'>$p</option>";
    }
    print "</select><br><br>";
    print "<input type='submit' value='Comprobar'/>";
    print "</form>";
    print "<br><br>";

}else{//No he consegido hacer nada que me funcione correctamente
}
?>
	</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>