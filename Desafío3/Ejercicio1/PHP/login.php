<?php
session_start();
$conn = new mysqli("localhost", "root", "", "desafio_login");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario'] = $usuario['nombre_completo'];
            header("Location: bienvenida.php");
            exit;
        }
    }
    header("Location: login.php?error=1");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
</style>

</head>
<body>
    <form method="post">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($_GET['error'])) echo "<p style='color:red;'>Credenciales incorrectas</p>"; ?>

        <label>Correo:</label>
        <input type="email" name="email" required>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>

        <input type="submit" value="Entrar">

        <p><a href="registro.php">Crear cuenta</a></p>
    </form>
</body>
</html>
