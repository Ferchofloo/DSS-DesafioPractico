<a href="index.php?accion=agregar">Agregar libro</a>
<table border="1">
    <tr><th>ID</th><th>Título</th><th>Autor</th><th>Acciones</th></tr>
    <?php while($fila = $libros->fetch_assoc()): ?>
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['titulo'] ?></td>
            <td><?= $fila['autor'] ?></td>
            <td>
                <a href="index.php?accion=editar&id=<?= $fila['id'] ?>">Editar</a>
                <a href="index.php?accion=eliminar&id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar libro?')">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
