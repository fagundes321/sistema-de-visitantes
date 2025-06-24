<?php
require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../routes/rotas.php');
require_once __DIR__ . ('/../vendor/autoload.php');

use Dompdf\Dompdf;

// Instância do Dompdf
$dompdf = new Dompdf();

// Carrega o HTML que será renderizado no PDF
$dompdf->loadHtml('<h1>teste - GERAR PDF</h1>');

// Define o tamanho do papel e orientação
$dompdf->setPaper('A4', 'landscape');

// Renderiza o HTML como PDF
$dompdf->render();

// Envia o PDF para o navegador (como download)
$dompdf->stream('arquivo.pdf', [
    'Attachment' => true // true = download / false = abrir no navegador
    ]);
?>
<!-- 
<body class="gerarRelatorio">
    <div class="relatorio-dashboard">
        <div class="relatorio-card">
            <h1 class="relatorio-titulo"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</h1>

            <form action="" method="GET" class="form-pesquisa">
                <div class="grupo-campos"> -->
                    <!-- <input type="search" name="buscar" placeholder="Buscar visitante..." class="campo-texto" /> -->

                    <!-- <input type="date" name="data" class="campo-data" />

                    <button type="submit" class="botao-pesquisa">
                        <i class="fa fa-search"></i> Pesquisar
                    </button>
                </div>
            </form>

        </div>
    </div>
</body> -->