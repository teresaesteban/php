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
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        $dias = ["", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
        if ($numero >= 1 && $numero <= 7) {
            echo "Día de la semana: " . $dias[$numero];
        } else {
            echo "El número debe estar entre 1 y 7.";
        }
    }
    ?>
</body>
</html>
