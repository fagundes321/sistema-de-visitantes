<?php
require_once __DIR__ . ('/../config/protect/protectLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/public/styles/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
	<title>Painel do Usuário</title>
  <style>
 
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
			
		<i class="fa-solid fa-id-card"></i>
		Visitantes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <!-- Centralizado -->
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Recursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Preços</a>
            </li>
          </ul>
          <!-- Alinhado à direita -->
          <ul class="navbar-nav ">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Opções
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Ação</a></li>
                <li><a class="dropdown-item" href="#">Outra ação</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="painel-container">
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
    <p>Você está logado no sistema de visitantes.</p>
	<a href="" class="entrarcadastro">Cadastrar</a>
    <a href="logout.php" class="sairsistema">Sair do sistema</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qRBjS+x4RoDAUYe6bZt3AAlh1c9xvQdn1XrY+S7VoFqCE6msXW/7hw+2ZjH4LoSe"
    crossorigin="anonymous"></script>
</body>

</html>
