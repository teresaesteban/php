<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../includes/metadata2.php"; ?>

</head>
<body>
<?php include "../includes/header2.php"; ?> <!-- Aquí se incluye el contenido.php -->
<?php include "../includes/menu2.php"; ?>


<div class="caja2">
    <?php include "../includes/nav_funciones.php"; ?>
    <main>
    <h1 style="text-align: center;">TABLAS HTML</h1>
<?php
                function tablaNxM($n,$m)
                {
                    echo "<h1>TABLA HTML DE $n x $m</h1>";
                    echo "<table border='1'>";
                    $numero=1;
                    for ($i=1;$i<=$n;$i++)
                    {
                        echo '<tr>' ;
                        for ($j=1;$j<=$m;$j++)
                        {
                            echo '<td>';
                            echo $numero;
                            echo '</td>';
                            $numero++;
                        }
                        echo '</tr>';
                    }
                    echo "</table>";
                }

                //Varias llamadas a la función para probarla
                tablaNxM(5,7);

                $nfilas=6;
                $ncolumnas=3;
                tablaNxM($nfilas,$ncolumnas);



                $nfilas=10;
                $ncolumnas=10;
                tablaNxM($nfilas,$ncolumnas);

                $nfilas=2;
                $ncolumnas=15;
                tablaNxM($nfilas,$ncolumnas);

                ?>
</main>
    <?php include "../includes/aside2.php"; ?>
</div>
<?php include "../includes/footer2.php"; ?>
</body>
</html>