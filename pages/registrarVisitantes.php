<?php 
require_once __DIR__ . ('/../routes/rotas.php');
require_once __DIR__ . ('/template/navbar.php');

?><!DOCTYPE html>
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

    <form action="/actions/create.php" method="POST">
      <div class="row g-3 mb-3">
        <div class="col-md-4">
          <label for="rg" class="form-label">RG</label>
          <input type="text" class="form-control form-control-sm" id="rg" name="rg" required>
        </div>

        <div class="col-md-8">
          <label for="nome" class="form-label">Nome Completo</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <label for="destino" class="form-label">Destino</label>
          <input type="text" class="form-control" id="destino" name="destino" required>
        </div>

        <div class="col-md-6">
          <label for="responsavel" class="form-label">Responsável</label>
          <input type="text" class="form-control" id="responsavel" name="responsavel" required>
        </div>
      </div>


      <div class="text-end">
        <button type="submit" class="btn btn-success">Registrar</button>
      <a href="/pages/visitantes.php" class=" btn btn-danger">Cancelar</a>  
      </div>
      
    </form>
  </div>

</body>
</html>

