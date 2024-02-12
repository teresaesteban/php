<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
class MenuRestaurante
{
    public $dia;
    public $fecha;
    public $primerosPlatos = [];
    public $segundosPlatos = [];
    public $postres        = [];

    // Constructor
    public function __construct($dia = "", $fecha = "")
    {
        $this->dia   = $dia;
        $this->fecha = $fecha;
    }

    // GETTERS
    public function obtenerDia(): string
    {
        return $this->dia;
    }

    public function obtenerFecha(): string
    {
        return $this->fecha;
    }

    public function obtenerPrimerosPlatos(): array
    {
        return $this->primerosPlatos;
    }

    public function obtenerSegundosPlatos(): array
    {
        return $this->segundosPlatos;
    }

    public function obtenerPostres(): array
    {
        return $this->postres;
    }

    // SETTERS
    public function establecerDia(string $dia): void
    {
        $this->dia = $dia;
    }

    public function establecerFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function establecerPrimerosPlatos(array $primerosPlatos): void
    {
        $this->primerosPlatos = $primerosPlatos;
    }

    public function establecerSegundosPlatos(array $segundosPlatos): void
    {
        $this->segundosPlatos = $segundosPlatos;
    }

    public function establecerPostres(array $postres): void
    {
        $this->postres = $postres;
    }

    // Función para mostrar todos los datos de la clase
    public function mostrarPlatos(array $platos, string $titulo): void
    {
        if (!empty($platos)) {
            echo "<h3>{$titulo}</h3>";
            foreach ($platos as $plato) {
                echo "{$plato}<br>";
            }
        }
    }
}
?>
<header>
    <h1>RESTAURANTE</h1>
</header>
<section>
    <nav></nav>
    <main>
        <?php

if ($_REQUEST) {
    if(isset($_REQUEST["crear"])) {
        $dia   = $_GET['dia'];
        $fecha = $_GET['fecha'];

        $menuRestaurante = new MenuRestaurante();
        $menuRestaurante->establecerDia($dia);
        $menuRestaurante->establecerFecha($fecha);
        $menuSerializado = serialize($menuRestaurante);
        //Se guarda la cadena de texto (objeto) en una variable de sesión
        $_SESSION['menu'] = $menuSerializado;
    }

    if(isset($_SESSION['menu'])) {

        // Deserializa la cadena para obtener el objeto original
        $menuRestaurante = unserialize($_SESSION['menu']);

        if (isset($_GET['agregarPrimerPlato'])) {
            //Recupero el nuevo plato introducido por formulario
            $nuevoPrimerPlato = $_GET['pPlato'];
            if(strlen($nuevoPrimerPlato) > 0) {
                //Obtengo los platos que ya se han guardado en el array
                $primerosPlatosActuales = $menuRestaurante->obtenerPrimerosPlatos();
                //Añado el nuevo plato
                $primerosPlatosActuales[] = $nuevoPrimerPlato;
                //Actualizo los PrimerosPlatos en el Objeto
                $menuRestaurante->establecerPrimerosPlatos($primerosPlatosActuales);
            }
        } elseif (isset($_GET['agregarSegundoPlato'])) {
            $nuevoSegundoPlato = $_GET['sPlato'];
            if(strlen($nuevoSegundoPlato) > 0) {
                $segundosPlatosActuales   = $menuRestaurante->obtenerSegundosPlatos();
                $segundosPlatosActuales[] = $nuevoSegundoPlato;
                $menuRestaurante->establecerSegundosPlatos($segundosPlatosActuales);
            }
        } elseif (isset($_GET['agregarPostre'])) {
            $nuevoPostre = $_GET['tPlato'];
            if(strlen($nuevoPostre) > 0) {
                $postresActuales   = $menuRestaurante->obtenerPostres();
                $postresActuales[] = $nuevoPostre;
                $menuRestaurante->establecerPostres($postresActuales);
            }
        }

        if(isset($_GET['maquetar'])) {
            ?>
<div class='menu'>
    <img class="top" src="adorno.jpg" alt="adorno">
            <?php
            echo "<h1>Menú del día</h1>";
            echo $menuRestaurante->obtenerDia() . ", " . $menuRestaurante->obtenerFecha();

            $menuRestaurante->mostrarPlatos($menuRestaurante->obtenerPrimerosPlatos(), "Primeros platos");

            echo "<br>";
            $menuRestaurante->mostrarPlatos($menuRestaurante->obtenerSegundosPlatos(), "Segundos platos");

            echo "<br>";
            $menuRestaurante->mostrarPlatos($menuRestaurante->obtenerPostres(), "Postres");
            ?>
                <img class="bottom" src="adorno.jpg" alt="adorno">

</div>
            <?php
        } else {
            $menuSerializado = serialize($menuRestaurante);
            //Se guarda la cadena de texto (objeto) en una variable de sesión
            $_SESSION['menu'] = $menuSerializado;
            echo "<h1>Menú del " . $menuRestaurante->obtenerDia() . ", " . $menuRestaurante->obtenerFecha() . "</h1>";
            ?>
        <form action="Menu.php" method="get">
            <label for="pPlato">Primeros platos:</label><br>
            <?php
                $menuRestaurante->mostrarPlatos($menuRestaurante->obtenerPrimerosPlatos(), "");
            ?>
            <input type="text" name="pPlato">
            <input type="submit" name="agregarPrimerPlato" value="Añadir">
<br><br>


            <label for="sPlato">Segundos platos:</label><br>
            <?php
                 $menuRestaurante->mostrarPlatos($menuRestaurante->obtenerSegundosPlatos(), "");
            ?>
            <input type="text" name="sPlato">
            <input type="submit" name="agregarSegundoPlato" value="Añadir">
<br><br>


            <label for="tPlato">Postres:</label><br>
            <?php
                 $menuRestaurante->mostrarPlatos($menuRestaurante->obtenerPostres(), "");
            ?>
            <input type="text" name="tPlato">
            <input type="submit" name="agregarPostre" value="Añadir">
<br><br>
            <input type="submit" name="maquetar" value="Confeccionar carta">
        </form>


        <?php
        }
    }
} else {
    ?>
    <form action="Menu.php" method="get">
        <label for="dia">Día de la semana: </label>
        <input type="text" name="dia">
        <br>
        <label for="fecha">Fecha: </label>
        <input type="text" name="fecha">
        <br>
        <input type="submit" value="Diseñar menú" name="crear">
    </form>
    <?php
}

?>
    </main>
    <aside></aside>
</section>
<footer></footer>
</body>
</html>
