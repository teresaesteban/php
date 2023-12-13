<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>
</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja">
    <?php include "../includes/nav_basicos.php"; ?>
    <main>
<?php
if (!$_REQUEST) {

    ?>
        <h1 style="text-align: center;">CAMBIO DIVISAS</h1>

    <form action="ejer3.php" method="GET">
				<p>Cambio de 1 euro a dólares estadounidenses: <input type="number" name="cambioDolar" step="0.0001" min="0" required></p>
				<p>Cambio de 1 euro a libras esterlinas: <input type="number" name="cambioLibra" step="0.0001" min="0" required></p>
				<input type="submit" value="Enviar">
			</form>
            <?php
            }else{
                $cambioDolar=$_GET['cambioDolar'];
                $cambioLibra=$_GET['cambioLibra'];
                $fecha=date("d-m-y");
                echo "<h1 id='centrado'>CAMBIO DE DIVISAS A FECHA $fecha</h1>";
                echo "<table>";
                echo "<tr>
                        <th>Euros</th>
                        <th>Dolares</th>
                        <th>Libras</th>
                    </tr>";
                for ($euro=1; $euro<=10 ; $euro++)
                {
                    if ($euro%2==0)
                        echo "<tr class='par'>";
                    else
                        echo "<tr class='impar'>";
                    echo "<td>$euro</td>";
                    echo "<td>", $euro*$cambioDolar,"</td>";
                    echo "<td>", $euro*$cambioLibra,"</td>";
                    echo "</tr>";
                }
                echo "</table>";

          }
          ?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>