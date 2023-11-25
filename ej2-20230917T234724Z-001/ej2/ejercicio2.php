<!DOCTYPE html>
<!--⦁	⦁	Hacer una página web  que calcule la longitud de la circunferencia y el área del círculo a partir de su  radio.  -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluacion inicial</title>
</head>
<body>
<?php
        $radio = $_GET['radio'];
        $longitud = 2 * pi() * $radio;
        $area = pi() * pow($radio, 2);
        echo "Longitud de la circunferencia: $longitud<br>";
        echo "Área del círculo: $area";

    ?>
</body>
</html>
