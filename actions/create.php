<?php
require_once __DIR__ . '/../routes/rotas.php';

// Inicializa variáveis de erro
$erroCpf = '';
$erroNome = '';
$erroDestino = '';
$erroResponsavel = '';

// Inicializa os valores do formulário
$cpf = $_POST['cpf'] ?? '';
$nome = $_POST['nome'] ?? '';
$destino = $_POST['destino'] ?? '';
$responsavel = $_POST['responsavel'] ?? '';



function inserirdado($pdo)
{
    $cpf = filter_input(INPUT_POST, 'cpf');
    $nome = filter_input(INPUT_POST, 'nome');
    $destino = filter_input(INPUT_POST, 'destino');
    $responsavel = filter_input(INPUT_POST, 'responsavel');

    date_default_timezone_set('America/Sao_Paulo');
    $hora_entrada = date('H:i');
    $data_dia = date('Y-m-d');

    $sql = $pdo->prepare("INSERT INTO visitantes.dados_visitantes 
        (cpf, nome, destino, responsavel, hora_entrada, data_dia) 
        VALUES (:cpf, :nome, :destino, :responsavel, :hora_entrada, :data_dia)");

    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':destino', $destino);
    $sql->bindValue(':responsavel', $responsavel);
    $sql->bindValue(':hora_entrada', $hora_entrada);
    $sql->bindValue(':data_dia', $data_dia);
    $sql->execute();
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($cpf)) {
        $erroCpf = 'Informe o CPF';
    } elseif (!ctype_digit($cpf)) {
        $erroCpf = 'Informe um valor numérico';
    } elseif (strlen($cpf) !== 11) {

        // condicional caso precisar cadastrar cnpj   
        // } elseif (strlen($cpf) !== 11 && strlen($cpf) !== 14) {

        $erroCpf = 'O CPF deve ter 11 dígitos';
    } else {
        $erroCpf = '';
    }


    if (empty($nome)) {
        $erroNome = 'Informe o nome';
    } elseif (!preg_match("/^[\p{L}\s]+$/u", $nome)) {
        $erroNome = 'O nome deve conter apenas letras';
    }

    if (empty($destino)) {
        $erroDestino = 'Informe o destino';
    } elseif (!preg_match("/^[\p{L}\s]+$/u", $destino)) {
        $erroDestino = 'O destino deve conter apenas letras';
    }

    if (empty($responsavel)) {
        $erroResponsavel = 'Informe o responsável';
    } elseif (!preg_match("/^[\p{L}\s]+$/u", $responsavel)) {
        $erroResponsavel = 'O responsável deve conter apenas letras';
    }

    if (!$erroCpf && !$erroNome && !$erroDestino && !$erroResponsavel) {


        inserirdado($pdo);

        header('Location: /pages/visitantes.php');
        exit;
    }
}
