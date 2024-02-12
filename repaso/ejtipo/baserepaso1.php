<!DOCTYPE HTML>
<html lang="es-ES">
<head>
    <meta charset="utf-8" />
    <title>Consulta Geográfica</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>Consulta Geográfica</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            $conexion = mysqli_connect("localhost", "root", "", "geografia") or die("Error al conectar con el servidor.");
            mysqli_select_db($conexion, "geografia") or die("Error al conectar con la base de datos.");

            if (!$_REQUEST) {
                $query = "SELECT n_provincia, nombre FROM provincias ORDER BY nombre";
                $result = $conexion->query($query);

                echo "<form action='baserepaso1.php' method='post'>
                    <label for='provincia'>Selecciona una provincia:</label>
                    <select name='provincia' id='provincia' required>";

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['n_provincia']}'>{$row['nombre']}</option>";
                }

                echo "</select>
                    <button type='submit'>Consultar</button>
                </form>";
            } else {
                $provinciaSeleccionada = $_POST["provincia"];

                $queryProvincia = "SELECT p.nombre as nombre_provincia, p.superficie, l.nombre as capital_nombre
                                FROM provincias p
                                JOIN localidades l ON p.id_capital = l.id_localidad
                                WHERE p.n_provincia = $provinciaSeleccionada";
                $resultProvincia = $conexion->query($queryProvincia);

                if ($resultProvincia->num_rows > 0) {
                    $rowProvincia = $resultProvincia->fetch_assoc();
                    $nombreProvincia = $rowProvincia["nombre_provincia"];
                    $superficieProvincia = $rowProvincia["superficie"];
                    $capitalProvincia = $rowProvincia["capital_nombre"];

                    echo "<h2>$nombreProvincia</h2>";
                    echo "<p>Superficie: $superficieProvincia km²</p>";
                    echo "<p>Capital: $capitalProvincia</p>";

                    $queryLocalidades = "SELECT nombre, poblacion FROM localidades WHERE n_provincia = $provinciaSeleccionada";
                    $resultLocalidades = $conexion->query($queryLocalidades);

                    echo "<h3>Localidades:</h3>";
                    echo "<ul>";

                    while ($rowLocalidad = $resultLocalidades->fetch_assoc()) {
                        echo "<li>{$rowLocalidad['nombre']} (Población: {$rowLocalidad['poblacion']})</li>";
                    }

                    echo "</ul>";

                    $queryComunidad = "SELECT c.nombre as nombre_comunidad, l.nombre as capital_comunidad
                                    FROM comunidades c
                                    JOIN localidades l ON c.id_capital = l.id_localidad
                                    WHERE c.id_comunidad = (SELECT id_comunidad FROM provincias WHERE n_provincia = $provinciaSeleccionada)";
                    $resultComunidad = $conexion->query($queryComunidad);

                    $rowComunidad = $resultComunidad->fetch_assoc();
                    $nombreComunidad = $rowComunidad["nombre_comunidad"];
                    $capitalComunidad = $rowComunidad["capital_comunidad"];

                    echo "<h3>Comunidad Autónoma:</h3>";
                    echo "<p>$nombreComunidad</p>";
                    echo "<p>Capital de la Comunidad Autónoma: $capitalComunidad</p>";

                    echo "<p>Total de localidades: " . $resultLocalidades->num_rows. "</p>";
                } else {
                    echo "<p>No se encontraron resultados para la provincia seleccionada.</p>";
                }
            }

            $conexion->close();
            ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>