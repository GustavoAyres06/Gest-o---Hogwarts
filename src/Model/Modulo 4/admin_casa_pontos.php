<?php
require_once '../config/db.php';
require_once '../classes/Casa.php';

session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    http_response_code(403);
    exit('Acesso negado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['casa_id'], $_POST['pontos'])) {

    $casaId = (int) $_POST['casa_id'];
    $pontos = (int) $_POST['pontos'];

    $casa = new Casa($pdo);
    if ($casa->atualizarPontos($casaId, $pontos)) {
        echo 'Pontuação ajustada.';
    } else {
        http_response_code(500);
        echo 'Erro ao atualizar pontos.';
    }
} else {
    http_response_code(400);
    echo 'Requisição inválida.';
}
