<!DOCTYPE html>
<html lang="es">
<head>
    <title>Tabla de Multiplicar</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {text-align:center}
        table {margin:auto;border: 2px solid brown;border-collapse:collapse;}
        th,td {border:2px solid brown;text-align:center}
    </style>
</head>
<body>
    <header>
        <h1>Tabla de Multiplicar</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            // Obtener valores desde el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = $_POST["numero"];
                // Validar que el valor ingresado sea un número positivo
                if (!is_numeric($numero) || $numero <= 0) {
                    echo "<p>Por favor, ingrese un número válido y positivo.</p>";
                } else {
                    // Generar la tabla de multiplicar para el número ingresado
                    echo "<table>";
                    echo "<tr><th>Operación</th><th>Resultado</th></tr>";
                    for ($i = 1; $i <= 10; $i++) {
                        $resultado = $numero * $i;
                        echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
                    }
                    echo "</table>";
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="numero">Ingrese un número:</label>
                <input type="text" id="numero" name="numero">
                <input type="submit" value="Generar Tabla de Multiplicar">
            </form>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
