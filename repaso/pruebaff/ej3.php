<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
</head>
<body>
    <?php
    // Array de nombres de alumnos
    $alumnos = array("Juan", "María", "Carlos", "Ana", "Pedro", "Laura", "Miguel", "Sofía", "Luis", "Elena");

    // Array de nombres de asignaturas
    $asignaturas = array("Matemáticas", "Ciencias", "Historia", "Lengua", "Arte");

    function generarCalificaciones($alumnos, $asignaturas) {
        $calificaciones = [];

        foreach ($alumnos as $alumno) {
            foreach ($asignaturas as $asignatura) {
                $calificaciones[$alumno][$asignatura] = number_format(rand(0, 100) / 10, 2);
            }
        }

        return $calificaciones;
    }

    function obtenerTextoNota($nota) {
        if ($nota < 5) {
            return "Suspenso";
        } elseif ($nota >= 5 && $nota < 7) {
            return "Aprobado";
        } elseif ($nota >= 7 && $nota < 9) {
            return "Notable";
        } elseif ($nota >= 9 && $nota <= 10) {
            return "Sobresaliente";
        } else {
            return "Error en la nota";
        }
    }

    // Llamada a la función
    $arrayMultidimensional = generarCalificaciones($alumnos, $asignaturas);
    ?>

    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <?php foreach ($asignaturas as $asignatura): ?>
                    <th><?= $asignatura ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arrayMultidimensional as $alumno => $calificacionesAlumno): ?>
                <tr>
                    <td><?= $alumno ?></td>
                    <?php foreach ($calificacionesAlumno as $calificacion): ?>
                        <td><?= obtenerTextoNota($calificacion) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
