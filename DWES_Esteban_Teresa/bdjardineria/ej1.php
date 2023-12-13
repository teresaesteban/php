<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>

</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja2">
    <?php include "../includes/nav_bbdd.php"; ?>
    <main>
     <h1 style="text-align: center;">LISTA DE CLIENTES</h1>
<?php


// Verificar si el usuario no está logeado
if (!isset($_SESSION['logged_in'])) {
    // Si no está logeado, redirigir a la página de inicio de sesión
   echo "Para acceder a esta seccion tienes que iniciar sesion";
    echo'<form action="login.php" method="post">
    <input type="submit" value="Iniciar sesion">
</form>';
}else{
	include "conectabd.php";
	echo "<h1>Conexión correcta...</h1><br>";

	 echo '<div style="text-align: right; padding: 10px;">
            <span>Bienvenido/a, ' . $_SESSION['nombre'] . '</span>
            <form method="post" action="#">
                <input type="submit" name="eliminar_sesion" value="Cerrar Sesión">
            </form>
          </div>';
		  if ($_REQUEST && isset($_POST['eliminar_sesion'])) {
			session_unset();
			session_destroy();
			header("Location: ej1.php");
			exit();
		}

	$sql="SELECT CodigoCliente, NombreCliente, NombreContacto from clientes";
	$resulconsulta=mysqli_query($conexion,$sql) or die ("Error al hacer la consulta");

	$nfilas=mysqli_num_rows($resulconsulta);
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>CODIGO CLIENTE</th><th>NOMBRE CLIENTE</th><th>NOMBRE CONTACTO</th>";
	echo "</tr>";
	for($i=1;$i<=$nfilas;$i++)
	{
		$fila=mysqli_fetch_row($resulconsulta);

		echo "<tr>";
		echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conexion);
}
?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>