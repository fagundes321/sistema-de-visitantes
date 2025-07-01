<?php
require_once __DIR__ . '/../routes/rotas.php';
require_once __DIR__ . '/template/navbar.php';

$visitantes = [];

$dataFiltro = $_GET['data'] ?? null;

// Se a data foi informada, faz a consulta
if ($dataFiltro) {
    $stmt = $pdo->prepare("SELECT * FROM visitantes.dados_visitantes WHERE data_dia = :data ORDER BY hora_entrada DESC");
    $stmt->bindParam(':data', $dataFiltro);
    $stmt->execute();
    $visitantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$erroPesquisa = '';
$pesquisa = $_GET['data'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['data'])) {
    if (empty($pesquisa)) $erroPesquisa = 'Informe a Data';
}

$dataAtual = null;
?>

<body class="gerarRelatorio">
    <div class="relatorio-dashboard">
        <div class="relatorio-card">
            <h1 class="relatorio-titulo">
                <img src="/public/image/gerarRelatorioBlack.svg" alt="" class="iconGerarRelatorio"> Gerar Relatório
            </h1>

            <form action="" method="GET" class="form-pesquisa">
                <div class="grupo-campos">
                    <input type="date" name="data" class="campo-data <?= !empty($erroPesquisa) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($pesquisa) ?>" />
                    <button type="submit" class="botao-pesquisa">
                        <i class="fa fa-search"></i> Pesquisar
                    </button>
                    <?php // if ($erroPesquisa): 
                    ?>
                    <!-- <div class="invalid-feedback"><?= $erroPesquisa ?></div> -->
                    <?php // endif; 
                    ?>
                </div>
            </form>

            <div class="historico-table-wrapper">
                <?php foreach ($visitantes as $dados): ?>
                    <?php
                    $dataFormatada = date('d/m/Y', strtotime($dados['data_dia']));
                    if ($dataAtual !== $dataFormatada):
                        if ($dataAtual !== null) {
                            echo "</tbody></table><br>";
                        }
                        $dataAtual = $dataFormatada;
                    ?>
                        <h3 class="data-titulo mt-4"><?= $dataAtual ?></h3>
                        <table class="historico-tabela">
                            <thead>
                                <tr>
                                    <th class="historico-oculto">RG</th>
                                    <th>Visitante</th>
                                    <th>Destino</th>
                                    <th>Responsável</th>
                                    <th>Entrada</th>
                                    <th>Saída</th>
                                    <th class="historico-oculto">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php endif; ?>

                            <tr class="historico-linha">
                                <td class="historico-oculto"><?= $dados['rg'] ?></td>
                                <td><?= $dados['nome'] ?></td>
                                <td><?= $dados['destino'] ?></td>
                                <td><?= $dados['responsavel'] ?></td>
                                <td><?= date('H:i', strtotime($dados['hora_entrada'])) ?></td>
                                <td><?= $dados['hora_saida'] ? date('H:i', strtotime($dados['hora_saida'])) : '-' ?></td>
                                <td class="historico-oculto"><?= $dataFormatada ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if ($dataAtual !== null): ?>
                            </tbody>
                        </table>

                        <form action="/actions/pdf/gerarPdf.php?data=<?= urlencode($dataFiltro) ?>" target="_blank" method="POST" class="mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Gerar PDF</button>
                        </form>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</body>