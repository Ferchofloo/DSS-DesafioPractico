<h2>Editar Libro</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    Título: <input type="text" name="titulo" value="<?= $data['titulo'] ?>"><br>
    Autor: <input type="text" name="autor" value="<?= $data['autor'] ?>"><br>
    <input type="submit" value="Actualizar">
</form>
