<!DOCTYPE html>
<!--⦁	Hacer una página web que a partir de un valor contenido en una variable entera, cuyo valor debe estar entre 1 y 7, muestre el nombre del día de la semana correspondiente (lunes=1, martes=2  …)
 También otra versión que indique si el nº corresponde a un día laborable o a un festivo.
 -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluacion inicial</title>
</head>
<body>
<?php
    if (isset($_GET['numero1']) && isset($_GET['numero2']) && isset($_GET['numero3'])) {
        $numeros = [$_GET['numero1'], $_GET['numero2'], $_GET['numero3']];
        sort($numeros);
        echo "Números ordenados de menor a mayor: " . implode(", ", $numeros);
    }
    ?>
</body>
</html>
