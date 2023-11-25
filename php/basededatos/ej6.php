<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <label for="nombre">Nombre del cliente:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="nombre">Nombre del contacto:</label>
        <input type="text" id="nContacto" name="nContacto" required><br>

        <label for="nombre">ApellidoContacto:</label>
        <input type="text" id="aContacto" name="aContacto" required><br>


        <label for="nombre">Telefono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="nombre">Fax:</label>
        <input type="text" id="fax" name="fax" required><br>

        <label for="nombre">Direccion 1:</label>
        <input type="text" id="direccion1" name="direccion1" required><br>


        <label for="nombre">Direccion 2:</label>
        <input type="text" id="direccion2" name="direccion2"><br>

        <label for="nombre">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required><br>

        <label for="nombre">Region:</label>
        <input type="text" id="region" name="region"><br>

        <label for="nombre">Pais:</label>
        <input type="text" id="pais" name="pais" required><br>

        <label for="nombre">Codigo Postal:</label>
        <input type="text" id="codigoPostal" name="codigoPostal" required><br>

        <label for="nombre">Limite de credito:</label>
        <input type="text" id="limiteCredito" name="limiteCredito" required><br>

        <label for="nombre">Codigo empleado:</label>
        <select id="codigoEmpleado" name="codigoEmpleado">
        <?php
            // Conecta a la base de datos
            $conexion=mysqli_connect("localhost", "root","","jardineria") or die ("No se puede conectar con el servidor");

            // Consulta para obtener los códigos de empleado
            $query = "SELECT CodigoEmpleadoRepVentas FROM clientes";
            $result = mysqli_query($conexion, $query);

            // Muestra las opciones del menú desplegable
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['CodigoEmpleadoRepVentas'] . "'>" . $row['CodigoEmpleadoRepVentas'] . "</option>";
            }

            // Cierra la conexión después de obtener los datos necesarios
            mysqli_close($conexion);
            ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
$conexion=mysqli_connect("localhost", "root","","jardineria") or die ("No se puede conectar con el servidor");
$nombreCliente = $_POST["nombre"];
$nombreContacto = $_POST["nContacto"];
$apellidoContacto = $_POST["aContacto"];
$telefono = $_POST["telefono"];
$fax = $_POST["fax"];
$direccion1 = $_POST["direccion1"];
$direccion2 = $_POST["direccion2"];
$ciudad = $_POST["ciudad"];
$region = $_POST["region"];
$pais = $_POST["pais"];
$codigoPostal = $_POST["codigoPostal"];
$limiteCredito = $_POST["limiteCredito"];
$codigoEmpleado = $_POST["codigoEmpleado"];}

    $insertar = "INSERT INTO clientes (NombreCliente, NombreContacto, ApellidoContacto, Telefono, Fax, LineaDireccion1, LineaDireccion2, Ciudad, Region, Pais, CodigoPostal, LimiteCredito, CodigoEmpleadoRepVentas) VALUES ('$nombreCliente', '$nombreContacto', '$apellidoContacto', '$telefono', '$fax', '$direccion1', '$direccion2', '$ciudad', '$region', '$pais', '$codigoPostal', '$limiteCredito', '$codigoEmpleado')";

    if (mysqli_query($conexion, $insertar)) {
        echo "Se ha realizado la inserción con éxito";
    } else {
        echo "Error en la inserción: " . mysqli_error($conexion);
    }

    // Cierra la conexión después de realizar las operaciones necesarias
    mysqli_close($conexion);


    ?>
</body>
</html>