<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Multiplicar</title>
</head>
<body>
    <h1>Tabla de Multiplicar</h1>

    <form method="post">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero">
        <input type="submit" value="Generar Tabla">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        echo "<h2>Tabla de multiplicar del número $numero:</h2>";

        // Usando while
        echo "<h3>Usando while:</h3>";
        $i = 1;
        while ($i <= 10) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado<br>";
            $i++;
        }

        // Usando do-while
        echo "<h3>Usando do-while:</h3>";
        $i = 1;
        do {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado<br>";
            $i++;
        } while ($i <= 10);

        // Usando for
        echo "<h3>Usando for:</h3>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado<br>";
        }
    }
    ?>
</body>
</html>
