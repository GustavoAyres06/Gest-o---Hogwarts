<?php
require_once __DIR__ . '/../classes/Torneio.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$torneio = new Torneio($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $torneio->criar($_POST['nome'], $_POST['descricao'], $_POST['regras'], $_POST['data'], $_POST['local']);
    echo "Torneio criado com sucesso!";
}
?>

<h2>Criar Torneio</h2>
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Descrição: <textarea name="descricao"></textarea><br>
    Regras: <textarea name="regras"></textarea><br>
    Data Início: <input type="date" name="data" required><br>
    Local: <input type="text" name="local" required><br>
    <button type="submit">Criar</button>
</form>
