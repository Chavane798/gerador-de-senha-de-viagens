<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
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

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida e filtra os dados do formulário
    $destino = isset($_POST["destino"]) ? $_POST["destino"] : '';
    $origem = isset($_POST["origem"]) ? $_POST["origem"] : '';
    $data_time = isset($_POST["data_time"]) ? $_POST["data_time"] : '';
    $nome_passageiro = isset($_POST["nome_passageiro"]) ? $_POST["nome_passageiro"] : '';
    $assento = isset($_POST["assento"]) ? $_POST["assento"] : '';

    // Verificar se já existe uma reserva com o mesmo assento, origem e destino
    $sql_check = "SELECT * FROM reservas WHERE origem = '$origem' AND destino = '$destino' AND assento = '$assento'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        echo "Já existe uma reserva com o mesmo assento para esta origem e destino.";
    } else {
        // Preparar e executar a declaração SQL para inserir os dados na tabela de reservas
        $sql = "INSERT INTO reservas (destino, origem, data_time, nome_passageiro, assento)
        VALUES ('$destino', '$origem', '$data_time', '$nome_passageiro', '$assento')";

        if ($conn->query($sql) === TRUE) {
            echo "Reserva cadastrada com sucesso.";
        } else {
            echo "Erro ao cadastrar reserva: " . $conn->error;
        }
    }

    // Texto para codificar no QR code
    $texto_qr = "Destino: $destino\nOrigem: $origem\nData e Hora: $data_time\nNome do Passageiro: $nome_passageiro\nAssento: $assento";

    // Gerar o QR Code
    include "phpqrcode/qrlib.php";
    QRcode::png($texto_qr, 'qrcode.png', 'L', 3);

    // Conteúdo HTML para exibição na tela
    echo "<h1>Detalhes da Reserva:</h1>";
    echo "<p><strong>Destino:</strong> $destino</p>";
    echo "<p><strong>Origem:</strong> $origem</p>";
    echo "<p><strong>Data e Hora:</strong> $data_time</p>";
    echo "<p><strong>Nome do Passageiro:</strong> $nome_passageiro</p>";
    echo "<p><strong>Assento:</strong> $assento</p>";
    echo "<img src='qrcode.png' alt='QR Code'>";
}
?>

    <br>
    <a href="javascript:history.go(-1)">Voltar</a>
</body>
</html>
