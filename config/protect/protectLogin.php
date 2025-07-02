<?php


if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    $erro403 = require_once __DIR__ . '/mensagemDeErro.php';
    die($erro403);
}
