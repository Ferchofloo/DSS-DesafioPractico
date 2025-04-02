<?php
$archivo = "empleados.json";
$empleados = json_decode(file_get_contents($archivo), true);
$id = $_GET["id"];
unset($empleados[$id]);
file_put_contents($archivo, json_encode($empleados, JSON_PRETTY_PRINT));
header("Location: index.php");
exit();
?>