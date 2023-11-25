<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function sumadivisores($n){
    $suma = 0;

    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) {
            $suma += $i;
        }
    }

    return $suma;
}

function esperfecto($n) {
    $suma_divisores = sumadivisores($n);
    return $suma_divisores == $n;
}

// Prueba la función esperfecto
$n = 28;
if (esperfecto($n)) {
    echo "$n es un número perfecto<br>";
} else {
    echo "$n no es un número perfecto<br>";
}

// Encuentra los números perfectos entre 1 y 1000
for ($i = 1; $i <= 1000; $i++) {
    if (esperfecto($i)) {
        echo "$i es un número perfecto<br>";
    }
}
?>

</body>
</html>
