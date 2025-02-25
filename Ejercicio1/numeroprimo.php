<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: white;
            padding: 40px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            color: #333;
            text-align: center;
        }
        label {
            font-size: 16px;
            font-weight: bold;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 2px solid #4facfe;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input:focus {
            border-color: #00c3ff;
            box-shadow: 0 0 5px #00c3ff;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4facfe;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #00c3ff;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 195, 255, 0.5);
        }
    </style>
</head>
<body>

    <form method="POST" action="calcularprimos.php">
        <h2>Tabla de Números Primos</h2>
        <label>Ingrese un número:</label>
        <input type="number" name="num" required>
        <button type="submit">Generar</button>
    </form>

</body>
</html>
