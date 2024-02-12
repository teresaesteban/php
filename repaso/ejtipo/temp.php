<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Conversor de Temperatura</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>REPASO 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <p class="derecha"><a class="derecha" href="temp.php">Inicio</a></p>
            <h1 class="centrado">EJERCICIO 1</h1><br>
            <?php
            if(!isset($_REQUEST["temperaturaCelsius"]))
            {
            ?>
                <form action="temp.php" method="get">
                    Introduzca la temperatura en grados Celsius: <input type="number" name="temperaturaCelsius" required><br><br>
                    <input type="submit" value="Convertir">
                    <input type="reset" value="Borrar">
                </form>
            <?php
            } else {
                $temperaturaCelsius = $_REQUEST["temperaturaCelsius"];
                $temperaturaFahrenheit = ($temperaturaCelsius * 9/5) + 32;

                echo "<p>$temperaturaCelsius grados Celsius son equivalentes a $temperaturaFahrenheit grados Fahrenheit.</p>";
                echo "<br><a href='temp.php'>Volver al formulario</a>";
            }
            ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
