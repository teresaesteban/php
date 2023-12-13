<?php session_start(); ?>
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
            <?php
            if (!$_REQUEST) {
                ?>
                <h3>Login para usuarios registrados</h3>
                <form method="post" action="#">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario"><br><br>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password"><br><br>
                    <input type="submit" value="Iniciar sesión">
                </form>
                <?php
            } else {
                $nombre = $_POST["usuario"];
                $clave = $_POST["password"];

                $conexion = mysqli_connect("localhost", "root", "", "jardineria") or die("No se puede conectar con el servidor");

                $sql = "SELECT clave FROM usuarios WHERE nombre='$nombre'";
                $resulconsulta = mysqli_query($conexion, $sql) or die("Error al hacer la consulta");

                if ($resulconsulta->num_rows === 1) {
                    // Usuario encontrado, continuar con la verificación de la contraseña
                    $fila = $resulconsulta->fetch_assoc();
                    $hashClave = $fila['clave'];

                    if (password_verify($clave, $hashClave)) {
                        // Contraseña válida, iniciar sesión
                        $_SESSION['logged_in'] = true;
                        $_SESSION['nombre'] = $nombre;



                        echo "Bienvenido/a ahora puedes navegar por los datos.";
                    } else {
                        // Contraseña incorrecta
                        echo "Contraseña incorrecta. ";
                        contraIncorrecta();
                    }
                } else {
                    // Usuario no encontrado
                    echo "Usuario no encontrado. ";
                    mostrarEnlaceLogin();
                }

                mysqli_close($conexion);
            }

            function mostrarEnlaceLogin()
            {
                echo '¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>.';
            }
            function contraIncorrecta(){
                echo 'No es la contraseña <a href="login.php">Vuelve a intentarlo</a>.<br>';
            }
            ?>
        </main>

        <?php include "../includes/aside2.php"; ?>
    </div>

    <?php include "../includes/footer2.php"; ?>
</body>
</html>
