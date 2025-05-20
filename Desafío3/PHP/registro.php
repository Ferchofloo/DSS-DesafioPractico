<?php
$conn = new mysqli("localhost", "root", "", "desafio_login");

$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_completo, email, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $contrasena);

    if ($stmt->execute()) {
        $mensaje = "<p class='success'>Usuario registrado con éxito. <a href='login.php'>Ir a login</a></p>";
    } else {
        $mensaje = "<p class='error'>Error: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
}
input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
input[type="submit"] {
    background-color: #007BFF;
    color: white;
    padding: 10px;
    border: none;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #0056b3;
}
h2 {
    text-align: center;
    color: #333;
}
p {
    text-align: center;
}
a {
    color: #007BFF;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: center;
}
.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: center;
}
</style>
</head>
<body>
    <form method="post">
        <h2>Registro de usuario</h2>

        <?php
        if (!empty($mensaje)) {
            echo $mensaje;
        }
        ?>

        <label>Nombre completo:</label>
        <input type="text" name="nombre" required>

        <label>Correo:</label>
        <input type="email" name="email" required>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>

        <input type="submit" value="Registrar">

        <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
    </form>
</body>
</html>
