<?php
// require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../../routes/rotas.php');
require_once __DIR__ . ('/../../vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

$dataFiltro = $_GET['data'];



ob_start(); // Inicia o buffer de saída
require __DIR__ . ('/pdf.php'); // Gera o conteúdo HTML
$teste = ob_get_clean(); // Pega o conteúdo e limpa o buffer

use Dompdf\Dompdf;

// Instância do Dompdf
$dompdf = new Dompdf();

// Carrega o HTML que será renderizado no PDF
$dompdf->loadHtml($teste);

// Define o tamanho do papel e orientação
$dompdf->setPaper('A4');

// Renderiza o HTML como PDF
$dompdf->render();

// Envia o PDF para o navegador (como download)
$dompdf->stream('arquivo.pdf', [
    'Attachment' => false // true = download / false = abrir no navegador
    ]);
?>
