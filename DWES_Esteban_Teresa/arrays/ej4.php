<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>

</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja">
    <?php include "../includes/nav_arrays.php"; ?>

    <main>
    <h1 style="text-align: center;">FUNCIONES ARRAY</h1>
<?php
// Genera un array con números enteros del 1 al 20 (inclusive)
$numbers = range(1, 20);

// Filtra los números pares
$evenNumbers = array_filter($numbers, function ($number) {
    return $number % 2 == 0;
});

// Eleva al cuadrado los números pares
$squaredNumbers = array_map(function ($number) {
    return $number ** 2;
}, $evenNumbers);

// Calcula la suma de los números al cuadrado
$sumOfSquares = array_reduce($squaredNumbers, function ($carry, $number) {
    return $carry + $number;
}, 0);

print "<br><br>Array generado: " . implode(", ", $numbers) . "<br><br>";

// Ordena el array de números alfabéticamente en orden ascendente
arsort($numbers);

print "Números pares originales: " . implode(", ", $evenNumbers) . "<br><br>";
print "Números al cuadrado: " . implode(", ", $squaredNumbers) . "<br><br>";
print "Suma de los números al cuadrado: $sumOfSquares<br><br>";
print "Lista ordenada en orden descendente: " . implode(", ", $numbers) . "<br><br>";
?>
</main >
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>