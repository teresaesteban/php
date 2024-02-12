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
        <h1>CALCULADORA RACIONAL</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <?php

class Racional
{
    private $numerador;

    private $denominador;

    public function __construct($numero1 = null, $numero2 = null)
    {
        if($numero1 == null && $numero2 == null) {
            $this->numerador   = 1;
            $this->denominador = 1;
        } elseif ($numero1 != null && $numero2 == null && is_numeric($numero1)) {
            $this->numerador   = $numero1;
            $this->denominador = 1;
        } elseif($numero1 != null && $numero2 != null || $numero1 == 0) {
            $this->numerador   = $numero1;
            $this->denominador = $numero2;
        } elseif (preg_match('/^\d+\/\d+$/', $numero1)) {
            $numeros           = explode('/', $numero1);
            $this->numerador   = $numeros[0];
            $this->denominador = $numeros[1];
        }
    }
    public function getNumerador()
    {
        return $this->numerador;
    }

    public function getDenominador()
    {
        return $this->denominador;
    }

    public function setNumerador($numerador): void
    {
        $this->numerador = $numerador;
    }

    public function setDenominador($denominador): void
    {
        $this->denominador = $denominador;
    }

    public function sumar($valor)
    {
        $valor1  = clone $this;
        $valor12 = clone $valor;
        $valor1->setDenominador($this->getDenominador() * $valor->getDenominador());
        $valor1->setNumerador($this->getNumerador() * $valor->getDenominador());
        $valor12->setDenominador($valor->getDenominador() * $this->getDenominador());
        $valor12->setNumerador($valor->getNumerador() * $this->getDenominador());
        $numerador = $valor1->getNumerador() + $valor12->getNumerador();
        return new Racional($numerador, $valor12->getDenominador());
    }
    public function restar($valor)
    {
        $valor1  = clone $this;
        $valor12 = clone $valor;
        $valor1->setDenominador($this->getDenominador() * $valor->getDenominador());
        $valor1->setNumerador($this->getNumerador() * $valor->getDenominador());
        $valor12->setDenominador($valor->getDenominador() * $this->getDenominador());
        $valor12->setNumerador($valor->getNumerador() * $this->getDenominador());
        $numerador = $valor1->getNumerador() - $valor12->getNumerador();
        return new Racional($numerador, $valor12->getDenominador());

    }
    public function multiplicar($valor)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $valor->getNumerador());
        $resultado->setDenominador($this->getDenominador() * $valor->getDenominador());
        return $resultado;
    }
    public function dividir($valor)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $valor->getDenominador());
        $resultado->setDenominador($this->getDenominador() * $valor->getNumerador());
        return $resultado;
    }
    public function simplificar()
    {
        // Calcular el MCD
        $mcd = $this->calcularMCD($this->numerador, $this->denominador);

        // Simplificar numerador y denominador dividiéndolos por el MCD
        $this->numerador   /= $mcd;
        $this->denominador /= $mcd;
    }

    private function calcularMCD($a, $b)
    {
        // Algoritmo de Euclides para calcular el MCD
        while ($b != 0) {
            $temp = $b;
            $b    = $a % $b;
            $a    = $temp;
        }
        return $a;
    }
    public function __toString(): string
    {
        return $this->numerador . '/' . $this->denominador;
    }
}
?>

    <table style="margin: 0 auto;" >
    <tr>
    <td valign="top" rowspan="2" class="customGeneral">
                        <fieldset class="customDiv customWidth300">
          <legend><b>Reglas de uso de la calculadora</b></legend>

          <ul>
            <li>La calculadora se usa escribiendo la operacion completa.</li>
            <li>La operación será <b>Operando_1 operación Operando_2</b></li>
            <li>Cada operando puede ser un número positivo <b>entero</b> o <b>racional</b></li>
            <li>Los operadore racionales permitidos son <span style="color: blue;">+ - * :</span></li>
            <li>No se deben dejar espacios en blanco entre operandos y operación</li>
            <li>Ejemplos:
              <ul>
                <li>5+4</li>
                <li>5/2:2</li>
                <li>1/4*2/3</li>
                <li>2/7:1/3</li>
              </ul>
            </li>
          </ul>
        </fieldset>
      </td>
      <td class="customGeneral">
                        <fieldset class="customDiv customPadding30">
          <legend><b>Establece la operación</b></legend>
          <form action="ej3.php">
            Operación:
            <input type="text" name="operacion" required>
            <input type="submit" value="Calcular" name="calcular">
            <?php

if (isset($_REQUEST['operacion'])) {?>
            <br>
            <span style="color: blue; font-weight: bold;">
              <?php
      // Divide la cadena en un array usando múltiples delimitadores
      $numeros = preg_split('/[+:*-]/', $_REQUEST['operacion']);

    // Filtra elementos vacíos que pueden surgir debido a delimitadores consecutivos
    $numeros = array_filter($numeros);

    // Utiliza preg_match para encontrar el primer separador en la cadena
    preg_match('/[+:*-]/', $_REQUEST['operacion'], $matches);

    // Utiliza el primer carácter encontrado como separador
    $signo     = $matches[0];
    $operando1 = new Racional($numeros[0]);
    $operando2 = new Racional($numeros[1]);
    print '<br>';
    switch ($signo) {
        case '+':
            $resultado = $operando1->sumar($operando2);
            break;
        case '-':
            $resultado = $operando1->restar($operando2);
            break;
        case '*':
            $resultado = $operando1->multiplicar($operando2);
            break;
        case ':':
            $resultado = $operando1->dividir($operando2);
            break;
    }

    // Imprime el resultado directamente
    print $operando1->__toString() . $signo . $operando2->__toString() . '=' . $resultado->__toString();

}
  ?>
          </span>
        </form>
      </fieldset>
    </td>
    </tr>
    <tr>
    <td class="customGeneral">
                        <fieldset class="customDiv customWidth325">
          <legend><b>Resultado</b></legend>
          <?php
if (isset($_REQUEST['operacion'])) {
    ?>
        <table class="Tresultado">
          <tr>
            <th>Concepto</th>
            <th>Valores</th>
          </tr>
          <tr>
            <td><b>Operando 1</b></td>
            <td align="center">
              <?php
                  print $operando1->__toString();
    ?>
            </td>
          </tr>
          <tr>
            <td><b>Operando 2</b></td>
            <td align="center">
              <?php
    print $operando2->__toString();
    ?>
              </td>
            </tr>
            <tr>
              <td><b>Operación</b></td>
              <td align="center">
                <?php
    print $signo;
    ?>
    </td>
  </tr>
  <tr>
    <td><b>Resultado</b></td>
    <td align="center">
      <?php
    print $resultado->__toString();
    ?>

</td>
</tr>
<tr>
  <td><b>Resultado simplificado</b></td>
  <td align="center">
    <?php
              $resultado->simplificar();
    print $resultado->__toString();
    ?>
            </td>
          </tr>
        </table>
        <?php
}
  ?>
      </fieldset>
    </td>
    </tr>
    </table>
  </main>
  <aside></aside>
    </section>

    <footer></footer>
</body>

</html>