<!DOCTYPE html>
<html lang="es">
<head>
    <title>Números Aleatorios y Primos</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid teal;border-collapse:collapse;}
        th,td {border:2px solid teal;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Números Aleatorios y Primos</h1>
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
                $cantidadNumeros = $_POST["cantidadNumeros"];
                // Validar que la cantidad ingresada sea un número positivo
                if (!is_numeric($cantidadNumeros) || $cantidadNumeros <= 0) {
                    echo "<p>Por favor, ingrese una cantidad válida y positiva.</p>";
                } else {
                    // Generar números aleatorios y clasificarlos como primos o no primos
                    $numerosAleatorios = [];
                    for ($i = 0; $i < $cantidadNumeros; $i++) {
                        $numero = rand(1, 100);  // Generar números aleatorios del 1 al 100
                        $clasificacion = esPrimo($numero) ? 'Primo' : 'No Primo';
                        $numerosAleatorios[] = array('Numero' => $numero, 'Clasificacion' => $clasificacion);
                    }

                    // Mostrar los resultados en una tabla HTML
                    echo "<table>";
                    echo "<tr><th>Número</th><th>Clasificación</th></tr>";
                    foreach ($numerosAleatorios as $infoNumero) {
                        echo "<tr><td>{$infoNumero['Numero']}</td><td>{$infoNumero['Clasificacion']}</td></tr>";
                    }
                    echo "</table>";
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="cantidadNumeros">Ingrese la cantidad de números:</label>
                <input type="text" id="cantidadNumeros" name="cantidadNumeros">
                <input type="submit" value="Generar Números Aleatorios y Clasificar">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
