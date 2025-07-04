<?php
require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../routes/rotas.php');

$visitantes = [];

$sql = $pdo->query("SELECT * FROM visitantes.dados_visitantes ORDER BY data_dia DESC, hora_entrada DESC");

if ($sql->rowCount() > 0) {
    $visitantes = $sql->fetchALL(PDO::FETCH_ASSOC);
}

$hoje = date('d/m/Y');
$dataAtual = null;
?>

<body class="historico">
    <div class="historico-container">
        <div class="historico-card">
            <h2 class="historico-titulo"><img src="/public/image/historicoTitulo.svg" alt="" class="historicoTitulo "> Histórico</h2>

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
                            <table class="historico-tabela">
                                <thead>
                                    <tr>
                                        <th class="historico-oculto">CPF</th>
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
                                    <td class="historico-oculto"><?= formatCnpjCpf($dados['cpf']) ?></td>
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
                        <?php endif; ?>
            </div>
        </div>
    </div>

    <?php // require_once __DIR__ . ('/template/footer.php'); 
    ?>
</body>