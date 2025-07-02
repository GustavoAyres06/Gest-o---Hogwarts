<?php
require_once '../config/db.php';
require_once '../classes/Disciplina.php';
require_once '../classes/Professor.php';

session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    http_response_code(403);
    exit('Acesso negado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['professor_id'], $_POST['disciplina_id'])) {

    $professorId  = (int) $_POST['professor_id'];
    $disciplinaId = (int) $_POST['disciplina_id'];

    $professor = new Professor($pdo);
    if ($professor->atribuirDisciplina($professorId, $disciplinaId)) {
        echo 'Disciplina atribuída com sucesso.';
    } else {
        http_response_code(500);
        echo 'Erro ao atribuir disciplina.';
    }
} else {
    http_response_code(400);
    echo 'Requisição inválida.';
}
