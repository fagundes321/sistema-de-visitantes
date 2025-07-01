<?php 
require_once __DIR__ . ('/../routes/rotas.php');


// Inicializa variáveis de erro para cada campo do formulário
$erroRG = '';
$erroNome = '';
$erroDestino = '';
$erroResponsavel = '';

// Pega os valores enviados via POST, ou atribui string vazia se não enviados ainda
$rg = $_POST['rg'] ?? '';
$nome = $_POST['nome'] ?? '';
$destino = $_POST['destino'] ?? '';
$responsavel = $_POST['responsavel'] ?? '';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica se os campos estão vazios e atribui mensagens de erro
    if (empty($rg)) $erroRG = 'Informe o RG';
    if (empty($nome)) $erroNome = 'Informe o nome';
    if (empty($destino)) $erroDestino = 'Informe o destino';
    if (empty($responsavel)) $erroResponsavel = 'Informe o responsável';

    // Se nenhum erro foi encontrado nos campos
    if (!$erroRG && !$erroNome && !$erroDestino && !$erroResponsavel) {


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

            header('location: /pages/visitantes.php'); 
        //    exit;
        }
    }
}


