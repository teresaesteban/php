<!DOCTYPE html>
<html>
<head>
    <title>Divisores Positivos</title>
</head>
<body>
    <h1>Divisores Positivos</h1>

    <form method="post">
        <label for="numero">Ingrese un número entero positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <input type="submit" value="Calcular Divisores">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        echo "<h2>Divisores positivos de $numero:</h2>";

        echo "1"; // 1 es siempre un divisor positivo

        for ($i = 2; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                echo ", $i";
            }
        }
    }
    ?>
</body>
</html>
