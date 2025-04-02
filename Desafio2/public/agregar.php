<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $archivo = "empleados.json";

    //Crear un archivo y añadir al archivo
    if (!file_exists($archivo)) {
        file_put_contents($archivo, json_encode([]));
    }

    $empleados = json_decode(file_get_contents($archivo), true);
    if (!is_array($empleados)) {
        $empleados = [];
    }

    // Validaciones
    $errores = [];

    $nombre = trim($_POST["nombre"]);
    $salarioBase = filter_var($_POST["salario"], FILTER_VALIDATE_FLOAT);
    $horasExtras = filter_var($_POST["horasExtras"], FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]);
    $prestamo = filter_var($_POST["prestamo"], FILTER_VALIDATE_FLOAT, ["options" => ["min_range" => 0]]);

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if ($salarioBase === false || $salarioBase < 0) {
        $errores[] = "El salario base debe ser un número positivo.";
    }
    if ($horasExtras === false) {
        $horasExtras = 0; 
    }
    if ($prestamo === false) {
        $prestamo = 0; 
    }

    if ($_FILES["foto"]["error"] === 0) {
        $permitidos = ["image/jpeg", "image/png", "image/jpg"];
        if (!in_array($_FILES["foto"]["type"], $permitidos)) {
            $errores[] = "Solo se permiten imágenes en formato JPG o PNG.";
        }
    } else {
        $errores[] = "Debe subir una imagen.";
    }

    if (empty($errores)) {

        $id = count($empleados) + 1;


        $foto = "uploads/" . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);

        $empleados[$id] = [
            "id" => $id,
            "nombre" => $nombre,
            "salarioBase" => $salarioBase,
            "horasExtras" => $horasExtras,
            "prestamo" => $prestamo,
            "foto" => $foto
        ];

        // Guardar en el archivo JSON
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
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Agregar Empleado</h2>
        
        <?php if (!empty($errores)): ?>
            <div class="errores">
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li style="color: red;"><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="number" name="salario" placeholder="Salario Base" min="0" step="0.01" required>
            <input type="number" name="horasExtras" placeholder="Horas Extras" min="0">
            <input type="number" name="prestamo" placeholder="Préstamo" min="0" step="0.01">
            <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg" required>
            <button type="submit">Guardar</button>
        </form>
        <a href="index.php" class="boton boton-salida">Volver</a>
    </div>
</body>
</html>
