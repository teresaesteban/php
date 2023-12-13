<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>
</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja">
    <?php include "../includes/nav_basicos.php"; ?>
    <main>
<?php
if (!$_REQUEST) {
    ?>
     <h1 style="text-align: center;">CONVERSOR MONEDAS</h1>

    <form action="#" method="post">
    <p>
      Introduce cantidad de euros a cambiar:
      <input type="number" name="cantidad" min="0" step="0.01"><br><br>
      Selecciona moneda destino:
      <select name="tipo">
        <option value="dolar">Dólar Estadounidense</option>
        <option value="libra">Libra Esterlina</option>
      </select>
    </p>
    <input type="submit" value="Enviar" name="enviar">
  </form>
<?php
} else {
    $cantidad = $_REQUEST['cantidad'];
    $moneda   = $_REQUEST['tipo'];
    $dolar    = 1.0563;
    $libra    = 0.8678;
    if ($moneda == 'dolar') {
        $cambio = $cantidad * $dolar;
        print "$cantidad euros equivalen a $cambio dólares estadounidenses.<br>";
    } else {
        $cambio = $cantidad * $libra;
        print "$cantidad euros equivalen a $cambio libras esterlinas.<br>";
    }
    ?>
    <br><a href="ejer2.php">Volver a pedir nueva conversión</a>
    <?php
}
?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>