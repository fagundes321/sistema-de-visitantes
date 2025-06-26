<?php
// Inclui o arquivo de rotas para definir variáveis como $pdo (conexão com o banco de dados)
require_once __DIR__ . '/../routes/rotas.php';

// Inclui a barra de navegação da interface
require_once __DIR__ . '/template/navbar.php';

// Inicializa variáveis de erro para cada campo do formulário
$erroRG = '';
$erroNome = '';
$erroDestino = '';
$erroResponsavel = '';

// Pega os valores enviados via POST, ou atribui string vazia se não enviados ainda
$rg = $_POST['rg'] ?? '';
$nome = $_POST['nome'] ?? '';
$destino = $_POST['destino'] ?? '';
$responsavel = $_POST['responsavel'] ?? '';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica se os campos estão vazios e atribui mensagens de erro
    if (empty($rg)) $erroRG = 'Informe o RG';
    if (empty($nome)) $erroNome = 'Informe o nome';
    if (empty($destino)) $erroDestino = 'Informe o destino';
    if (empty($responsavel)) $erroResponsavel = 'Informe o responsável';

    // Se nenhum erro foi encontrado nos campos
    if (!$erroRG && !$erroNome && !$erroDestino && !$erroResponsavel) {

        // Redireciona para o arquivo create.php que irá realizar o salvamento no banco de dados
        // (OBS: Aqui não está salvando diretamente, apenas redirecionando)
        header("Location: /actions/create.php");
        exit(); // Encerra a execução para evitar que o restante do script rode após o redirecionamento
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Registrar Visitante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin-top: 100px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .form-container {
            max-width: 700px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 form-container bg-white p-4 rounded shadow">
        <h3 class="mb-4 text-center text-primary">➕ Registrar Visitante</h3>

        <form action="" method="POST">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text"
                        class="form-control form-control-sm <?= !empty($erroRG) ? 'is-invalid' : '' ?>"
                        id="rg" name="rg" value="<?= htmlspecialchars($rg) ?>">
                    <?php if ($erroRG): ?>
                        <div class="invalid-feedback"><?= $erroRG ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text"
                        class="form-control <?= !empty($erroNome) ? 'is-invalid' : '' ?>"
                        id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>">
                    <?php if ($erroNome): ?>
                        <div class="invalid-feedback"><?= $erroNome ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="destino" class="form-label">Destino</label>
                    <input type="text"
                        class="form-control <?= !empty($erroDestino) ? 'is-invalid' : '' ?>"
                        id="destino" name="destino" value="<?= htmlspecialchars($destino) ?>">
                    <?php if ($erroDestino): ?>
                        <div class="invalid-feedback"><?= $erroDestino ?></div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <label for="responsavel" class="form-label">Responsável</label>
                    <input type="text"
                        class="form-control <?= !empty($erroResponsavel) ? 'is-invalid' : '' ?>"
                        id="responsavel" name="responsavel" value="<?= htmlspecialchars($responsavel) ?>">
                    <?php if ($erroResponsavel): ?>
                        <div class="invalid-feedback"><?= $erroResponsavel ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="/pages/visitantes.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>