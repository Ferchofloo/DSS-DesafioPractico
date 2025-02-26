<?php
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo require_once</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
        .message {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
        .warning {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Demostración de require_once</h2>
    <?php echo "El script continúa después de require_once."; ?>
</div>

</body>
</html>
