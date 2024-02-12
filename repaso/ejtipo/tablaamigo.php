<!DOCTYPE html>
<html lang="es">
<head>
    <title>Números Amigos</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid orange;border-collapse:collapse;}
        th,td {border:2px solid orange;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Números Amigos</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Función que recibe un número entero positivo y devuelve la suma de sus divisores, excepto el propio número.
            function sumaDivisores($numero) {
                $suma = 0;
                for ($i = 1; $i <= $numero / 2; $i++) {
                    if ($numero % $i == 0) {
                        $suma += $i;
                    }
                }
                return $suma;
            }

            // Función que recibe dos números y devuelve verdadero si son amigos y falso si no lo son.
            function sonAmigos($num1, $num2) {
                return sumaDivisores($num1) == $num2 && sumaDivisores($num2) == $num1;
            }

            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valorLimite = $_POST["valorLimite"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($valorLimite) || $valorLimite <= 0) {
                    echo "<p>Por favor, ingrese un valor válido y positivo.</p>";
                } else {
                    // Encontrar pares de números amigos menores o iguales que el valor límite
                    $paresAmigos = [];
                    for ($i = 2; $i <= $valorLimite; $i++) {
                        for ($j = $i + 1; $j <= $valorLimite; $j++) {
                            if (sonAmigos($i, $j)) {
                                $paresAmigos[] = array($i, $j);
                            }
                        }
                    }

                    // Mostrar los resultados en una tabla
                    if (empty($paresAmigos)) {
                        echo "<p>No se encontraron pares de números amigos menores o iguales que $valorLimite.</p>";
                    } else {
                        echo "<table>";
                        echo "<tr><th>Número 1</th><th>Número 2</th></tr>";
                        foreach ($paresAmigos as $par) {
                            echo "<tr><td>{$par[0]}</td><td>{$par[1]}</td></tr>";
                        }
                        echo "</table>";
                    }
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="valorLimite">Ingrese un valor:</label>
                <input type="text" id="valorLimite" name="valorLimite">
                <input type="submit" value="Buscar Números Amigos">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
