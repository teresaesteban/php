<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function esprimo($numero) {
    if ($numero <= 1) {
        return false;
    }
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i === 0) {
            return false;
        }
    }
    return true;
}

$numero = rand(1,100); // Cambia este número por el que quieras comprobar

if (esprimo($numero)) {
    echo $numero . " es un número primo.";
} else {
    echo $numero . " no es un número primo.";
}
?>

</body>
</html>