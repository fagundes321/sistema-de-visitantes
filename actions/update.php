<?php 
require_once __DIR__ . '/../routes/rotas.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
date_default_timezone_set('America/Sao_Paulo');
$hora_saida = date('H:i');
$saida = 1;

if ($id) {
    $sql = $pdo->prepare("UPDATE visitantes.dados_visitantes SET hora_saida = :hora_saida, saida = :saida WHERE id = :id");
    $sql->bindValue(':hora_saida', $hora_saida);
    $sql->bindValue(':saida', $saida);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('Location: /../pages/visitantes.php');
    exit;
}



// <?php 
// require_once __DIR__ . ('/../routes/rotas.php');
// require_once __DIR__ . ('/../pages/registrarVisitantes.php');


// $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
// $hora_saida = date('H:i');
// $saida = 1;

// if ($id) {
//     $sql = $pdo->prepare("INSERT INTO visitantes.dados_visitantes (hora_saida, saida) VALUES (:hora_saida, :saida) WHERE id = :id");
//     $sql->bindValue(':hora_saida', $hora_saida);
//     $sql->bindValue(':saida', $saida);
//     $sql->bindValue(':id', $id);
//     $sql->execute();

//     // header('Location: /../pages/visitantes.php');
//     exit;

// }


?>
