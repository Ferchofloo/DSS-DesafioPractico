<?php
require_once '../src/Clases/Empleado.php';
require_once '../src/Clases/Nomina.php';
require_once '../src/Clases/GestorEmpleados.php';
require_once '../src/Controladores/EmpleadoControlador.php';

use App\Controladores\EmpleadoControlador;

$controlador = new EmpleadoControlador();
$empleados = $controlador->obtenerEmpleados();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<form method="POST" action="buscar.php">
    <input type="text" name="query" placeholder="Buscar empleado..." required>
    <button class = "index-buttom" type="submit">Buscar</button>
</form>

    <h2>Lista de Empleados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Salario</th>
            <th>Horas Extras</th>
            <th>Préstamo</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?= $empleado["id"] ?></td>
                <td><?= $empleado["nombre"] ?></td>
                <td>$<?= $empleado["salarioBase"] ?></td>
                <td><?= $empleado["horasExtras"] ?></td>
                <td>$<?= $empleado["prestamo"] ?></td>
                <td><img src="<?= $empleado["foto"] ?>" width="50"></td>
                <td>
                <a href="editar.php?id=<?= $empleado["id"] ?>" class="boton boton-editar">Editar</a>
                <a href="eliminar.php?id=<?= $empleado["id"] ?>" class="boton boton-eliminar">Eliminar</a>
                <a href="boleta.php?id=<?= $empleado["id"] ?>" class="boton boton-boleta">Boleta</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><br><br>
    <a href="../public/agregar.php"><button class = "index-buttom">Agregar empleado</button></a>
</body>
</html>
