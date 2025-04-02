<?php
function numPrimo($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function numposteriores($n, $cantidad = 15) {
    $primos = [];
    $numero = $n + 1; // Comenzamos desde el siguiente número

    while (count($primos) < $cantidad) {
        if (numPrimo($numero)) {
            $primos[] = $numero;
        }
        $numero++;
    }

    return $primos;
}

// Obtener número del usuario
$n = isset($_POST['num']) ? ($_POST['num']) : 0; 
$primos = numposteriores($n);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <tr>
            <th>No</th>
            <?php for ($i = 1; $i <= 15; $i++) echo "<th>$i</th>"; ?>
        </tr>
        <tr>
            <th>Primos</th>
            <?php foreach ($primos as $primo) echo "<td>$primo</td>"; ?>
        </tr>
    </table>
</body>
<style>

    body{
        background: linear-gradient(to right, #4facfe, #00f2fe);
    }
     table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: lightgray;
            font-family: 'Courier New', Courier, monospace;
        }
        td{
            background-color: white;
        }
</style>
</html>