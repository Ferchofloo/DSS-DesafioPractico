<?php
$archivo = "empleados.json";
$empleados = json_decode(file_get_contents($archivo), true);
$id = $_GET["id"];
$empleado = $empleados[$id];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validaciones
    $errores = [];

    if (empty($_POST["nombre"])) {
        $errores[] = "El nombre es obligatorio.";
    }

    if (empty($_POST["salario"]) || $_POST["salario"] <= 0) {
        $errores[] = "El salario base debe ser un número positivo.";
    }

    if ($_POST["horasExtras"] < 0) {
        $errores[] = "Las horas extras no pueden ser negativas.";
    }

    if ($_POST["prestamo"] < 0) {
        $errores[] = "El préstamo no puede ser negativo.";
    }

    if ($_FILES["foto"]["name"]) {
        $ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        $validExtensions = ["jpg", "jpeg", "png", "gif"];
        
        if (!in_array(strtolower($ext), $validExtensions)) {
            $errores[] = "El archivo de la foto debe ser una imagen (jpg, jpeg, png, gif).";
        }
    }

    if (empty($errores)) {
        $empleado["nombre"] = $_POST["nombre"];
        $empleado["salarioBase"] = $_POST["salario"];
        $empleado["horasExtras"] = $_POST["horasExtras"];
        $empleado["prestamo"] = $_POST["prestamo"];

        if ($_FILES["foto"]["name"]) {
            $foto = "uploads/" . $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
            $empleado["foto"] = $foto;
        }

        $empleados[$id] = $empleado;
        file_put_contents($archivo, json_encode($empleados, JSON_PRETTY_PRINT));
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Editar Empleado</h2>

        <?php if (!empty($errores)): ?>
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li style="color: red;"><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" value="<?= $empleado["nombre"] ?>" required>
            <input type="number" name="salario" value="<?= $empleado["salarioBase"] ?>" required min="0">
            <input type="number" name="horasExtras" value="<?= $empleado["horasExtras"] ?>" min="0">
            <input type="number" name="prestamo" value="<?= $empleado["prestamo"] ?>" min="0">
            <input type="file" name="foto">
            <button type="submit">Actualizar</button>
        </form>
        <a href="index.php" class="boton boton-salida">Volver</a>
    </div>

</body>
</html>
