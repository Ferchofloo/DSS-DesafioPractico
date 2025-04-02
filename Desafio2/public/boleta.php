<?php
require_once '../src/Clases/Empleado.php';
require_once '../src/Clases/Nomina.php';

use App\Clases\Nomina;

$id = $_GET["id"];
$empleados = json_decode(file_get_contents('empleados.json'), true);
$empleado = $empleados[$id];

$nomina = new Nomina($empleado);
$boleta = $nomina->generarBoleta();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Pago</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h2>Boleta de Pago del Empleado: <?= $empleado["nombre"] ?></h2>
    <div>
        <?= $boleta ?>
    </div>
    <a href="index.php" class="boton boton-volver">Volver a la lista de empleados</a>
</body>
</html>
