<style>
body {
    font-family: 'Inter', sans-serif;
    background: #f0f2f5;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

a[href*="agregar"] {
    display: inline-block;
    background: #3498db;
    color: white;
    padding: 12px 25px;
    border-radius: 6px;
    text-decoration: none;
    margin: 20px 0;
    transition: all 0.3s ease;
    font-weight: 500;
}

a[href*="agregar"]:hover {
    background: #2980b9;
    box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
}

table {
    width: 100%;
    max-width: 800px;
    border-collapse: collapse;
    margin: 20px 0;
    background: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ecf0f1;
}

th {
    background-color: #f8f9fa;
    color: #2c3e50;
    font-weight: 600;
}

tr:hover {
    background-color: #f8f9fa;
}

td a {
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 4px;
    margin-right: 8px;
    transition: all 0.2s ease;
    font-size: 0.9em;
}

td a[href*="editar"] {
    background: #3498db26;
    color: #3498db;
}

td a[href*="editar"]:hover {
    background: #3498db;
    color: white;
}

td a[href*="eliminar"] {
    background: #e74c3c26;
    color: #e74c3c;
}

td a[href*="eliminar"]:hover {
    background: #e74c3c;
    color: white;
}

@media (max-width: 768px) {
    table {
        display: block;
        overflow-x: auto;
    }
    
    td:nth-child(1) {
        display: none;
    }
    
    th:nth-child(1) {
        display: none;
    }
}
</style>
<?php if ($libros->num_rows > 0): ?>
    <a href="index.php?accion=agregar">Agregar libro</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
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
<?php else: ?>
    <div class="no-books-container">
        <p>No hay libros registrados.</p>
        <a href="index.php?accion=agregar">Agrega un libro para comenzar</a>
    </div>
<?php endif; ?>

