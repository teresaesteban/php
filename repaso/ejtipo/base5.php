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

   } else if (isset($_REQUEST['buscarPorPoblacion'])) {
      // Procesar la búsqueda por población
      if (isset($_REQUEST['poblacionMin']) && isset($_REQUEST['poblacionMax'])) {
         $poblacionMin = $_REQUEST['poblacionMin'];
         $poblacionMax = $_REQUEST['poblacionMax'];

         // Consultar localidades por población
         $instruccionLocalidadesPorPoblacion = "SELECT id_localidad, nombre, poblacion
                                                FROM localidades
                                                WHERE poblacion BETWEEN $poblacionMin AND $poblacionMax
                                                ORDER BY poblacion DESC";
         $resConsultaLocalidadesPorPoblacion = mysqli_query($conexion, $instruccionLocalidadesPorPoblacion)
            or die("Fallo en la consulta de localidades por población");

         // Mostrar resultados de la búsqueda por población
         echo "<h1>Localidades por Rango de Población</h1><br>";
         echo "<p>Mostrando localidades con población entre $poblacionMin y $poblacionMax:</p>";
         echo "<ul>";
         while ($resultadoLocalidadesPorPoblacion = mysqli_fetch_assoc($resConsultaLocalidadesPorPoblacion)) {
            echo "<li>{$resultadoLocalidadesPorPoblacion['nombre']} (Población: {$resultadoLocalidadesPorPoblacion['poblacion']})</li>";
         }
         echo "</ul>";
         echo "<br><p><a href='base5.php'>Realizar nueva consulta</a></p>";
      } else {
         echo "<p>Error: Debes especificar un rango de población.</p>";
         echo "<br><p><a href='base5.php'>Volver</a></p>";
      }

   } else {
      // ... (tu código actual para mostrar comunidades y provincias)

      // Añadir enlace para la opción 5
      echo "<p><a href='base5.php?buscarPorPoblacion'>Buscar Localidades por Población</a></p>";

      // Añadir formulario de búsqueda de localidades por población
      echo "<h1>Búsqueda de Localidades por Población</h1><br>";
      echo "<form action='base5.php' method='GET'>";
      echo "<p>Ingresa un rango de población &nbsp;";
      echo "Mínima: <input type='number' name='poblacionMin' required>&nbsp;";
      echo "Máxima: <input type='number' name='poblacionMax' required></p><br>";
      echo "<p><input type='submit' name='enviar' value='Buscar'></p>";
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
