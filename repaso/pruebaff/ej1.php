<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Amigos</title>
</head>
<body>

<?php

function sumaDivisores($numero) {
    $suma = 0;
    for ($i = 1; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $suma += $i;
        }
    }
    return $suma;
}

function sonAmigos($num1, $num2) {
    return sumaDivisores($num1) == $num2 && sumaDivisores($num2) == $num1;
}

$numero1 = 220;
$numero2 = 284;

echo "<p>El primer par de números amigos es ($numero1, $numero2).</p>";

if (sonAmigos($numero1, $numero2)) {
    echo "<p>¡Los números son amigos!</p>";
} else {
    echo "<p>Los números no son amigos.</p>";
}

?>

</body>
</html>
