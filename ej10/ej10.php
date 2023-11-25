<!DOCTYPE html>
<html>
<head>
    <title>Verificar si un número es primo</title>
</head>
<body>
    <h1>Verificar si un número es primo</h1>

    <form method="post">
        <label for="numero">Ingrese un número entero positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <input type="submit" value="Verificar Primo">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $esPrimo = esPrimo($numero);

        if ($esPrimo) {
            echo "<p>$numero es un número primo.</p>";
        } else {
            echo "<p>$numero no es un número primo.</p>";
        }
    }

    function esPrimo($n) {
        if ($n <= 1) {
            return false;
        }

        for ($i = 2; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }

        return true;
    }
    ?>
</body>
</html>
