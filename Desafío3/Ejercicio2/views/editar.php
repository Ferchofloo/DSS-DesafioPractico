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

h2 {
    color: #2c3e50;
    margin: 2rem 0 1.5rem 0;
    font-size: 2.2rem;
    letter-spacing: -0.5px;
    width: 100%;
    max-width: 400px;
}

form {
    background: white;
    padding: 2.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    width: 100%;
    max-width: 400px;
    transition: transform 0.2s ease;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 1.5rem;
    border: none;
    border-bottom: 2px solid #e0e0e0;
    font-size: 1rem;
    transition: all 0.3s ease;
}

input[type="text"]:focus {
    outline: none;
    border-bottom-color: #3498db;
    background-color: #f8f9fa;
}

input[type="submit"] {
    background: #3498db;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    width: 100%;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background: #2980b9;
    box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
}

h2 {
    color: #2c3e50; 
    margin: 2rem 0 1.5rem 0;
}

input[type="hidden"] {
    display: none; 
}

input[type="text"] {
    border-bottom: 2px solid #e0e0e0;
    background-color: transparent;
}

input[type="text"]:focus {
    border-bottom-color: #27ae60; 
    background-color: #f8f9fa;
}

input[type="submit"] {
    background: #27ae60; 
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background: #219a52;
    box-shadow: 0 2px 8px rgba(39, 174, 96, 0.3);
}


</style>
<h2>Editar Libro</h2>

<?php if (!empty($errores)): ?>
    <ul style="color: red;">
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" onsubmit="return validarFormulario();">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    Título: <input type="text" name="titulo" id="titulo" value="<?= $data['titulo'] ?>"><br>
    Autor: <input type="text" name="autor" id="autor" value="<?= $data['autor'] ?>"><br>
    <input type="submit" value="Actualizar">
</form>

<script>
function validarFormulario() {
    let titulo = document.getElementById("titulo").value.trim();
    let autor = document.getElementById("autor").value.trim();
    if (titulo === "" || autor === "") {
        alert("Todos los campos son obligatorios.");
        return false;
    }
    return true;
}
</script>
