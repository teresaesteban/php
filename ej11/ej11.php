<!DOCTYPE html>
<html>
<head>
    <title>Verificar si un número es perfecto</title>
</head>
<body>
    <h1>Verificar si un número es perfecto</h1>

    <form method="post">
        <label for="numero">Ingrese un número entero positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <input type="submit" value="Verificar Perfecto">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $esPerfecto = esNumeroPerfecto($numero);

        if ($esPerfecto) {
            echo "<p>$numero es un número perfecto.</p>";
        } else {
            echo "<p>$numero no es un número perfecto.</p>";
        }
    }

    function esNumeroPerfecto($n) {
        if ($n <= 1) {
            return false;
        }

        $sumaDivisores = 1; // Inicializamos la suma con 1 (ya que 1 siempre es divisor)

        for ($i = 2; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                $sumaDivisores += $i;
                if ($i * $i != $n) {
                    $sumaDivisores += $n / $i;
                }
            }
        }

        return $sumaDivisores == $n;
    }
    ?>
</body>
</html>
