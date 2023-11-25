<!DOCTYPE html>
<html>
<head>
    <title>Intervalo de Número Aleatorio</title>
</head>
<body>
    <h1>Intervalo de Número Aleatorio</h1>

    <?php
    $numeroAleatorio = rand(0, 500); // Genera un número aleatorio entre 0 y 500

    echo "<p>Número aleatorio generado: $numeroAleatorio</p>";

    if ($numeroAleatorio >= 0 && $numeroAleatorio < 100) {
        echo "<p>El número está en el intervalo [0,100).</p>";
    } elseif ($numeroAleatorio >= 100 && $numeroAleatorio < 200) {
        echo "<p>El número está en el intervalo [100,200).</p>";
    } elseif ($numeroAleatorio >= 200 && $numeroAleatorio < 300) {
        echo "<p>El número está en el intervalo [200,300).</p>";
    } elseif ($numeroAleatorio >= 300 && $numeroAleatorio < 400) {
        echo "<p>El número está en el intervalo [300,400).</p>";
    } elseif ($numeroAleatorio >= 400 && $numeroAleatorio <= 500) {
        echo "<p>El número está en el intervalo [400,500].</p>";
    }
    ?>
</body>
</html>
