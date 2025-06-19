<?php
require_once __DIR__ . '/../routes/rotas.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($usuario)) {
        echo "<p class='erro-login'>Preencha seu e-mail</p>";
    } elseif (empty($senha)) {
        echo "<p class='erro-login'>Preencha sua senha</p>";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
            $stmt->execute([
                ':usuario' => $usuario,
                ':senha' => $senha
            ]);

            if ($stmt->rowCount() === 1) {
                $usuario = $stmt->fetch();

                session_start();
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: pages/home.php");
                exit();
            } else {
                echo "<p class='erro-login'>Falha ao logar! E-mail ou senha incorretos</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='erro-login'>Erro na consulta: " . $e->getMessage() . "</p>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <div class="alinha-vertical">

        <div class="login-container">
            <div class="alinha-icone">
                <i class="aumentar-icone fa-solid fa-users-gear"></i>
            </div>
            <br><br><br>
            <h1>Acesse sua conta</h1>
            <br>
            <form action="" method="post" class="">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" id="usuario" required />

                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required />

                <div class="col-auto">
                    <br>
                    <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>