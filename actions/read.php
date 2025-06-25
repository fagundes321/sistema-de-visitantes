<?php 
require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../routes/rotas.php');

$visitantes = [];

$sql = $pdo->query("SELECT * FROM visitantes.dados_visitantes ORDER BY data_dia DESC, hora_entrada DESC, WHERE ");

if ($sql->rowCount() > 0) {
    $visitantes = $sql->fetchALL(PDO::FETCH_ASSOC);
}

$hoje = date('d/m/Y');
$dataAtual = null;