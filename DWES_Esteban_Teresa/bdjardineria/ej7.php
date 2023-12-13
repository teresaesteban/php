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
     <h1 style="text-align: center;">BORRAR CLIENTE</h1>
<?php
if (!isset($_SESSION['logged_in'])) {
    // Si no está logeado, redirigir a la página de inicio de sesión
   echo "Para acceder a esta seccion tienes que iniciar sesion";
    echo'<form action="login.php" method="post">
    <input type="submit" value="Iniciar sesion">
</form>';
}else{
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
			header("Location: ej7.php");
			exit();
		}
if (isset($_REQUEST['respuesta']))
{ /*3ª parte:  se procede a borrar el registro del cliente y, previamente, todos lo registros relacionados en tablas subordinadas*/
  borrarCliente($_REQUEST['codigo'],$_REQUEST['respuesta']);
}
else{	/*2ª Parte: se muestran los datos del cliente y se pide confirmación de borrado*/
	if(isset($_REQUEST['telefono'])){
		$tel=$_REQUEST['telefono'];
		mostrarClienteyPreguntarBorrar($tel);
	}
	else{ /*1ª parte: se pide el nº de teléfono del cliente*/
?>
		<form action='<?= $_SERVER['PHP_SELF']?>' method='GET'>	<!--Utilizando array superglobal $_SERVER-->
			<label>Escribe el teléfono del cliente:</label>
			<input type='text' name='telefono' value='' pattern='[0-9]{9,11}' size='11'> <!--En vez de usar required haremos uso de header(Location: ) en PHP-->
			<input type="submit" value="Obtener datos del cliente">
		</form>
<?php
	}
}
?>
<?php
//Funciones auxiliares
function mostrarClienteyPreguntarBorrar($tel) {
	include "conectabd.php";
	if(!empty($tel)){
		$consulta = mysqli_query($conexion,"SELECT * FROM clientes WHERE telefono='$tel';")
			or die ("Error al seleccionar cliente");
			/*Si hubiese varios clientes con el mismo teléfono nos quedaríamos con el primero obtenido*/
		$fila = mysqli_fetch_assoc($consulta);
		if($fila==true){
			echo "<h2>FICHA DEL CLIENTE</h2><br><ul>";
			foreach($fila as $campo => $dato){
				echo "<li>$campo: $dato</li> ";
			}
			echo "</ul><br>";
			echo "<p>¿Quieres eliminar este cliente?</p>";
			?>
			<form action='ej7.php' method='get'>
				<input type="hidden" name="codigo" value='<?php $fila['CodigoCliente']?>'/>
				<input type="submit" name ="respuesta" value="Si"/>&nbsp;&nbsp;
				<input type="submit" name ="respuesta" value="No"/>
			</form>
			<?php
		}else{
			echo "<p>El teléfono no pertenece a ningún cliente. <a href='ej7.php'>VOLVER</a></p>";
		}
	}else{
		/*Si el teléfono está vacío lo volvemos a pedir*/
		header("Location: ej7.php"); /* Redirección del navegador */
	}
}

function borrarCliente($codigo,$respuesta) {
	echo "<p>RESULTADOS DE BORRADO DE CLIENTE DE CÓDIGO $codigo.</p>";

	if($respuesta=="Si"){
		$conexion = mysqli_connect("localhost","jardinero","jardinero") or die ("Error en conexión con servidor bd.");
		mysqli_select_db($conexion,"jardineria");

		//Borrado de pagos del cliente
		mysqli_query($conexion,"DELETE FROM pagos WHERE codigoCliente = $codigo;")
			or die ("Error al borrar pagos del cliente.");
		echo "Se han borrado los pagos del cliente.<br>";

		//Borrado de detallepedidos de los distintos pedidos que ha hecho el cliente
		$query = "DELETE FROM detallepedidos WHERE CodigoPedido IN (SELECT DISTINCT CodigoPedido FROM pedidos WHERE CodigoCliente = $codigo);";
			/* Y otra forma más de expresar este delete:
			$query= "DELETE DetallePedidos FROM DetallePedidos NATURAL JOIN Pedidos WHERE Pedidos.CodigoCliente = $codigo;"; */
		mysqli_query($conexion, $query) or die ("Fallo al eliminar los detalles pedidos del cliente $codigo.");
		echo "Se han borrado los detalles de pedidos del cliente.<br>";

		//Borrado de pedidos del cliente
		mysqli_query($conexion,"DELETE FROM pedidos WHERE codigoCliente = $codigo;")
			or die ("Error al borrar pedidos del cliente.");
		echo "Se han borrado los pedidos del cliente.<br>";

		//Borrado de cliente de la tabla clientes
		mysqli_query($conexion,"DELETE FROM clientes WHERE codigoCliente = $codigo;")
			or die ("Error al borrar cliente.");
		echo "Se ha borrado el cliente de la tabla clientes.<br>";

		mysqli_close($conexion);
	}else{
		echo "No se ha borrado el cliente.";
	}
	echo "<p><a href='ej7.php'>VOLVER</a></p>";
}
}
?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>