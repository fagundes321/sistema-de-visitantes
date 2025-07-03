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


// Lógica de envio do formulário
// No início do POST, já limpa e formata o CPF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Remove tudo que não for número do cpf
    // $cpf = preg_replace('/\D/', '', $cpf);
    // Formata o CPF com pontos e traço
    // $cpfFormatado = formatCpf($cpf);
    
    if (empty($cpf)) {
        $erroCpf = 'Informe o CPF';
    } elseif (!ctype_digit($cpf)) {
        $erroCpf = 'Informe um valor numérico';
    } elseif (strlen($cpf) !== 11) {  // CPF tem 11 dígitos
        $erroCpf = 'O CPF deve ter 11 dígitos';
    } else {
        $erroCpf = '';
    }
    
    $cpfFormatado1 = substr($cpf, 0, 3);
    $cpfFormatado2 = substr($cpf, 3, 3);
    $cpfFormatado3 = substr($cpf, 6, 3);
    $cpfFormatado4 = substr($cpf, 9, 2);
    $cpfFinal = $cpfFormatado1 . "." . $cpfFormatado2 . "." . $cpfFormatado3 . "-" . $cpfFormatado4;
  

    // O resto da validação continua igual
    if (empty($nome)) $erroNome = 'Informe o nome';
    if (empty($destino)) $erroDestino = 'Informe o destino';
    if (empty($responsavel)) $erroResponsavel = 'Informe o responsável';

    if (!$erroCpf && !$erroNome && !$erroDestino && !$erroResponsavel) {
        // Na hora de inserir, passe o CPF formatado, se preferir assim
        // Ou passe o número limpo $cpf sem formatação — depende do seu banco e uso
        // Aqui vou passar o formatado para salvar com máscara
        
        inserirdado($pdo);
   
        header('Location: /pages/visitantes.php');
        exit;
    }
   
}

