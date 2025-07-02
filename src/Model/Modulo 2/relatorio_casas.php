<?php
require 'Admin.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$admin = new Admin($pdo);

$alunos = $admin->listarAlunosComCasa();

echo "<h2>Distribuicao Atual dos Alunos por Casa</h2>";

$casaAtual = '';
foreach ($alunos as $aluno) {
    if ($aluno['casa'] !== $casaAtual) {
        $casaAtual = $aluno['casa'] ?? 'Sem Casa';
        echo "<h3>" . htmlspecialchars($casaAtual) . "</h3>";
    }
    echo "- " . htmlspecialchars($aluno['nome']) . " (" . htmlspecialchars($aluno['email']) . ")<br>";
    echo "Caracteristicas: " . nl2br(htmlspecialchars($aluno['caracteristicas'])) . "<br>";
    echo "Status: " . htmlspecialchars($aluno['status']) . "<br><br>";
}
