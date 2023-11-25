<!DOCTYPE html>
<!--⦁	Hacer una página web que compruebe si el contenido de una variable entera es par o impar. -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluacion inicial</title>
</head>
<body>
  <?php

  $numero1= $_GET["numero1"];
if($numero1%2==0){
    echo "El numero es par";
}
else{
    echo"El numero es impar";
}

?>
</body>
</html>
