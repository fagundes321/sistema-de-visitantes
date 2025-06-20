<?php 
require_once __DIR__ . ('/../routes/rotas.php');
require_once __DIR__ . ('/../pages/registrarVisitantes.php');

$rg = filter_input(INPUT_POST, 'rg');
$nome = filter_input(INPUT_POST, 'nome');
$destino = filter_input(INPUT_POST, 'destino');
$responsavel = filter_input(INPUT_POST, 'responsavel');
date_default_timezone_set('America/Sao_Paulo');
$hora_entrada = date('H:i');
$data_dia = date('Y-m-d');

if ($rg && $nome && $destino && $responsavel) {
    $sql = $pdo->prepare("INSERT INTO visitantes.dados_visitantes (rg, nome, destino, responsavel, hora_entrada, data_dia) VALUES (:rg, :nome, :destino, :responsavel, :hora_entrada, :data_dia)");
    $sql -> bindValue(':rg', $rg);
    $sql -> bindValue(':nome', $nome);
    $sql -> bindValue(':destino', $destino);
    $sql -> bindValue(':responsavel', $responsavel);
    $sql -> bindValue(':hora_entrada', $hora_entrada);
    $sql -> bindValue(':data_dia', $data_dia);
    $sql -> execute();

    // header('location: /../pages/registrarVisitantes.php');
    exit;

}
