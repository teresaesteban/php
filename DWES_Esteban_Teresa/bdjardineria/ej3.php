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
     <h1 style="text-align: center;">ESTADISTICA</h1>
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
   header("Location: ej3.php");
   exit();
   }

   // Seleccionar base de datos
   mysqli_select_db ($conexion,"jardineria")
      or die ("No se puede seleccionar la base de datos");

   // Enviar consulta
   $instruccionSQL="SELECT productos.Gama, gamasproductos.DescripcionTexto, COUNT(*) FROM productos INNER JOIN gamasproductos ON productos.Gama=gamasproductos.Gama GROUP BY productos.Gama";
   $resulconsulta = mysqli_query ($conexion,$instruccionSQL)
      or die ("Fallo en la consulta");

   // Mostrar resultados de la consulta
   $nfilas = mysqli_num_rows ($resulconsulta);
   if ($nfilas > 0)
   {
      print ("<table>");
      print ("<tr>");
      print ("<th>Gama</th>");
      print ("<th>Descripción</th>");
      print ("<th>Nº de productos</th>");
      print ("</tr>");

      for ($i=1; $i<=$nfilas; $i++)
      {
         $unafila = mysqli_fetch_row ($resulconsulta);
	      print ("<tr>");
         print ("<td>" . $unafila[0] . "</td>");
         print ("<td>" . $unafila[1] . "</td>");
         print ("<td>" . $unafila[2] . "</td>");
         print ("</tr>");
      }
      print ("</table>");
   }
   else
      print ("No hay productos");

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