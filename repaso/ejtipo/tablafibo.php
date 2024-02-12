<!DOCTYPE html>
<html lang="es">
<head>
    <title>Secuencia Fibonacci</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid purple;border-collapse:collapse;}
        th,td {border:2px solid purple;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Secuencia Fibonacci</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Función para generar la secuencia Fibonacci hasta un cierto límite
            function generarFibonacci($limite) {
                $fibonacci = [0, 1];
                while (end($fibonacci) + prev($fibonacci) <= $limite) {
                    $fibonacci[] = end($fibonacci) + prev($fibonacci);
                }
                return $fibonacci;
            }

            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valorLimite = $_POST["valorLimite"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($valorLimite) || $valorLimite <= 0) {
                    echo "<p>Por favor, ingrese un valor válido y positivo.</p>";
                } else {
                    // Generar secuencia Fibonacci hasta el valor límite
                    $secuenciaFibonacci = generarFibonacci($valorLimite);

                    // Mostrar los resultados en una tabla HTML
                    if (empty($secuenciaFibonacci)) {
                        echo "<p>No hay números en la secuencia Fibonacci menores o iguales que $valorLimite.</p>";
                    } else {
                        echo "<table>";
                        echo "<tr><th>Secuencia Fibonacci</th></tr>";
                        foreach ($secuenciaFibonacci as $numero) {
                            echo "<tr><td>$numero</td></tr>";
                        }
                        echo "</table>";
                    }
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="valorLimite">Ingrese un valor:</label>
                <input type="text" id="valorLimite" name="valorLimite">
                <input type="submit" value="Generar Secuencia Fibonacci">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
