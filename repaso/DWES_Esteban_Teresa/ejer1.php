<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Examen de repaso</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<header>
        <h1>EXAMEN 1ªEVALUACION</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1 class="titulo11" style="color:red;text-align: center;">EJERCICIO 1</h1>
            <br>
            <?php
//Si ponemos if(!REQUEST) entrará en el condicional porque venimos de un formulario
//Por lo tanto, evaluamos un elemento del formulario de este ejercicio
?>
<h2>Suma de matrices</h2>
<p>Introduzca la dimensión (N) de las matrices cuadradas (entre 1 y 5, ambos incluidos).</p>
<div id="formulario">
    <form action="ejer1.php" method="post">
        <input type="number" name="dimension" min="1" max="5" required>
        <button type="submit">Enviar</button>
    </form>
</div>
<?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dimension = isset($_POST['dimension']) ? intval($_POST['dimension']) : 0;

            if ($dimension >= 1 && $dimension <= 5) {
                // Lógica para generar y sumar las matrices con números aleatorios
                $matrizA = generarMatrizAleatoria($dimension);
                $matrizB = generarMatrizAleatoria($dimension);
                $matrizResultado = sumarMatrices($matrizA, $matrizB);

                // Mostrar las matrices y el resultado con el formato especificado
                echo "<h2>Matriz A</h2>";
                mostrarMatriz($matrizA);

                echo "<h2>Matriz B</h2>";
                mostrarMatriz($matrizB);

                echo "<h2>Resultado</h2>";
                mostrarMatriz($matrizResultado);

                // Mostrar el formulario nuevamente
                echo "<br><br>";
                include('ejer1.php'); // Reutiliza el formulario HTML
            } else {
                echo "<p>La dimensión debe estar entre 1 y 5, ambos incluidos.</p>";
            }
        }

        function generarMatrizAleatoria($dimension) {
            $matriz = array();
            for ($i = 0; $i < $dimension; $i++) {
                $fila = array();
                for ($j = 0; $j < $dimension; $j++) {
                    $fila[] = rand(-20, 20);
                }
                $matriz[] = $fila;
            }
            return $matriz;
        }

        function sumarMatrices($matrizA, $matrizB) {
            $resultado = array();
            for ($i = 0; $i < count($matrizA); $i++) {
                $filaResultado = array();
                for ($j = 0; $j < count($matrizA[$i]); $j++) {
                    $filaResultado[] = $matrizA[$i][$j] + $matrizB[$i][$j];
                }
                $resultado[] = $filaResultado;
            }
            return $resultado;
        }

        function mostrarMatriz($matriz) {
            echo "<table border='1'>";
            foreach ($matriz as $fila) {
                echo "<tr>";
                foreach ($fila as $elemento) {
                    echo "<td>$elemento</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>
