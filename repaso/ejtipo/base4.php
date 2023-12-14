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
      // ... (tu código actual para mostrar información detallada de la localidad)

   } else if (isset($_REQUEST['comunidadesSinProvincias'])) {
      // Consultar comunidades sin provincias asociadas
      $instruccionComunidadesSinProvincias = "SELECT c.id_comunidad, c.nombre
                                              FROM comunidades c
                                              LEFT JOIN provincias p ON c.id_comunidad = p.id_comunidad
                                              WHERE p.id_comunidad IS NULL";
      $resConsultaComunidadesSinProvincias = mysqli_query($conexion, $instruccionComunidadesSinProvincias)
          or die("Fallo en la consulta de comunidades sin provincias");

      // Mostrar resultados de la búsqueda de comunidades sin provincias
      echo "<h1>Comunidades sin Provincias Asociadas</h1><br>";
      $numComunidadesSinProvincias = mysqli_num_rows($resConsultaComunidadesSinProvincias);
      if ($numComunidadesSinProvincias == 0) {
          echo "<p>Todas las comunidades tienen al menos una provincia asociada.</p>";
      } else {
          echo "<ul>";
          while ($resultadoComunidadesSinProvincias = mysqli_fetch_assoc($resConsultaComunidadesSinProvincias)) {
              echo "<li>{$resultadoComunidadesSinProvincias['nombre']} (ID: {$resultadoComunidadesSinProvincias['id_comunidad']})</li>";
          }
          echo "</ul>";
      }
      echo "<br><p><a href='base4.php'>Realizar nueva consulta</a></p>";

   } else {
      // ... (tu código actual para mostrar comunidades y provincias)

      // Añadir enlace para la opción 7
      echo "<p><a href='base4.php?comunidadesSinProvincias'>Mostrar Comunidades sin Provincias Asociadas</a></p>";

      // Añadir formulario de búsqueda de localidades detalladas
      echo "<h1>Búsqueda de Información Detallada de Localidad</h1><br>";
      echo "<form action='base4.php' method='GET'>";
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
