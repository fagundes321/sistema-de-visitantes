<?php
require_once __DIR__ . ('/../routes/rotas.php');

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $pdo->prepare("DELETE FROM visitantes.dados_visitantes WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('location: /../pages/visitantes.php');
    exit;
}
