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
    <form action="ejercicio2.php" method="post">
    <label for="numero">Escriba su numero</label>
    <input type="text" name="numero" /> <br />
    <p>Elige una moneda</p>
    <select name="monedas"><p>
<option value="moneda1" >moneda1</option>
<option value="moneda2" >moneda2</option>
</select>
        <input type="submit" value="enviar" /><br />
    </form>
<?php
    $numero = $_POST["numero"];
    $numero = $_POST["numero"];
    // Procesar respuestas del formulario
    $moneda = $_POST["monedas"];

    if ($moneda == "moneda1") {
        $numerofinal = $numero * 1.93;
    } else {
        $numerofinal = $numero * 0.99;
    }

    print "El numero que me has dado $numero se convertirá a $numerofinal al seleccionar el tipo de cambio";
   }
?>
</body>
</html>
