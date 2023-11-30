<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Función que calcula la suma de los divisores propios de un número
function sumaDivisoresPropios($numero) {
    $suma = 0;

    for ($i = 1; $i <= $numero -1; $i++) {
        if ($numero % $i == 0) {
            $suma += $i;
        }
    }

    return $suma;
}

// Función que verifica si dos números son amigos
function sonAmigos($num1, $num2) {
    // Calcula las sumas de los divisores propios de cada número
    $sumaDivisoresNum1 = sumaDivisoresPropios($num1);
    $sumaDivisoresNum2 = sumaDivisoresPropios($num2);

    // Verifica si son amigos comparando las sumas de los divisores
    return ($sumaDivisoresNum1 == $num2) && ($sumaDivisoresNum2 == $num1);
}

// Programa principal para probar la función
$numero1 = 56;
$numero2 = 89;

if (sonAmigos($numero1, $numero2)) {
    echo "$numero1 y $numero2 son números amigos.\n";
} else {
    echo "$numero1 y $numero2 no son números amigos.\n";
}

?>

</body>
</html>