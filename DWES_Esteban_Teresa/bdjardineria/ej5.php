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

	<h1>Insertar Cliente</h1>
<?php
if (!isset($_SESSION['logged_in'])) {
    // Si no está logeado, redirigir a la página de inicio de sesión
	echo "Para acceder a esta seccion tienes que <a  href='login.php'>
    Iniciar Sesion</a> o <a  href='register.php' > Registrarse</a>";
}else{
	include "conectabd.php";
	echo '<div style="text-align: right; padding: 10px;">
	<span>Bienvenido/a, ' . $_SESSION['nombre'] . '</span>
	<form method="post" action="#">
		<input type="submit" name="eliminar_sesion" value="Cerrar Sesión">
	</form>
  </div>';
if (isset($_REQUEST['enviar'])){
//Coger valores del formulario, pero es más rápido con extract
	/*
	$NombreCliente = $_REQUEST['NombreCliente'];
	$NombreContacto = $_REQUEST['NombreContacto'];
	$ApellidoContacto = $_REQUEST['ApellidoContacto'];
	$Telefono = $_REQUEST['Telefono'];
	$Fax = $_REQUEST['Fax'];
	$LineaDireccion1 = $_REQUEST['LineaDireccion1'];
	$LineaDireccion2 = $_REQUEST['LineaDireccion2'];
	$Ciudad = $_REQUEST['Ciudad'];
	$Region = $_REQUEST['Region'];
	$Pais = $_REQUEST['Pais'];
	$CodigoPostal = $_REQUEST['CodigoPostal'];
	$CodigoEmpleadoRepVentas = $_REQUEST['CodigoEmpleadoRepVentas'];
	$LimiteCredito = $_REQUEST['LimiteCredito'];
	*/
/*Equivalente con función extract.
Se puede ver documentación en php.net o en w3Schools*/
extract($_REQUEST);
	//Se averigua cuál es el código máximo de cliente existente.
	$consulta2 = "SELECT MAX(CodigoCliente) FROM clientes";
    $rescon2 = mysqli_query ($c,$consulta2);
    $valor = mysqli_fetch_row ($rescon2);
	$CodigoCliente = $valor[0] +1;
	echo "<b>Se procede a la inserción de un nuevo cliente con código $CodigoCliente</b><br>";
		$insercion = "INSERT INTO clientes VALUES($CodigoCliente, '$NombreCliente','$NombreContacto', '$ApellidoContacto', '$Telefono', '$Fax', '$LineaDireccion1', '$LineaDireccion2', '$Ciudad', '$Region', '$Pais', '$CodigoPostal', $CodigoEmpleadoRepVentas, $LimiteCredito)";
	echo "<b>Sentencia de inserción:</b><br>$insercion<br>";
		if(mysqli_query($c,$insercion))	//Devuelve true si se ha podido realizar la consulta y a la vez la ejecuta
			echo "<br><b>Inserción completada correctamente.</b><br><br>";
		else
			echo "<br><b>Ha ocurrido error al ejecutar sentencia SQL INSERT.</b><br/>";
	echo "<a href = 'ej5.php'>Vuelta al formulario de inserción</a><br/>";
}
else{?>
<form action='#' method='get'>
	<h2>Formulario para rellenar los datos de un nuevo cliente</h2><br>
	<table>
	<tr>
		<td>Nombre del cliente</td>
		<td><input type="text" name="NombreCliente" maxlength="50" size="50" required/></td>
	</tr><tr>
		<td>Nombre del contacto</td>
		<td><input type="text" name="NombreContacto" maxlength="30" size="30"/></td>
	</tr><tr>
		<td>Apellido del contacto</td>
		<td><input type="text" name="ApellidoContacto" maxlength="30"  size="30"/></td>
	</tr><tr>
		<td>Teléfono</td>
		<td><input type="text" name="Telefono" maxlength="11" size="11" pattern="+?[0-9]{9,11}" required></td>
	</tr><tr>
		<td>Fax </td>
		<td><input type="text" name="Fax" maxlength="11" size="11" pattern="+?[0-9]{9,11}" required/></td>
	</tr><tr>
		<td>Dirección 1</td>
		<td><input type="text" name="LineaDireccion1" maxlength="50" size="50" required/></td>
	</tr><tr>
		<td>Dirección 2</td>
		<td><input type="text" name="LineaDireccion2" maxlength="50" size="50"/></td>
	</tr><tr>
		<td>Ciudad</td><td>
			<input type="text" name="Ciudad" maxlength="50" size="50" required/></td>
	</tr><tr>
		<td>Región</td>
		<td><input type="text" name="Region" maxlength="50" size="50"/></td>
	</tr><tr>
		<td>País</td>
		<td><input type="text" name="Pais" maxlength="50" size="50"/></td>
	</tr><tr>
		<td>Código Postal</td>
		<td><input type="text" name="CodigoPostal" size="5" pattern="[0-9]{5}"></td>
	</tr><tr>
		<td>Límite Crédito</td>
		<td><input type="number" name="LimiteCredito" step="0.01" min="0" max="10000"></td>
	</tr><tr>
		<td>Código empleado</td>
		<td><?php
			echo "<select name='CodigoEmpleadoRepVentas'>";

			$consulta = "SELECT CodigoEmpleado, Nombre, Apellido1, Apellido2 FROM empleados";
			$rescon = mysqli_query ($c,$consulta);

			while($valor = mysqli_fetch_row ($rescon)){
				echo "<option value = $valor[0]>".$valor[0]."-".$valor[1]." ".$valor[2]." ".$valor[3]."</option>";
			}	//Este input tipo 'select' cogerá en su atributo 'value' el CodigoEmpleado (Representante de ventas) de la opción seleccionada
			mysqli_close ($c);
			echo "</select>";
		?></td>
	</tr>
	</table><br>
	<input type="submit" name="enviar" value="Insertar nuevo cliente">
</form>
<?php
}
}?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>