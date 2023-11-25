<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <label for="numero">Ingrese un número entero positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <input type="submit" value="imprimir">
    </form>
<?PHP if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    function imprimir($numero){
    $resto=$numero%12;
    $r=array("cero","uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once");
    for($i=1;$i<=$resto;$i++){
        if($i==$resto){
            echo("El resto será $r[$i]");
        }
    }

    }
    imprimir($numero);

}?>

</body>
</html>