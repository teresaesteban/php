<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <label for="numero">Ingrese una cantidad entero de euros:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <input type="submit" value="imprimir">
    </form>
<?PHP if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $b=array(500,200,100,50,20,10,5,2,1);
    for($i=1;$i<=9;$i++){
        if($b){}
}

?>

</body>
</html>