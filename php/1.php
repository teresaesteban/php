<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function conservamonedas(){
        $euros = rand(1,100);
        $divisa = rand(0, 1);
        if ($divisa == 0) {
            $dolares = $euros * 1.0543;
            echo "La divisa será dólares USA, tenemos $euros euros, se convertirán en $dolares";
        } else {
            $libras = $euros * 0.8678;
            echo "La divisa será libras, tenemos $euros euros, se convertirán en $libras";
        }
    }

    conservamonedas();
    ?>
</body>
</html>
