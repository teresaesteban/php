<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Ventas</title>

</head>
<body>

  <h2>Registro de Ventas Mensuales</h2>

  <?php
    $months = [
      "enero", "febrero", "marzo", "abril", "mayo", "junio",
      "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $month = $_POST["month"];
      $sales = (int)$_POST["sales"];

      // Validar que el mes sea válido y las ventas sean un número positivo
      if (in_array($month, $months) && $sales >= 0) {
        $salesData[$month] = $sales;
      }
    }
  ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="month">Selecciona el mes:</label>
    <select id="month" name="month">
      <?php
        foreach ($months as $m) {
          echo "<option value=\"$m\">$m</option>";
        }
      ?>
    </select>

    <label for="sales">Ventas:</label>
    <input type="number" id="sales" name="sales" required>

    <button type="submit">Agregar Venta</button>
  </form>

  <h2>Resumen de Ventas</h2>

  <table>
    <thead>
      <tr>
        <th>Mes</th>
        <th>Ventas</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if (isset($salesData)) {
          foreach ($salesData as $m => $sales) {
            echo "<tr><td>$m</td><td>$sales</td></tr>";
          }
        }
      ?>
    </tbody>
  </table>

  <h3>Estadísticas</h3>

  <?php
    if (isset($salesData)) {
      $maxValue = max($salesData);
      $minValue = min($salesData);
      $avgValue = array_sum($salesData) / count($salesData);
      echo "<p>Valor Máximo: $maxValue</p>";
      echo "<p>Valor Mínimo: $minValue</p>";
      echo "<p>Valor Medio: " . number_format($avgValue, 2) . "</p>";
    }
  ?>

</body>
</html>
