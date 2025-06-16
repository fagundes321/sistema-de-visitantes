<?php
// Aqui você pode validar POST futuramente, por exemplo
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="../public/styles/login.css">
  <title>Login</title>
</head>
<body>
  <div class="login-container">
    <h1>Acesse sua conta</h1>

    <!-- Mensagem de erro exemplo -->
    <!-- <div class="mensagem-erro">Usuário ou senha inválidos</div> -->

    <form action="autenticar.php" method="post">
      <label for="usuario">Usuário</label>
      <input type="text" name="usuario" id="usuario" required />

      <label for="senha">Senha</label>
      <input type="password" name="senha" id="senha" required />

      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
