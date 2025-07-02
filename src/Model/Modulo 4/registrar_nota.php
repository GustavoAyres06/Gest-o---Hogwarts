<?php
require_once '../config/db.php';
require_once '../classes/Nota.php';
require_once '../classes/Professor.php';

session_start();
if (!isset($_SESSION['usuario']) || !in_array($_SESSION['usuario']['tipo'], ['professor', 'admin'])) {
    http_response_code(403);
    exit('Acesso negado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['aluno_id'], $_POST['disciplina_id'], $_POST['nota'])) {

    $professorId  = (int) $_SESSION['usuario']['id'];
    $alunoId      = (int) $_POST['aluno_id'];
    $disciplinaId = (int) $_POST['disciplina_id'];
    $notaValor    = (float) $_POST['nota'];

    // Se for professor, verifica se leciona a disciplina
    if ($_SESSION['usuario']['tipo'] === 'professor') {
        $prof = new Professor($pdo);
        if (!$prof->lecionaDisciplina($professorId, $disciplinaId)) {
            http_response_code(403);
            exit('Você não leciona esta disciplina.');
        }
    }

    $nota = new Nota($pdo);
    if ($nota->registrar($alunoId, $disciplinaId, $notaValor)) {
        echo 'Nota registrada.';
    } else {
        http_response_code(500);
        echo 'Erro ao registrar nota.';
    }
} else {
    http_response_code(400);
    echo 'Requisição inválida.';
}
