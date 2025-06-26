<?php 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../routes/rotas.php';
require_once __DIR__ . '/gerarPdf.php';

$visitantes = [];

if ($dataFiltro) {
    // nessa condicional filtra pela data desejada
    $stmt = $pdo->prepare("SELECT * FROM visitantes.dados_visitantes WHERE data_dia = :data ORDER BY hora_entrada DESC");
    $stmt->bindParam(':data', $dataFiltro);
    $stmt->execute();
    $visitantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- <title>Relatório de Visitantes</title> -->
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .info-geral {
            margin-bottom: 10px;
            text-align: right;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #444;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .data-grupo {
            margin-top: 25px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Relatório de Visitantes</h1>
    
    <div class="info-geral">
        Gerado em: <?= date('d/m/Y H:i') ?>
    </div>
    
    <?php if (!empty($visitantes)): ?>
    <div class="data-grupo">
        Data: <?= date('d/m/Y', strtotime($visitantes[0]['data_dia'])) ?>
    </div>
<?php endif; ?>

    
    <table>
        <thead>
            <tr>
                <th>RG</th>
                <th>Nome</th>
                <th>Destino</th>
                <th>Responsável</th>
                <th>Entrada</th>
                <th>Saída</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitantes as $dados):?>
            <tr>
                <td><?= $dados['rg'] ?></td>
                <td><?= $dados['nome'] ?></td>
                <td><?= $dados['destino'] ?></td>
                <td><?= $dados['responsavel'] ?></td>
                <td><?= $dados['hora_entrada'] ?></td>
                <td><?= $dados['hora_saida'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
