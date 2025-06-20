<?php
// navbar
require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../routes/rotas.php');

$visitantes = [];

$sql = $pdo->query("SELECT * FROM visitantes.dados_visitantes");

// verificação se o numero de linhas é maior que 0, para ver se tem algum dado

if ($sql->rowCount() > 0) {
    $visitantes = $sql->fetchALL(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Visitantes</title>
</head>

<body class="visitantes">
    <div class="container-dashboard">
        <div class="card-tabela">
            <h2 class="titulo-pagina">📋 Lista de Visitantes</h2>

            <div class="botoes-acao">
                <a href="registrarVisitantes.php" class="botao-registrar">➕ Registrar Visitante</a>
                <a href="gerar_relatorio.php" class="botao-relatorio">📄 Gerar Relatório</a>
            </div>

            <div class="table-responsive">
                <table class="tabela-visitantes">
                    <thead>
                        <tr>
                           
                            <th class="col-hide">RG</th>
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
                            <tr class="lista_dados">
                                <td class="col-hide"><?= $dados['rg'] ?></td>
                                <td><?= $dados['nome'] ?></td>
                                <td><?= $dados['destino'] ?></td>
                                <td><?= $dados['responsavel'] ?></td>
                                <td><?= date('H:i', strtotime($dados['hora_entrada'])) ?></td>
                                <td>
                                    <?php
                                    if ($dados['hora_saida']) {
                                        echo date('H:i', strtotime($dados['hora_saida']));
                                    } else {
                                        echo '-'; // caso hora_saida esteja vazia
                                    }
                                    ?>
                                </td>
                                <td class="col-hide"><?= date('d/m', strtotime($dados['data_dia'])) ?></td>
                                <td class="acoes">
                                     <a class="exit" href="#">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                    <!-- <a class="update" href="">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    </a> -->
                                    
                                    <a class="delete" href="/actions/delete.php?id=<?= $dados['id']?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                   
                                    
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once __DIR__ . ('/template/footer.php'); ?>
</body>

</html>