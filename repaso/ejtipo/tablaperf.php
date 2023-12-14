<!DOCTYPE html>
<html lang="es">
<head>
    <title>Números Perfectos</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid orange;border-collapse:collapse;}
        th,td {border:2px solid orange;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Números Perfectos</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Función para verificar si un número es perfecto
            function esPerfecto($numero) {
                $sumaDivisores = 1; // Inicializamos en 1 porque todos los números son divisibles por 1
                for ($i = 2; $i <= sqrt($numero); $i++) {
                    if ($numero % $i == 0) {
                        $sumaDivisores += $i;
                        $otroDivisor = $numero / $i;
                        if ($otroDivisor != $i) {
                            $sumaDivisores += $otroDivisor;
                        }
                    }
                }
                return $sumaDivisores == $numero;
            }

            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valorLimite = $_POST["valorLimite"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($valorLimite) || $valorLimite <= 0) {
                    echo "<p>Por favor, ingrese un valor válido y positivo.</p>";
                } else {
                    // Encontrar números perfectos menores o iguales que el valor límite
                    $numerosPerfectos = [];
                    for ($i = 2; $i <= $valorLimite; $i++) {
                        if (esPerfecto($i)) {
                            $numerosPerfectos[] = $i;
                        }
                    }

                    // Mostrar los resultados en una tabla
                    if (empty($numerosPerfectos)) {
                        echo "<p>No se encontraron números perfectos menores o iguales que $valorLimite.</p>";
                    } else {
                        echo "<table>";
                        echo "<tr><th>Número Perfecto</th></tr>";
                        foreach ($numerosPerfectos as $perfecto) {
                            echo "<tr><td>$perfecto</td></tr>";
                        }
                        echo "</table>";
                    }
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="valorLimite">Ingrese un valor:</label>
                <input type="text" id="valorLimite" name="valorLimite">
                <input type="submit" value="Buscar Números Perfectos">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
