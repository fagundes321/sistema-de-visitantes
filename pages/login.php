<?php
require_once __DIR__ . '/../routes/rotas.php';

session_start();

$erroUsuario = '';
$erroSenha = '';
$erroLogin = '';

$usuario = '';
$senha = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($usuario)) {
        $erroUsuario = "Preencha com seu usuário";
    }

    if (empty($senha)) {
        $erroSenha = "Preencha sua senha";
    }

    if (empty($erroUsuario) && empty($erroSenha)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
            $stmt->execute([
                ':usuario' => $usuario,
                ':senha' => $senha
            ]);

            if ($stmt->rowCount() === 1) {
                $dadosUsuario = $stmt->fetch();

                $_SESSION['id'] = $dadosUsuario['id'];
                $_SESSION['nome'] = $dadosUsuario['nome'];

                header("Location: pages/home.php");
                exit();
            } else {
                $erroLogin = "Usuário ou senha incorretos";
            }
        } catch (PDOException $e) {
            $erroLogin = "Erro na consulta: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/public/image/icon.svg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <title>Visitantes</title>
</head>

<body>
    <div class="login-container">
        <div class="text-center mb-3">

            <img class="aumentar-icone" src="/public/image/icon.svg" alt="">
            <h2 class="mt-3">Acesse sua conta</h2>
        </div>

        <!-- Alertas -->
        <?php if (!empty($erroLogin)): ?>
            <div class="alert alert-danger text-center"><?= $erroLogin ?></div>
        <?php elseif (!empty($erroUsuario)): ?>
            <div class="alert alert-danger text-center"><?= $erroUsuario ?></div>
        <?php elseif (!empty($erroSenha)): ?>
            <div class="alert alert-danger text-center"><?= $erroSenha ?></div>
        <?php endif; ?>

        <form action="" method="post" class="mt-3">

            <!-- Campo Usuário -->
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text"
                        class="form-control <?= !empty($erroUsuario) ? 'is-invalid' : '' ?>"
                        id="floatingInput"
                        name="usuario"
                        value="<?= htmlspecialchars($usuario) ?>"
                        placeholder=" " />
                    <label for="floatingInput">Usuário</label>
                </div>
            </div>

            <!-- Campo Senha -->
            <div class="mb-4">
                <div class="form-floating">
                    <input type="password"
                        class="form-control <?= !empty($erroSenha) ? 'is-invalid' : '' ?>"
                        id="floatingPassword"
                        name="senha"
                        placeholder=" " />
                    <label for="floatingPassword">Senha</label>
                </div>
            </div>

            <!-- Botão -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </div>
</body>

</html>