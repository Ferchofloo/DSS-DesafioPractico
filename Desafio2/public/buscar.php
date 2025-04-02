<?php
$archivo = "empleados.json";

if (!file_exists($archivo)) {
    echo "No hay empleados registrados.";
    exit;
}

$empleados = json_decode(file_get_contents($archivo), true);
if (!is_array($empleados)) {
    echo "Error al cargar los empleados.";
    exit;
}

$query = isset($_POST["query"]) ? trim($_POST["query"]) : "";
$resultados = [];

if (!empty($query)) {
    foreach ($empleados as $empleado) {
        if (stripos($empleado["nombre"], $query) !== false || $empleado["id"] == $query) {
            $resultados[] = $empleado;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <a href="index.php" class="boton boton-salida">Volver</a>
    <h2>Resultados de la Búsqueda</h2>

    <?php if (empty($resultados)): ?>
        <p>No se encontraron empleados.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Foto</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Salario Base</th>
                <th>Horas Extras</th>
                <th>Préstamo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($resultados as $empleado): ?>
                <tr>
                    <td><img src="<?= $empleado['foto'] ?>" width="50" height="50" style="border-radius: 50%;"></td>
                    <td><?= $empleado["id"] ?></td>
                    <td><?= $empleado["nombre"] ?></td>
                    <td>$<?= number_format($empleado["salarioBase"], 2) ?></td>
                    <td><?= $empleado["horasExtras"] ?> horas</td>
                    <td>$<?= number_format($empleado["prestamo"], 2) ?></td>
                    <td>
                    <a href="editar.php?id=<?= $empleado["id"] ?>" class="boton boton-editar">Editar</a>
                <a href="eliminar.php?id=<?= $empleado["id"] ?>" class="boton boton-eliminar">Eliminar</a>
                <a href="boleta.php?id=<?= $empleado["id"] ?>" class="boton boton-boleta">Boleta</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
