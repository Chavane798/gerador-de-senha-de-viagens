<?php
// Inclua a biblioteca Dompdf
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida e filtra os dados do formulário
    $destino = isset($_POST["destino"]) ? $_POST["destino"] : '';
    $origem = isset($_POST["origem"]) ? $_POST["origem"] : '';
    $data_time = isset($_POST["data_time"]) ? $_POST["data_time"] : '';
    $nome_passageiro = isset($_POST["nome_passageiro"]) ? $_POST["nome_passageiro"] : '';
    $assento = isset($_POST["assento"]) ? $_POST["assento"] : '';

    // Crie o conteúdo HTML para o PDF
    $html = "
    <h1>Detalhes da Reserva:</h1>
    <p><strong>Destino:</strong> $destino</p>
    <p><strong>Origem:</strong> $origem</p>
    <p><strong>Data e Hora:</strong> $data_time</p>
    <p><strong>Nome do Passageiro:</strong> $nome_passageiro</p>
    <p><strong>Assento:</strong> $assento</p>";

    // Inicialize o Dompdf
    $dompdf = new Dompdf();

    // Carregue o conteúdo HTML no Dompdf
    $dompdf->loadHtml($html);

    // Renderize o PDF
    $dompdf->render();

    // Defina o nome do arquivo PDF gerado
    $filename = "reserva.pdf";

    // Envie o PDF para o navegador para download
    $dompdf->stream($filename, array("Attachment" => false));
    exit;
} else {
    echo "Erro: Não foi possível processar os dados do formulário.";
}
?>
