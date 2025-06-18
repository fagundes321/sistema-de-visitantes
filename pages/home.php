<?php
require_once __DIR__ . ('/template/navbar.php')
?>
  
  <div class="painel-container">
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
    <p>Você está logado no sistema de visitantes.</p>
	<a href="visitantes.php" class="entrarcadastro">Visitantes</a>
    <a href="logout.php" class="sairsistema">Sair do sistema</a>
    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qRBjS+x4RoDAUYe6bZt3AAlh1c9xvQdn1XrY+S7VoFqCE6msXW/7hw+2ZjH4LoSe"
    crossorigin="anonymous"></script>
</body>

</html>
