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
            $zonas = array("Morata" => array("Peña del reloj", "Puente de roca", "La gran placa"), "Riglos" => array("Fire", "Pisón", "Mallo colorao"));
            $vias = array("Traslosbares", "Pasteles", "Limauñas", "Anisdelmono", "KakadeLuxe", "Alocochinojabalín");
            $dificultad = array("6a", "8a", "7a", "7b", "V+", "6b");

            $table = array(); // Inicializar la variable $table como un array

            foreach ($zonas as $zona => $sectores) {
                foreach ($sectores as $sector) {
                    $table[$zona][$sector] = array(); // Inicializar el subarray para cada sector

                    foreach ($vias as $index => $via) {
                        $table[$zona][$sector][$via] = $dificultad[$index];
                    }
                }
            }

            // Imprimir el contenido del array para verificar los resultados
            echo "<pre>";
            print_r($table);
            echo "</pre>";

            echo '<table border="1">';
            echo '<tr><th>Zona</th>';
            echo '<th>Via</th>';
            echo '<th>Dificultad</th>';
            echo '</tr>';

            foreach ($table as $zona => $sectores) {
                foreach ($sectores as $sector => $vias) {
                    foreach ($vias as $via => $dificultad) {
                        echo '<tr>';
                        echo '<td>' . $sector . '</td>';
                        echo '<td>' . $via . '</td>';
                        echo '<td>' . $dificultad . '</td>';
                        echo '</tr>';
                    }
                }
            }

            echo '</table>';
            ?>

        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
