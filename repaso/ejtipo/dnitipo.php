<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Examen de repaso</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>REPASO 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <p class="derecha"><a class="derecha" href="index.php">Inicio</a></p>
            <h1 class="centrado">EJERCICIO 1</h1><br>
            <?php
            if(!isset($_REQUEST["dniCompleto"]))
            {
            ?>
                <form action="dnitipo.php" method="get">
                    Introduzca un número de DNI completo: <input type="text" name="dniCompleto" pattern="[0-9]{8}[A-HJ-NP-TV-Z]{1}" required><br><br>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Borrar">
                </form>
            <?php
            } else {
                $dniCompleto = $_REQUEST["dniCompleto"];
                $dni = substr($dniCompleto, 0, 8);
                $letra = substr($dniCompleto, 8, 1);

                function letraNIF($numero){
                    $arrayNIF = array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
                    $indice = $numero % 23;
                    return $arrayNIF[$indice];
                }

                $NIF = letraNIF($dni);

                if($letra == $NIF)
                {
                    echo "<p>El NIF $dni$letra es correcto.</p>";
                } else {
                    echo "<p>El NIF $dni$letra es incorrecto.</p>";
                }
                echo "<br><a href='dnitipo.php'>Volver al formulario</a>";
            }
            ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
