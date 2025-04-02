<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_alumnos'])) {
    $num_alumnos = intval($_POST['num_alumnos']);
    $alumnos = [];

    for ($i = 1; $i <= $num_alumnos; $i++) {
        $carnet = $_POST["carnet_$i"] ?? '';
        $nombres = $_POST["nombres_$i"] ?? '';
        $nota1 = isset($_POST["nota1_$i"]) ? floatval($_POST["nota1_$i"]) : 0;
        $nota2 = isset($_POST["nota2_$i"]) ? floatval($_POST["nota2_$i"]) : 0;
        $nota3 = isset($_POST["nota3_$i"]) ? floatval($_POST["nota3_$i"]) : 0;

        // Cálculo del promedio ponderado
        $promedio = ($nota1 * 0.5) + ($nota2 * 0.25) + ($nota3 * 0.25);
        $estado = ($promedio >= 6) ? 'Aprobado' : 'Reprobado';

        $alumnos[] = [
            'carnet' => $carnet,
            'nombres' => $nombres,
            'nota1' => $nota1,
            'nota2' => $nota2,
            'nota3' => $nota3,
            'promedio' => number_format($promedio, 2),
            'estado' => $estado
        ];
    }
} else {
    header("Location: ingresar_alumnos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilos.css">
    <title>Resultados de Alumnos</title>
</head>
<body>
    <h2>Resultados de Alumnos</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Carnet</th>
                <th>Nombres</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Promedio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <td><?= htmlspecialchars($alumno['carnet']) ?></td>
                    <td><?= htmlspecialchars($alumno['nombres']) ?></td>
                    <td><?= htmlspecialchars($alumno['nota1']) ?></td>
                    <td><?= htmlspecialchars($alumno['nota2']) ?></td>
                    <td><?= htmlspecialchars($alumno['nota3']) ?></td>
                    <td><?= htmlspecialchars($alumno['promedio']) ?></td>
                    <td><?= htmlspecialchars($alumno['estado']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="alumno.php">Ingresar Nuevos Alumnos</a>
</body>
</html>