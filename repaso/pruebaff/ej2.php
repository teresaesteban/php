<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ventas = array();

    // Obtener los datos del formulario
    for ($i = 1; $i <= 12; $i++) {
        $ventas[$i] = isset($_POST["mes_$i"]) ? (float)$_POST["mes_$i"] : 0;
    }

    // Calcular máximo, mínimo y promedio
    $maximo = max($ventas);
    $minimo = min($ventas);
    $promedio = count($ventas) > 0 ? array_sum($ventas) / count($ventas) : 0;

    // Mostrar resultados
    echo "<h2>Datos de Ventas</h2>";
    echo "<table>";
    echo "<tr><th>Mes</th><th>Ventas</th></tr>";
    foreach ($ventas as $mes => $venta) {
        echo "<tr><td>$mes</td><td>$venta</td></tr>";
    }
    echo "</table>";

    echo "<h2>Resultados</h2>";
    echo "<table>";
    echo "<tr><th>Máximo</th><th>Mínimo</th><th>Promedio</th></tr>";
    echo "<tr><td>$maximo</td><td>$minimo</td><td>$promedio</td></tr>";
    echo "</table>";
}

?>

<h2>Ingrese las Ventas Mensuales</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
        <tr><th>Mes</th><th>Ventas</th></tr>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            echo "<tr><td>$i</td><td><input type='number' name='mes_$i' required></td></tr>";
        }
        ?>
    </table>
    <br>
    <input type="submit" value="Calcular">
</form>

</body>
</html>
