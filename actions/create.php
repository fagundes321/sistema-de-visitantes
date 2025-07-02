<?php
require_once __DIR__ . '/../routes/rotas.php';

// Inicializa variáveis de erro
$erroRG = '';
$erroNome = '';
$erroDestino = '';
$erroResponsavel = '';

// Inicializa os valores do formulário
$rg = $_POST['rg'] ?? '';
$nome = $_POST['nome'] ?? '';
$destino = $_POST['destino'] ?? '';
$responsavel = $_POST['responsavel'] ?? '';

function inserirdado($pdo)
{
    $rg = filter_input(INPUT_POST, 'rg');
    $nome = filter_input(INPUT_POST, 'nome');
    $destino = filter_input(INPUT_POST, 'destino');
    $responsavel = filter_input(INPUT_POST, 'responsavel');

    date_default_timezone_set('America/Sao_Paulo');
    $hora_entrada = date('H:i');
    $data_dia = date('Y-m-d');

    $sql = $pdo->prepare("INSERT INTO visitantes.dados_visitantes 
        (rg, nome, destino, responsavel, hora_entrada, data_dia) 
        VALUES (:rg, :nome, :destino, :responsavel, :hora_entrada, :data_dia)");

    $sql->bindValue(':rg', $rg);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':destino', $destino);
    $sql->bindValue(':responsavel', $responsavel);
    $sql->bindValue(':hora_entrada', $hora_entrada);
    $sql->bindValue(':data_dia', $data_dia);
    $sql->execute();
}

// Lógica de envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação
    if (empty($rg)) {
        $erroRG = 'Informe o RG';
    } elseif (!ctype_digit($rg)) {
        $erroRG = 'Informe um valor numérico';
    } elseif (strlen(trim($rg)) < 10) {
        $erroRG = 'O RG deve ter pelo menos 10 dígitos';
    } elseif (strlen(trim($rg)) > 10) {
        $erroRG = 'O RG deve ter  10 dígitos';
    } else {
        $erroRG = '';
    }



    if (empty($nome)) $erroNome = 'Informe o nome';
    if (empty($destino)) $erroDestino = 'Informe o destino';
    if (empty($responsavel)) $erroResponsavel = 'Informe o responsável';

    // Se não houver erros, insere no banco e redireciona
    if (!$erroRG && !$erroNome && !$erroDestino && !$erroResponsavel) {
        inserirdado($pdo);
        header('Location: /pages/visitantes.php'); // redireciona só se estiver tudo certo
        exit; // é importante o exit aqui
    }


    // Se houver erro, não redireciona — o formulário exibirá os erros
}
