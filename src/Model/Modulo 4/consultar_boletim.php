<?php
require_once '../config/db.php';
require_once '../classes/Nota.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    http_response_code(403);
    exit('Acesso negado.');
}

$requerAdmin = in_array($_SESSION['usuario']['tipo'], ['admin', 'professor']);
$alunoId = $requerAdmin && isset($_GET['aluno_id'])
           ? (int) $_GET['aluno_id']
           : (int) $_SESSION['usuario']['id'];

$nota = new Nota($pdo);
$boletim = $nota->boletim($alunoId);

header('Content-Type: application/json');
echo json_encode($boletim);
