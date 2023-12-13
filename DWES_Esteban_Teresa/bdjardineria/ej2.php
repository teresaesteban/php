<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>

</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja">
    <?php include "../includes/nav_bbdd.php"; ?>
    <main>
     <h1 style="text-align: center;">PRODUCTOS GAMA</h1>
<?php
if (!isset($_SESSION['logged_in'])) {
   // Si no está logeado, redirigir a la página de inicio de sesión
  echo "Para acceder a esta seccion tienes que iniciar sesion";
   echo'<form action="login.php" method="post">
   <input type="submit" value="Iniciar sesion">
</form>';
}else{
   // Conectar con el servidor de base de datos
   include "conectabd.php";
   echo '<div style="text-align: right; padding: 10px;">
   <span>Bienvenido/a, ' . $_SESSION['nombre'] . '</span>
   <form method="post" action="#">
       <input type="submit" name="eliminar_sesion" value="Cerrar Sesión">
   </form>
 </div>';
      if ($_REQUEST && isset($_POST['eliminar_sesion'])) {
   session_unset();
   session_destroy();
   header("Location: ej2.php");
   exit();
   }
   // Seleccionar base de datos


   if (isset($_REQUEST['gama']))
   {
      $gama=$_REQUEST['gama'];
      // Enviar consulta
      $instruccion = "SELECT CodigoProducto, Nombre, CantidadEnStock FROM  productos WHERE Gama='$gama' ORDER BY Nombre";
      $resconsulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");

      // Mostrar resultados de la consulta
      $fecha=date("d-m-Y");
	   echo "<h1>Productos de la gama $gama - Fecha: $fecha </h1><br>";
	   $numreg=mysqli_num_rows ($resconsulta);
	   if ($numreg==0)
	   {	echo "<h1>Actualmente no existe ningún producto dado de alta en esta gama</h1>"; }
	   else
      {  print ("<table>");
         print ("<tr>");
         print ("<th>Código producto</th>");
         print ("<th>Nombre</th>");
         print ("<th>CantidadEnStock</th>");
         print ("</tr>");

         while ($resultado = mysqli_fetch_row ($resconsulta))  //Otra forma de recorrer todos los registros hasta que mysqli_fetch_row devuelva 'false'
         {
		   	print ("<tr>");
            for ($i=0;$i<=2;$i++)   //Sabiendo que hay 3 campos por registro se pueden imprimir las 3 celdas de cada fila con un bucle
			   {   print ("<td>" .$resultado[$i]. "</td>");}
            print ("</tr>");
         }

         print ("</table>");
      }
      echo "<br><p><a href='ejer2.php'>Realizar nueva consulta</a></p>";
   }
   else
   {
      echo "<h1>Consulta de productos por gama</h1><br>";

	   $instruccion = "SELECT Gama, DescripcionTexto FROM  gamasproductos ORDER BY DescripcionTexto";
      $resconsulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");

	   echo "<form action='ejer2.php' method='GET'>";
	   echo "<p>Elige una de las gamas de productos disponible &nbsp;";
	   echo "<select name='gama'>";

	   $nfilas = mysqli_num_rows ($resconsulta);
      if ($nfilas > 0)
	   {
         for ($i=1; $i<=$nfilas; $i++)
         {
            $resultado = mysqli_fetch_row ($resconsulta);
		   	echo "<option value='$resultado[0]'>". $resultado[0]."</option>";
		   }
      }
	   echo "</select></p><br>";
	   echo "<p><input type='submit' name='enviar' value='Enviar consulta'></p>";
	   echo "</form>";
   }
   // Cerrar conexión
   mysqli_close ($conexion);
}
?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>