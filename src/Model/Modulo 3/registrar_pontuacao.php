<?php
require_once __DIR__ . '/../classes/Desempenho.php';
require_once __DIR__ . '/../classes/Desafio.php';
require_once __DIR__ . '/../classes/Inscricao.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$desempenho = new Desempenho($pdo);
$desafio = new Desafio($pdo);
$inscricao = new Inscricao($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $desempenho->registrarPontuacao($_POST['inscricao_id'], $_POST['desafio_id'], $_POST['pontuacao']);
    echo "Pontuação registrada!";
}
?>

<h2>Registrar Pontuação</h2>
<form method="POST">
    ID da Inscrição: <input type="number" name="inscricao_id" required><br>
    ID do Desafio: <input type="number" name="desafio_id" required><br>
    Pontuação: <input type="number" name="pontuacao" required><br>
    <button type="submit">Registrar</button>
</form>
