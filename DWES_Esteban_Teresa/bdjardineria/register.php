<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/metadata2.php"; ?>
</head>
<body>
    <?php include "../includes/header2.php"; ?>
    <?php include "../includes/menu2.php"; ?>

    <div class="caja">
        <?php include "../includes/nav_bbdd.php"; ?>

        <main>
            <h3>Registro de usuarios</h3>
            <form method="post" action="#">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><br><br>
                <label for="confirm_password">Confirmar contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required><br><br>
                <input type="submit" value="Registrarse">
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["usuario"];
                $clave = $_POST["password"];
                $confirmar_clave = $_POST["confirm_password"];

                // Verificar que las contraseñas coincidan
                if ($clave != $confirmar_clave) {
                    echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
                    mostrarEnlaceRegistro();
                    exit; // Salir del script si las contraseñas no coinciden
                }

                // Hash de la contraseña
                $hashClave = password_hash($clave, PASSWORD_DEFAULT);

                include "conectabd.php";

                // Verificar si el usuario ya existe
                $sqlVerificarUsuario = "SELECT nombre FROM usuarios WHERE nombre='$nombre'";
                $resultVerificarUsuario = mysqli_query($conexion, $sqlVerificarUsuario) or die("Error al verificar el usuario");

                if ($resultVerificarUsuario->num_rows > 0) {
                    // El usuario ya existe
                    echo "El usuario ya existe. ";
                    mostrarEnlaceLogin();
                } else {
                    // Insertar nuevo usuario en la base de datos
                    $sqlInsertarUsuario = "INSERT INTO usuarios (nombre, clave) VALUES ('$nombre', '$hashClave')";
                    $resultInsertarUsuario = mysqli_query($conexion, $sqlInsertarUsuario) or die("Error al insertar el usuario");

                    if ($resultInsertarUsuario) {
                        // Registro exitoso
                        echo "Registro exitoso. Ahora puedes iniciar sesión.";
                        mostrarEnlaceLogin();
                    } else {
                        // Error en el registro
                        echo "Error en el registro. Por favor, inténtalo de nuevo.";
                        mostrarEnlaceRegistro();
                    }
                }

                mysqli_close($conexion);
            }

            function mostrarEnlaceLogin()
            {
                echo '<br><a href="login.php">Iniciar sesión</a>.';
            }

            function mostrarEnlaceRegistro()
            {
                echo '<br><a href="register.php">Volver al formulario de registro</a>.';
            }
            ?>

        </main>

        <?php include "../includes/aside2.php"; ?>
    </div>

    <?php include "../includes/footer2.php"; ?>
</body>
</html>
