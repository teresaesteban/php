<!DOCTYPE html>
<html lang="es">
<head>
    <title>Números Primos</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid blue;border-collapse:collapse;}
        th,td {border:2px solid blue;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Números Primos</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Función para verificar si un número es primo
            function esPrimo($numero) {
                if ($numero < 2) {
                    return false;
                }
                for ($i = 2; $i <= sqrt($numero); $i++) {
                    if ($numero % $i == 0) {
                        return false;
                    }
                }
                return true;
            }

            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valorLimite = $_POST["valorLimite"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($valorLimite) || $valorLimite <= 0) {
                    echo "<p>Por favor, ingrese un valor válido y positivo.</p>";
                } else {
                    // Encontrar números primos menores o iguales que el valor límite
                    $numerosPrimos = [];
                    for ($i = 2; $i <= $valorLimite; $i++) {
                        if (esPrimo($i)) {
                            $numerosPrimos[] = $i;
                        }
                    }

                    // Mostrar los resultados en una tabla
                    if (empty($numerosPrimos)) {
                        echo "<p>No se encontraron números primos menores o iguales que $valorLimite.</p>";
                    } else {
                        echo "<table>";
                        echo "<tr><th>Número Primo</th></tr>";
                        foreach ($numerosPrimos as $primo) {
                            echo "<tr><td>$primo</td></tr>";
                        }
                        echo "</table>";
                    }
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="valorLimite">Ingrese un valor:</label>
                <input type="text" id="valorLimite" name="valorLimite">
                <input type="submit" value="Buscar Números Primos">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
