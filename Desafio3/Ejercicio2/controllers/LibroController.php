<?php
require_once "models/Libro.php";

$libro = new Libro();

$accion = $_GET['accion'] ?? 'listar';

if ($accion == 'agregar') {
    if ($_POST) {
        $libro->agregar($_POST['titulo'], $_POST['autor']);
        header("Location: index.php");
    }
    include "views/agregar.php";
} elseif ($accion == 'editar') {
    if ($_POST) {
        $libro->actualizar($_POST['id'], $_POST['titulo'], $_POST['autor']);
        header("Location: index.php");
    } else {
        $data = $libro->obtenerPorId($_GET['id']);
        include "views/editar.php";
    }
} elseif ($accion == 'eliminar') {
    $libro->eliminar($_GET['id']);
    header("Location: index.php");
} else {
    $libros = $libro->obtenerTodos();
    include "views/listar.php";
}
?>
