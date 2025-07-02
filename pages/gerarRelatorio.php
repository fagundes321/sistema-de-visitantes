<?php
require_once __DIR__ . '/../routes/rotas.php';
require_once __DIR__ . '/template/navbar.php';

$visitantes = [];
$dataFiltro = $_GET['data'] ?? '';
$erroPesquisa = '';
$dataAtual = null;

// Validação simples
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($dataFiltro)) {
        $erroPesquisa = 'Informe uma data.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM visitantes.dados_visitantes WHERE data_dia = :data ORDER BY hora_entrada DESC");
        $stmt->bindParam(':data', $dataFiltro);
        $stmt->execute();
        $visitantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<body class="gerarRelatorio">
    <div class="relatorio-dashboard">
        <div class="relatorio-card">
            <!-- Título -->
            <h1 class="relatorio-titulo">
                <img src="/public/image/gerarRelatorioBlack.svg" alt="Ícone" class="iconGerarRelatorio">
                Gerar Relatório
            </h1>

            <!-- Formulário de busca -->
            <form action="" method="GET" class="form-pesquisa">
                <div class="grupo-campos">
                    <input
                        type="date"
                        name="data"
                        class="campo-data <?= $erroPesquisa ? 'is-invalid' : '' ?>"
                        value="<?= htmlspecialchars($dataFiltro) ?>" />
                    <button type="submit" class="botao-pesquisa">
                        <i class="fa fa-search"></i> Pesquisar
                    </button>
                </div>

            </form>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['data']) && empty($dataFiltro)): ?>
                <div class="invalid-feedback d-block mt-3 d-flex justify-content-center">
                    <?= $erroPesquisa ?>
                </div>
            <?php endif; ?>



            <!-- Resultados -->
            <div class="historico-table-wrapper mt-4">
                <?php if ($dataFiltro && empty($visitantes)): ?>
                    <h4 class="text-center text-muted">Não há registros para <?= date('d/m/Y', strtotime($dataFiltro)) ?>.</h4>
                <?php elseif (!empty($visitantes)): ?>
                    <?php foreach ($visitantes as $dados): ?>
                        <?php
                        $dataFormatada = date('d/m/Y', strtotime($dados['data_dia']));
                        if ($dataAtual !== $dataFormatada):
                            if ($dataAtual !== null) {
                                echo "</tbody></table><br>";
                            }
                            $dataAtual = $dataFormatada;
                        ?>
                            <h5 class="data-titulo mt-4"><?= $dataAtual ?></h5>
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
                                </tbody>
                            </table>

                            <!-- Botão PDF -->
                            <form
                                action="/actions/pdf/gerarPdf.php?data=<?= urlencode($dataFiltro) ?>"
                                target="_blank"
                                method="POST"
                                class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Gerar PDF</button>
                            </form>
                        <?php endif; ?>
            </div>
        </div>
    </div>
</body>