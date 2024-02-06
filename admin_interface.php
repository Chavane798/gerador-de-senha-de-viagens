<?php
session_start();

// Verificar se o administrador está logado
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

// Conectar ao banco de dados (substitua as credenciais com as suas)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luiz";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para selecionar todas as reservas
$sql = "SELECT * FROM reservas";
$result = $conn->query($sql);

$reservas = array(); // Array para armazenar os resultados da consulta

if ($result->num_rows > 0) {
    // Armazenar os resultados da consulta em um array
    while ($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }
} else {
    echo "Não há reservas cadastradas.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Interface Administrativa - Reservas</title>
</head>
<body>
    <h2>Reservas</h2>
    <div class="tabela">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Destino</th>
            <th>Origem</th>
            <th>Data e Hora</th>
            <th>Nome do Passageiro</th>
            <th>Assento</th>
        </tr>
        <?php foreach ($reservas as $reserva): ?>
        <tr>
            <td><?php echo $reserva["id"]; ?></td>
            <td><?php echo $reserva["destino"]; ?></td>
            <td><?php echo $reserva["origem"]; ?></td>
            <td><?php echo $reserva["data_time"]; ?></td>
            <td><?php echo $reserva["nome_passageiro"]; ?></td>
            <td><?php echo $reserva["assento"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
