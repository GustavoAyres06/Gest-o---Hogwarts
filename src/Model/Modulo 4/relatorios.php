<?php
require_once '../config/db.php';
require_once '../classes/Casa.php';

session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    http_response_code(403);
    exit('Acesso negado.');
}

$relatorio = $_GET['tipo'] ?? 'casas';

switch ($relatorio) {
    case 'casas':  // Ranking de casas
        $casa = new Casa($pdo);
        $dados = $casa->listarCasas();
        break;

    case 'aluno':
        if (!isset($_GET['aluno_id'])) {
            http_response_code(400);
            exit('aluno_id obrigatório.');
        }
        require_once '../classes/Nota.php';
        $nota  = new Nota($pdo);
        $dados = $nota->boletim((int)$_GET['aluno_id']);
        break;

    default:
        http_response_code(400);
        exit('Relatório desconhecido.');
}

header('Content-Type: application/json');
echo json_encode($dados);
