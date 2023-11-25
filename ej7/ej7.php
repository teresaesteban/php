<!DOCTYPE html>
<html>
<head>
    <title>Tablas de Multiplicar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tablas de Multiplicar del 1 al 10</h1>

    <table>
        <tr>
            <th>Tabla</th>
            <th>Multiplicador</th>
            <th>Resultado</th>
        </tr>

        <?php
        for ($tabla = 1; $tabla <= 10; $tabla++) {
            for ($multiplicador = 1; $multiplicador <= 10; $multiplicador++) {
                $resultado = $tabla * $multiplicador;
                echo "<tr>
                        <td>$tabla</td>
                        <td>$multiplicador</td>
                        <td>$resultado</td>
                      </tr>";
            }
        }
        ?>
    </table>
</body>
</html>
