<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>CLASE EMPLEADO</h1>
</header>
<section>
    <nav></nav>
    <main>
        <?php
require_once("Persona.php");
class Empleado extends Persona
{
    // Propiedades específicas de esta clase.
    private $puesto;
    private $sueldo;

    /* Ejemplo de redefinición de un método de la clase padre */
    public function getNombreCompleto()
    {
        $cadena = parent::getNombreCompleto();
        return "$cadena: {$this->getNombre()}*{$this->getApellidos()}";
    }

    public function __construct($nom, $ape, $sexo, $fechaNaci, $puesto, $sueldo)
    {
        parent::__construct($nom, $ape, $sexo, $fechaNaci);
        $this->puesto = $puesto;
        $this->sueldo = $sueldo;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }

    public function getPuesto()
    {
        return $this->puesto;
    }

    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }

    public function calcularImpuestos()
    {
        if ($this->sueldo < 2000) {
            return "No paga impuestos";
        } else {
            return "Paga impuestos";
        }
    }
}
// Crear una instancia de la clase Empleado
$objEmpleado = new Empleado("", "", "", "", "Programador", 2500);
echo "Puesto: " . $objEmpleado->getPuesto() . "<br>";
echo "Sueldo: " . $objEmpleado->getSueldo() . "<br>";
echo "Impuestos: " . $objEmpleado->calcularImpuestos() . "<br>";

?>

 </main>
 <aside></aside>
</section>
<footer></footer>
</body>
</html>

