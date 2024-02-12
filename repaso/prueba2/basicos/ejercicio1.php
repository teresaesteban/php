<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(!$_POST) { //si no existe $_POST, el formulario se debe mostrar
?>
    <form action="ejercicio1.php" method="post">
        <label for="nombre">Escriba su nombre</label>
        <input type="text" name="nombre" /> <br />
        <label for="apellidos">Escriba sus apellidos</label>
        <input type="text" name="apellidos" /> <br />
        <p>Pregunta 1: Marca la respuesta correcta</p>
        <input type="radio" name="opcion" value="uno" />Opcion1<br />
        <input type="radio" name="opcion" value="dos" checked="checked" />Opcion2<br />
        <p>Pregunta 2: Marca la respuesta correcta o respuestas correctas</p>
        <input type="checkbox" name="opcion2[]" value="uno1" />Opcion1<br />
        <input type="checkbox" name="opcion2[]" value="dos2" checked="checked" />Opcion2<br />
        <input type="submit" value="enviar" /><br />5
    </form>
<?php
} else {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    print "<p>Bienvenido, $nombre $apellidos.</p>";
    // Procesar respuestas del formulario
    if (isset($_GET['opcion']) && $_GET["opcion"] == "uno") {
        print "<p>Respuesta a pregunta 1 correcta.</p>";
    } else {
        print "<p>Respuesta a pregunta 1 incorrecta.</p>";
    }

    if (isset($_POST['opcion2']) && (in_array("uno1", $_POST['opcion2']) || in_array("dos2", $_POST['opcion2']))) {
        print "<p>Respuesta a pregunta 2 correcta.</p>";
    } else {
        print "<p>Respuesta a pregunta 2 incorrecta.</p>";
    }}
?>
</body>
</html>
