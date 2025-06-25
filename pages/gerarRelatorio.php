<?php
require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../routes/rotas.php');

$visitantes = [];

$dataFiltro = isset($_GET['data']) ? $_GET['data'] : null;

if ($dataFiltro) {
    // nessa condicional filtra pela data desejada
    $stmt = $pdo->prepare("SELECT * FROM visitantes.dados_visitantes WHERE data_dia = :data ORDER BY hora_entrada DESC");
    $stmt->bindParam(':data', $dataFiltro);
    $stmt->execute();
    $visitantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


$hoje = date('d/m/Y');
$dataAtual = null;

?>

<body class="gerarRelatorio">
    <div class="relatorio-dashboard">
        <div class="relatorio-card">
            <h1 class="relatorio-titulo"><i class="fa-solid fa-file-invoice"></i> Gerar Relatório</h1>

            <form action="" method="GET" class="form-pesquisa">
                <div class="grupo-campos">
                    <!-- <input type="search" name="buscar" placeholder="Buscar visitante..." class="campo-texto" /> -->

                    <input type="date" name="data" class="campo-data" value="<?= isset($_GET['data']) ? $_GET['data'] : '' ?>" />


                    <button type="submit" class="botao-pesquisa">
                        <i class="fa fa-search"></i> Pesquisar
                    </button>
                </div>
            </form>
            <div class="historico-table-wrapper">
                <table class="historico-tabela">
                    <?php foreach ($visitantes as $dados):
                        $dataFormatada = date('d/m/Y', strtotime($dados['data_dia']));

                        if ($dataAtual !== $dataFormatada):
                            if ($dataAtual !== null) {
                                echo "</tbody></table><br>";
                            }
                            $dataAtual = $dataFormatada;
                    ?>
                            <h3 class="data-titulo"><?= $dataAtual ?></h3>
                            <br>
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
                                    <td class="historico-oculto"><?= date('d/m/Y', strtotime($dados['data_dia'])) ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if ($dataAtual !== null): ?>
                                </tbody>
                            </table>
                            <br>
                                <form action="/actions/pdf/gerarPdf.php?data=<?= $dataFiltro ?>" target="_blank" method="POST">
                                    


                                    <div class="">
                                        <button type="submit" class="btn btn-success">Gerar PDF</button>
                                    </div>

                                </form>
                           
                        <?php endif; ?>
            </div>
        </div>
    </div>
</body>