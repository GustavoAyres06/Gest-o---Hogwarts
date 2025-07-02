<?php
require_once '../config/db.php';
require_once '../classes/Professor.php';

session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    http_response_code(403);
    exit('Acesso negado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario_id'])) {
    $usuarioId = (int) $_POST['usuario_id'];

    $professor = new Professor($pdo);
    if ($professor->criar($usuarioId)) {
        echo 'Professor cadastrado com sucesso.';
    } else {
        http_response_code(500);
        echo 'Erro ao cadastrar professor.';
    }
} else {
    http_response_code(400);
    echo 'Requisição inválida.';
}
