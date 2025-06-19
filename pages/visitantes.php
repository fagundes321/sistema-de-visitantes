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

?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visitantes</title>
</head>
<body class="visitantes">

    <div class="div-mae">


        <!-- Tabela de Visitantes -->
        <div class="container-dashboard">
    <h2 class="titulo-pagina">📋 Lista de Visitantes</h2>

    <div class="botoes-acao">
        <form action="registrar_visitante.php" method="GET">
            <button type="submit" class="botao-registrar">➕ Registrar Visitante</button>
        </form>

        <form action="gerar_relatorio.php" method="POST">
            <button type="submit" class="botao-relatorio">📄 Gerar Relatório</button>
        </form>
    </div>

    <div class="card-tabela">
        <table class="tabela-visitantes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RG</th>
                    <th>Visitante</th>
                    <th>Destino</th>
                    <th>Responsável</th>
                    <th>Hora Entrada</th>
                    <th>Hora Saída</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitantes as $dados): ?>
                    <tr>
                        <td><?= $dados['id'] ?></td>
                        <td><?= $dados['rg'] ?></td>
                        <td><?= $dados['nome'] ?></td>
                        <td><?= $dados['destino']?></td>
                        <td><?= $dados['responsavel'] ?></td>
                        <td><?= $dados['hora_entrada'] ?></td>
                        <td><?= $dados['hora_saida'] ?></td>
                        <td><?= $dados['data'] ?></td>
                    </tr>
                <?php endforeach ?>
                <!-- outros visitantes... -->
            </tbody>
        </table>
    </div>
</div>
    </div>

<?php
// footer
require_once __DIR__ . ('/template/footer.php');
?>

</body>
</html>
