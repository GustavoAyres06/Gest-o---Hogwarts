<?php
require_once '../config/db.php';
require_once '../classes/Ocorrencia.php';
require_once '../classes/Casa.php';

session_start();
if (!isset($_SESSION['usuario']) || !in_array($_SESSION['usuario']['tipo'], ['professor', 'admin'])) {
    http_response_code(403);
    exit('Acesso negado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['aluno_id'], $_POST['tipo'], $_POST['pontos'], $_POST['motivo'])) {

    $alunoId     = (int) $_POST['aluno_id'];
    $profId      = (int) $_SESSION['usuario']['id'];
    $tipo        = $_POST['tipo'] === 'demerito' ? 'demerito' : 'merito';
    $pontos      = (int) $_POST['pontos'] * ($tipo === 'demerito' ? -1 : 1);
    $motivo      = trim($_POST['motivo']);

    $oc = new Ocorrencia($pdo);
    $ok = $oc->registrar($alunoId, $profId, $tipo, $pontos, $motivo);

    if ($ok) {
        // Atualiza pontos da casa do aluno
        $casaStmt = $pdo->prepare(
            "SELECT casa_id FROM alunos WHERE id = :aluno_id LIMIT 1"
        );
        $casaStmt->bindParam(':aluno_id', $alunoId);
        $casaStmt->execute();
        $row = $casaStmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $casa = new Casa($pdo);
            $casa->atualizarPontos((int)$row['casa_id'], $pontos);
        }
        echo 'Ocorrência registrada.';
    } else {
        http_response_code(500);
        echo 'Erro ao registrar ocorrência.';
    }
} else {
    http_response_code(400);
    echo 'Requisição inválida.';
}
