<?php
ob_start(); 
require_once __DIR__ . '/../routes/rotas.php';
require_once __DIR__ . '/template/navbar.php';
require_once __DIR__ . '/../actions/create.php'; // usar require_once aqui para garantir que só inclua uma vez

// Os valores e mensagens já virão do create.php após POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     include __DIR__ . '/../actions/create.php';
// }

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
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-12px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container mt-5 form-container bg-white p-4 rounded shadow">
        <h3 class="mb-4 text-center text-primary">➕ Registrar Visitante</h3>
        <form action="" method="POST">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control form-control-sm <?= !empty($erroCpf) ? 'is-invalid' : '' ?>" id="cpf" name="cpf" value="<?= htmlspecialchars($cpf) ?>">
                    <?php if ($erroCpf): ?><div class="invalid-feedback"><?= $erroCpf ?></div><?php endif; ?>
                </div>
                <div class="col-md-8">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control <?= !empty($erroNome) ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>">
                    <?php if ($erroNome): ?><div class="invalid-feedback"><?= $erroNome ?></div><?php endif; ?>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="destino" class="form-label">Destino</label>
                    <input type="text" class="form-control <?= !empty($erroDestino) ? 'is-invalid' : '' ?>" id="destino" name="destino" value="<?= htmlspecialchars($destino) ?>">
                    <?php if ($erroDestino): ?><div class="invalid-feedback"><?= $erroDestino ?></div><?php endif; ?>
                </div>
                <div class="col-md-6">
                    <label for="responsavel" class="form-label">Responsável</label>
                    <input type="text" class="form-control <?= !empty($erroResponsavel) ? 'is-invalid' : '' ?>" id="responsavel" name="responsavel" value="<?= htmlspecialchars($responsavel) ?>">
                    <?php if ($erroResponsavel): ?><div class="invalid-feedback"><?= $erroResponsavel ?></div><?php endif; ?>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="/pages/visitantes.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <?php // require_once __DIR__ . ('/template/footer.php'); ?>
</body>
</html>