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
            <p class="derecha"><a href="index.php">Inicio</a></p>
            <h1 class="titulo11" style="color:red;text-align: center;">EJERCICIO 1</h1>
            <br>
            <h2>Geografia Española</h2>
            <p>Esta aplicacion muestra las capitales de las comunidades Autonomas y el numero total de localidades por provincia en españa
            <?php
            //NO SOY CAPAZ DE HACERLO CON LOS BOTONES ASÍ QUE LO DEJO DE ESTA MANERA, ES CAPAZ DE MOSTRAR LAS COMUNIDADES


   // Conectar con el servidor de base de datos
   $conexion = mysqli_connect("localhost", "root","","geografia")
      or die ("No se puede conectar con el servidor");

   // Seleccionar base de datos
   mysqli_select_db($conexion, "geografia")
      or die ("No se puede seleccionar la base de datos");

   if (isset($_REQUEST['comunidad']))
   {
      $comunidadId = $_REQUEST['comunidad'];
      // Enviar consulta para obtener provincias de la comunidad seleccionada
      $instruccionProvincias = "SELECT n_provincia, nombre FROM provincias WHERE id_comunidad=$comunidadId ORDER BY nombre";
      $resConsultaProvincias = mysqli_query($conexion, $instruccionProvincias)
         or die ("Fallo en la consulta de provincias");

      // Mostrar resultados de la consulta de provincias
      $fecha = date("d-m-Y");
      echo "<h1>Provincias de la Comunidad Autónoma - Fecha: $fecha </h1><br>";
      $numRegProvincias = mysqli_num_rows($resConsultaProvincias);
      if ($numRegProvincias == 0)
      {
         echo "<h1>No existen provincias registradas para esta Comunidad Autónoma</h1>";
      }
      else
      {
         echo "<form action='ejer3.php' method='GET'>";
         echo "<p>Elige una provincia &nbsp;";
         echo "<select name='provincia'>";

         while ($resultadoProvincias = mysqli_fetch_row($resConsultaProvincias))
         {
            echo "<option value='{$resultadoProvincias[0]}'>{$resultadoProvincias[1]}</option>";
         }

         echo "</select></p><br>";
         echo "<input type='hidden' name='comunidad' value='$comunidadId'>";
         echo "<p><input type='submit' name='enviar' value='Ver Localidades'></p>";
         echo "</form>";
      }
      echo "<br><p><a href='ejer3.php'>Realizar nueva consulta</a></p>";
   }
   else
   {
      echo "<h1>Consulta de Provincias por Comunidad Autónoma</h1><br>";

      $instruccionComunidades = "SELECT id_comunidad, nombre FROM comunidades ORDER BY nombre";
      $resConsultaComunidades = mysqli_query($conexion, $instruccionComunidades)
         or die ("Fallo en la consulta de comunidades");

      echo "<form action='ejer3.php' method='GET'>";
      echo "<p>Elige una de las Comunidades Autónomas disponibles &nbsp;";
      echo "<select name='comunidad'>";

      $numFilasComunidades = mysqli_num_rows($resConsultaComunidades);
      if ($numFilasComunidades > 0)
      {
         while ($resultadoComunidades = mysqli_fetch_row($resConsultaComunidades))
         {
            echo "<option value='{$resultadoComunidades[0]}'>{$resultadoComunidades[1]}</option>";
         }
      }
      echo "</select></p><br>";
      echo "<p><input type='submit' name='enviar' value='Enviar consulta'></p>";
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