<?php
// navbar
require_once __DIR__ . '/template/navbar.php';
require_once __DIR__ . '/../routes/rotas.php';
require_once __DIR__ . '/../actions/formatCpf.php';

$visitantes = [];

$sql = $pdo->query("SELECT * FROM visitantes.dados_visitantes ORDER BY data_dia DESC, hora_entrada DESC");

if ($sql->rowCount() > 0) {
    $visitantes = $sql->fetchAll(PDO::FETCH_ASSOC);
}

$hoje = date('d/m/Y');
?>

<body class="visitantes">
    <div class="container-dashboard">
        <div class="card-tabela">
            <h2 class="titulo-pagina">📋 Lista de Visitantes</h2>

            <div class="botoes-acao">
                <a href="registrarVisitantes.php" class="botao-registrar">➕ Registrar Visitante</a>
            </div>

            <div class="table-responsive">
                <table class="tabela-visitantes">
                    <thead>
                        <tr>
                            <th class="col-hide">Cpf</th>
                            <th>Visitante</th>
                            <th>Destino</th>
                            <th>Responsável</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th class="col-hide">Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($visitantes as $dados): ?>
                            <?php if (date('d/m/Y', strtotime($dados['data_dia'])) == $hoje): ?>
                                <tr class="lista_dados">
                                    <td class="col-hide"><?= formatCnpjCpf($dados['cpf']) ?></td>
                                    <td><?= $dados['nome'] ?></td>
                                    <td><?= $dados['destino'] ?></td>
                                    <td><?= $dados['responsavel'] ?></td>
                                    <td><?= date('H:i', strtotime($dados['hora_entrada'])) ?></td>
                                    <td>
                                        <?= $dados['hora_saida']
                                            ? date('H:i', strtotime($dados['hora_saida']))
                                            : '-' ?>
                                    </td>
                                    <td class="col-hide"><?= date('d/m', strtotime($dados['data_dia'])) ?></td>
                                    <td class="acoes">
                                        <?php if ($dados['saida'] == 0): ?>
                                            <a class="exit" href="/actions/update.php?id=<?= $dados['id'] ?>">
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                            </a>
                                            <a class="delete" href="/actions/delete.php?id=<?= $dados['id'] ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php // require_once __DIR__ . '/template/footer.php'; 
    ?>
</body>

</html>