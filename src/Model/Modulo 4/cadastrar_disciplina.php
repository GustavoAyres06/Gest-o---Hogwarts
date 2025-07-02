<?php
require_once '../config/db.php';
require_once '../classes/Disciplina.php';

// Verifica se o usuário está logado e é administrador
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    http_response_code(403);
    echo "Acesso negado.";
    exit;
}

// Verifica se o nome da disciplina foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $nome = trim($_POST['nome']);

    if (empty($nome)) {
        echo "Nome da disciplina não pode estar vazio.";
        exit;
    }

    $disciplina = new Disciplina($pdo);
    if ($disciplina->criar($nome)) {
        echo "Disciplina cadastrada com sucesso.";
    } else {
        echo "Erro ao cadastrar disciplina.";
    }
} else {
    echo "Requisição inválida.";
}
