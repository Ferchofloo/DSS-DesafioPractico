<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Ingreso de Alumnos</title>
</head>
<body>
    <h2>Formulario de Ingreso de Alumnos</h2>

    <?php
    if (!isset($_POST['num_alumnos'])) {
    ?>
        <!-- FORMULARIO PARA INGRESAR EL NÚMERO DE ALUMNOS -->
        <form action="" method="POST">
            <label for="num_alumnos">Número de Alumnos:</label>
            <input type="number" name="num_alumnos" id="num_alumnos" required min="1">
            <button type="submit">Continuar</button>
        </form>
    <?php
    } else {
        $num_alumnos = intval($_POST['num_alumnos']);
    ?>

        <!-- FORMULARIO PARA INGRESAR LOS DATOS DE LOS ALUMNOS -->
        <form action="resultados.php" method="POST">
            <input type="hidden" name="num_alumnos" value="<?= $num_alumnos ?>">

            <?php for ($i = 1; $i <= $num_alumnos; $i++): ?>
                <fieldset>
                    <legend>Alumno <?= $i ?></legend>

                    <label for="carnet_<?= $i ?>">Carnet:</label>
                    <input type="text" name="carnet_<?= $i ?>" required><br><br>

                    <label for="nombres_<?= $i ?>">Nombres:</label>
                    <input type="text" name="nombres_<?= $i ?>" required><br><br>

                    <label for="nota1_<?= $i ?>">Nota 1 (0-10):</label>
                    <input type="number" name="nota1_<?= $i ?>" step="0.01" min="0" max="10" required><br><br>

                    <label for="nota2_<?= $i ?>">Nota 2 (0-10):</label>
                    <input type="number" name="nota2_<?= $i ?>" step="0.01" min="0" max="10" required><br><br>

                    <label for="nota3_<?= $i ?>">Nota 3 (0-10):</label>
                    <input type="number" name="nota3_<?= $i ?>" step="0.01" min="0" max="10" required><br><br>
                </fieldset>
            <?php endfor; ?>

            <button type="submit">Calcular Promedios</button>
        </form>

    <?php } ?>
</body>
</html>
