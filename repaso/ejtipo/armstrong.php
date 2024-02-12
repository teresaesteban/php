<!DOCTYPE html>
<html lang="es">
<head>
    <title>Números Armstrong</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid violet;border-collapse:collapse;}
        th,td {border:2px solid violet;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Números Armstrong</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Función para calcular la potencia de un número
            function potencia($base, $exponente) {
                return $exponente == 0 ? 1 : $base ** $exponente;
            }

            // Función para verificar si un número es Armstrong
            function esArmstrong($numero) {
                $numeroOriginal = $numero;
                $digitos = strlen((string)$numero);
                $suma = 0;

                while ($numero > 0) {
                    $digito = $numero % 10;
                    $suma += potencia($digito, $digitos);
                    $numero = (int)($numero / 10);
                }

                return $suma == $numeroOriginal;
            }

            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valorLimite = $_POST["valorLimite"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($valorLimite) || $valorLimite <= 0) {
                    echo "<p>Por favor, ingrese un valor válido y positivo.</p>";
                } else {
                    // Encontrar números Armstrong menores o iguales que el valor límite
                    $numerosArmstrong = [];
                    for ($i = 1; $i <= $valorLimite; $i++) {
                        if (esArmstrong($i)) {
                            $numerosArmstrong[] = $i;
                        }
                    }

                    // Mostrar los resultados en una tabla HTML
                    echo "<table>";
                    echo "<tr><th>Números Armstrong</th></tr>";
                    foreach ($numerosArmstrong as $armstrong) {
                        echo "<tr><td>$armstrong</td></tr>";
                    }
                    echo "</table>";
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="valorLimite">Ingrese un valor:</label>
                <input type="text" id="valorLimite" name="valorLimite">
                <input type="submit" value="Buscar Números Armstrong">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
