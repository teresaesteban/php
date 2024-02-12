<!DOCTYPE html>
<html lang="es">
<head>
    <title>Números Pares e Impares</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid green;border-collapse:collapse;}
        th,td {border:2px solid green;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Números Pares e Impares</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Función para verificar si un número es par
            function esPar($numero) {
                return $numero % 2 == 0;
            }

            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valorLimite = $_POST["valorLimite"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($valorLimite) || $valorLimite <= 0) {
                    echo "<p>Por favor, ingrese un valor válido y positivo.</p>";
                } else {
                    // Separar números pares e impares menores o iguales que el valor límite
                    $numerosPares = [];
                    $numerosImpares = [];
                    for ($i = 1; $i <= $valorLimite; $i++) {
                        if (esPar($i)) {
                            $numerosPares[] = $i;
                        } else {
                            $numerosImpares[] = $i;
                        }
                    }

                    // Mostrar los resultados en tablas HTML
                    echo "<table>";
                    echo "<tr><th>Números Pares</th></tr>";
                    foreach ($numerosPares as $par) {
                        echo "<tr><td>$par</td></tr>";
                    }
                    echo "</table>";

                    echo "<table>";
                    echo "<tr><th>Números Impares</th></tr>";
                    foreach ($numerosImpares as $impar) {
                        echo "<tr><td>$impar</td></tr>";
                    }
                    echo "</table>";
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="valorLimite">Ingrese un valor:</label>
                <input type="text" id="valorLimite" name="valorLimite">
                <input type="submit" value="Separar Pares e Impares">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
