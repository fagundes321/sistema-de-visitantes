<?php
require_once __DIR__ . ('/template/navbar.php');

?>

<body class="home">
  
  <div class="painel-container">
    <h1>👋 Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
    <p>Você está logado no <strong>Sistema de Visitantes</strong>.</p>
    
    <div class="botoes-painel">
      <a href="visitantes.php" class="entrarcadastro">
        <img src="/public/image/registrarVisitantes.svg" class="iconRegistrarVisitantes"> Acessar Visitantes
      </a>
      <a href="gerarRelatorio.php" class="botao-relatorio"><img src="/public/image/gerarRelatorio.svg" class="iconGerarRelatorioHome" alt=""> Gerar Relatório</a>
      <a href="historico.php" class="botao-historico"><img src="/public/image/historico.svg" alt="" class="iconHistorico"> Histórico</a>
      <a href="/config/protect/logout.php" class="sairsistema">
        <img src="/public/image/sairDoSistema.svg" alt="" class="iconSairDoSistema">Sair do Sistema
      </a>
    </div>
    
    <?php // require_once __DIR__ . ('/template/footer.php'); ?>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qRBjS+x4RoDAUYe6bZt3AAlh1c9xvQdn1XrY+S7VoFqCE6msXW/7hw+2ZjH4LoSe"
    crossorigin="anonymous"></script>
</body>

</html>