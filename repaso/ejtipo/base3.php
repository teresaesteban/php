<!DOCTYPE HTML>
<html lang="es">
<head>
   <meta charset="utf-8" />
   <title>Consulta Geográfica</title>
   <link rel="stylesheet" type="text/css" href="estilos.css">
   <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>

<body>
    <header>
        <h1>CONSULTA GEOGRÁFICA</h1>
    </header>
    <section>
        <nav></nav>
        <main>
<?php
   $conexion = mysqli_connect("localhost", "root","","geografia")
      or die ("No se puede conectar con el servidor");

   mysqli_select_db($conexion, "geografia")
      or die ("No se puede seleccionar la base de datos");

   if (isset($_REQUEST['comunidad'])) {
      // ... (tu código actual para mostrar provincias y localidades)

   } else if (isset($_REQUEST['provincia'])) {
      // ... (tu código actual para mostrar información de la provincia)

   } else if (isset($_REQUEST['localidad'])) {
      // Obtener la localidad seleccionada
      $localidadId = $_REQUEST['localidad'];

      // Consultar información detallada de la localidad
      $instruccionLocalidadDetallada = "SELECT l.nombre AS localidad, l.poblacion, p.nombre AS provincia, c.nombre AS comunidad
                                        FROM localidades l
                                        INNER JOIN provincias p ON l.n_provincia = p.n_provincia
                                        INNER JOIN comunidades c ON p.id_comunidad = c.id_comunidad
                                        WHERE l.id_localidad = $localidadId";
      $resConsultaLocalidadDetallada = mysqli_query($conexion, $instruccionLocalidadDetallada)
         or die ("Fallo en la consulta de la localidad detallada");

      $resultadoLocalidadDetallada = mysqli_fetch_assoc($resConsultaLocalidadDetallada);

      // Mostrar resultados de la búsqueda de localidad detallada
      echo "<h1>Información Detallada de la Localidad</h1><br>";
      echo "<p>Localidad: {$resultadoLocalidadDetallada['localidad']}</p>";
      echo "<p>Población: {$resultadoLocalidadDetallada['poblacion']}</p>";
      echo "<p>Provincia: {$resultadoLocalidadDetallada['provincia']}</p>";
      echo "<p>Comunidad Autónoma: {$resultadoLocalidadDetallada['comunidad']}</p>";
      echo "<br><p><a href='base3.php'>Realizar nueva consulta</a></p>";

   } else {
      // ... (tu código actual para mostrar comunidades y provincias)

      // Añadir formulario de búsqueda de localidades detalladas
      echo "<h1>Búsqueda de Información Detallada de Localidad</h1><br>";
      echo "<form action='base3.php' method='GET'>";
      echo "<p>Selecciona una localidad para ver información detallada &nbsp;";
      echo "<select name='localidad'>";

      // Obtener la lista de localidades
      $instruccionLocalidades = "SELECT id_localidad, nombre FROM localidades ORDER BY nombre";
      $resConsultaLocalidades = mysqli_query($conexion, $instruccionLocalidades)
         or die ("Fallo en la consulta de localidades");

      while ($resultadoLocalidades = mysqli_fetch_assoc($resConsultaLocalidades)) {
         echo "<option value='{$resultadoLocalidades['id_localidad']}'>{$resultadoLocalidades['nombre']}</option>";
      }

      echo "</select></p><br>";
      echo "<p><input type='submit' name='enviar' value='Ver Información Detallada'></p>";
      echo "</form>";
   }

   // Cerrar conexión
   mysqli_close($conexion);
?>
      </main>
      <aside></aside>
   </section>
   <footer></footer>
</body>
</html>
