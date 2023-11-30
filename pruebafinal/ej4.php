<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Listado completo de libros
$sql = "SELECT Id, Titulo, Autor, Precio FROM libros";
$result = $conn->query($sql);

echo "<h2>Listado completo de libros:</h2>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Id"]. " - Título: " . $row["Titulo"]. " - Autor: " . $row["Autor"]. " - Precio: $" . $row["Precio"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Mostrar libros de un autor seleccionado
echo "<h2>Libros de un autor seleccionado:</h2>";
$author = "Agatha Christie"; // Puedes cambiar esto por un formulario o un parámetro POST
$sql = "SELECT Id, Titulo, Autor, Precio FROM libros WHERE Autor = '$author'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Id"]. " - Título: " . $row["Titulo"]. " - Autor: " . $row["Autor"]. " - Precio: $" . $row["Precio"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Mostrar libros de un género seleccionado
echo "<h2>Libros de un género seleccionado:</h2>";
$genre = "Narrativa"; // Puedes cambiar esto por un formulario o un parámetro POST
$sql = "SELECT l.Id, l.Titulo, l.Autor, l.Precio FROM libros l JOIN genero g ON l.IdGenero = g.Id WHERE g.Nombre = '$genre'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Id"]. " - Título: " . $row["Titulo"]. " - Autor: " . $row["Autor"]. " - Precio: $" . $row["Precio"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Estadísticas de géneros
echo "<h2>Estadísticas de géneros:</h2>";
$sql = "SELECT g.Nombre, COUNT(*) as total_libros, AVG(l.Precio) as precio_medio FROM libros l JOIN genero g ON l.IdGenero = g.Id GROUP BY g.Nombre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Género: " . $row["Nombre"]. " - Total de libros: " . $row["total_libros"]. " - Precio medio: $" . round($row["precio_medio"], 2). "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>

</body>
</html>