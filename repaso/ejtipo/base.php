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
      // Obtener la provincia seleccionada
      $provinciaId = $_REQUEST['provincia'];

      // Consultar la provincia y la comunidad autónoma de la localidad
      $instruccionLocalidad = "SELECT nombre, id_comunidad FROM provincias WHERE n_provincia=$provinciaId";
      $resConsultaLocalidad = mysqli_query($conexion, $instruccionLocalidad)
         or die ("Fallo en la consulta de la localidad");

      $resultadoLocalidad = mysqli_fetch_row($resConsultaLocalidad);
      $localidadNombre = $resultadoLocalidad[0];
      $comunidadId = $resultadoLocalidad[1];

      // Mostrar resultados de la búsqueda de localidad
      echo "<h1>Información de la Localidad</h1><br>";
      echo "<p>Localidad: $localidadNombre</p>";
      echo "<p>Provincia: $provinciaId</p>";

      // Consultar el nombre de la comunidad autónoma
      $instruccionComunidad = "SELECT nombre FROM comunidades WHERE id_comunidad=$comunidadId";
      $resConsultaComunidad = mysqli_query($conexion, $instruccionComunidad)
         or die ("Fallo en la consulta de la comunidad autónoma");

      $resultadoComunidad = mysqli_fetch_row($resConsultaComunidad);
      $comunidadNombre = $resultadoComunidad[0];

      echo "<p>Comunidad Autónoma: $comunidadNombre</p>";
      echo "<br><p><a href='base.php'>Realizar nueva consulta</a></p>";

   } else {
      // ... (tu código actual para mostrar comunidades y provincias)

      // Añadir formulario de búsqueda de localidades
      echo "<h1>Búsqueda de Localidades por Provincia</h1><br>";
      echo "<form action='base.php' method='GET'>";
      echo "<p>Selecciona una provincia para buscar localidades &nbsp;";
      echo "<select name='provincia'>";

      // Obtener la lista de provincias
      $instruccionProvincias = "SELECT n_provincia, nombre FROM provincias ORDER BY nombre";
      $resConsultaProvincias = mysqli_query($conexion, $instruccionProvincias)
         or die ("Fallo en la consulta de provincias");

      while ($resultadoProvincias = mysqli_fetch_row($resConsultaProvincias)) {
         echo "<option value='{$resultadoProvincias[0]}'>{$resultadoProvincias[1]}</option>";
      }

      echo "</select></p><br>";
      echo "<p><input type='submit' name='enviar' value='Buscar Localidades'></p>";
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
