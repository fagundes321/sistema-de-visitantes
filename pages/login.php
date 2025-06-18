<?php
require_once __DIR__ . '/../routes/rotas.php';
// require_once __DIR__ . '/../error/loginError.php';

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    if (strlen($_POST['usuario']) == 0) {
        echo "Preencha seu e-mail";
    } elseif (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        // Conexão MySQLi
        $mysqli = new mysqli('mysql-db', 'root', '123', 'visitantes');

        if ($mysqli->connect_error) {
            die("Erro de conexão: " . $mysqli->connect_error);
        }

        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows === 1) {
            $usuario = $sql_query->fetch_assoc();

            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: pages/home.php");
            exit();
        } else {
            echo "<p class='erro-login'>Falha ao logar! E-mail ou senha incorretos</p>";
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
                    <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>