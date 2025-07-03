<?php 

function formatCpf($cpf)
{
    $cpf = preg_replace('/\D/', '', $cpf);

    if (strlen($cpf) === 11) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
    }

    return $cpf; // se não for CPF, retorna sem formatação (ou ajuste conforme quiser)
}
