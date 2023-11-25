<!DOCTYPE html>
<html>
<head>
    <title>Serie de Fibonacci</title>
</head>
<body>
    <h1>Los primeros 20 términos de la Serie de Fibonacci</h1>

    <ul>
        <?php
        $n = 20; // Número de términos a mostrar

        $fibonacci = array(0, 1); // Inicializamos los dos primeros términos
        echo "<li>F0: 0</li><li>F1: 1</li>";

        for ($i = 2; $i < $n; $i++) {
            $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
            echo "<li>F$i: " . $fibonacci[$i] . "</li>";
        }
        ?>
    </ul>
</body>
</html>
