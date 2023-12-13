<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>

</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja">
    <?php include "../includes/nav_funciones.php"; ?>
    <main>
    <h1 style="text-align: center;">NÚMEROS PERFECTOS</h1>
        <?php
					function sumadivisores($n)
					{
						$sumadiv = 1;
						for($i = 2; $i <= $n/2; $i++) {		//Realiza divisiones con divisores desde 2 hasta n/2, los números mayores de n/2 no serán divisores del número
							if($n % $i == 0) {
								$sumadiv += $i;
							}
						}
						return $sumadiv;
					}

					function esperfecto($n)
					{
						if ($n == sumadivisores($n)) {
							return true;
						}

						return false;
					}

					print "<h1>Pruebas de función para números perfectos</h1>";

				$n1 = 28;
				echo "La suma de divisores  de $n1 es: ",sumadivisores($n1),"<br/>";
				if (esperfecto($n1)) {
					print "El número $n1 SI es perfecto<br/><br/>";
				} else {
					print "El número $n1 NO es perfecto<br/><br/>";
				}

				$n1 = 35;
				echo "La suma de divisores  de $n1 es: ",sumadivisores($n1),"<br/>";
				if (esperfecto($n1)) {
					print "El número $n1 SI es perfecto<br/><br/>";
				} else {
					print "El número $n1 NO es perfecto<br/><br/>";
				}

				// Ahora vamos a calcular y mostrar los números perfectos del 1 al 5000
				print "Los números perfectos del 1 al 5000 son:<br/>";
				for ($i = 1; $i <= 5000; $i++) {
					if(esperfecto($i)) {
						print "$i, ";
					}
				}
				?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>