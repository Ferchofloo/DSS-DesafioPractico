<?php
require_once "models/Libro.php";
$libro = new Libro();

$accion = $_GET['accion'] ?? 'listar';

if ($accion == 'agregar') {
    $errores = [];

    if ($_POST) {
        $titulo = trim($_POST['titulo']);
        $autor = trim($_POST['autor']);

        if ($titulo === '') $errores[] = "El título no puede estar vacío.";
        if ($autor === '') $errores[] = "El autor no puede estar vacío.";
        if ($libro->existeTitulo($titulo)) {
            $errores[] = "Ya existe un libro con ese título.";
        }

        if (empty($errores)) {
            $libro->agregar($titulo, $autor);
            header("Location: index.php");
            exit;
        }
    }

    include "views/agregar.php";
}
elseif ($accion == 'editar') {
    $errores = [];

    if ($_POST) {
        $id = $_POST['id'];
        $titulo = trim($_POST['titulo']);
        $autor = trim($_POST['autor']);

        if ($titulo === '') $errores[] = "El título no puede estar vacío.";
        if ($autor === '') $errores[] = "El autor no puede estar vacío.";
        if ($libro->existeTitulo($titulo, $id)) {
            $errores[] = "Ya existe otro libro con ese título.";
        }

        if (empty($errores)) {
            $libro->actualizar($id, $titulo, $autor);
            header("Location: index.php");
            exit;
        } else {
            $data = ['id' => $id, 'titulo' => $titulo, 'autor' => $autor];
        }
    } else {
        $data = $libro->obtenerPorId($_GET['id']);
    }

    include "views/editar.php";
}
elseif ($accion == 'eliminar') {
    $libro->eliminar($_GET['id']);
    header("Location: index.php");
    exit;
}
else {
    $libros = $libro->obtenerTodos();
    include "views/listar.php";
}
?>
