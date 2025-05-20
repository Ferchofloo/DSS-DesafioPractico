<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #e6ffe6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        text-align: center;
    }
    a {
        color: #007BFF;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido/a <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
        <p>Has ingresado correctamente.</p>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>

