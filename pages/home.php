<?php 
// require_once __DIR__ . ('/../routes/rotas.php');
require_once __DIR__ . ('/../config/protect/protectLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="/public/styles/home.css">
  <title>Painel do Usuário</title>
</head>
<body>
  <div class="painel-container">
    <h1>Bem-vindo ao Painel</h1>
    <p><strong><?= $_SESSION['nome'] ?></strong></p>
    <p>
      <a href="logout.php">Sair</a>
    </p>
  </div>
</body>
</html>
