<?php
require_once __DIR__ . '/../classes/Ranking.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$ranking = new Ranking($pdo);
$casas = $ranking->rankingCasas();
$alunos = $ranking->rankingAlunos();
?>

<h2>Ranking por Casa</h2>
<table border="1">
    <tr><th>Casa</th><th>Pontuação</th></tr>
    <?php foreach ($casas as $c): ?>
        <tr>
            <td><?= $c['casa'] ?></td>
            <td><?= $c['total'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Ranking de Alunos</h2>
<table border="1">
    <tr><th>Aluno</th><th>Casa</th><th>Pontos</th></tr>
    <?php foreach ($alunos as $a): ?>
        <tr>
            <td><?= $a['nome'] ?></td>
            <td><?= $a['casa'] ?></td>
            <td><?= $a['total'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
