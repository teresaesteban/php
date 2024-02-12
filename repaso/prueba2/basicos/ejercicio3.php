<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {margin:auto;}
        tr {background-color:cyan;}
        tr.par {background-color:pink;}
        tr.impar {background-color:orange;}
        td, th {padding:10px;}
    </style>
    <title>Document</title>
</head>
<body>
<?php
if (!isset($_POST['dolares']) || !isset($_POST['libras'])) { // Si no se han enviado los datos, muestra el formulario
?>
    <form action="ejercicio3.php" method="post">
        <label for="dolares">Cambio de un euro a dólares</label>
        <input type="text" name="dolares" /> <br />
        <label for="libras">Cambio de un euro a libras</label>
        <input type="text" name="libras" /> <br />
        <input type="submit" value="enviar" /><br />
    </form>
<?php
} else {
    $dolares = $_POST["dolares"];
    $libras = $_POST["libras"];
    echo "<table>";
    echo "<tr>
            <th>Euros</th>
            <th>Dólares</th>
            <th>Libras</th>
          </tr>";
    for ($i = 0; $i <= 10; $i++) {
        $dolaresfinales = $i * $dolares;
        $librasfinales = $i * $libras;
        if ($i % 2 == 0) {
            echo "<tr class='par'>";
        } else {
            echo "<tr class='impar'>";
        }
        echo "<td>$i</td><td>$dolaresfinales</td><td>$librasfinales</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>