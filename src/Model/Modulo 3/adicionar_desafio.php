<?php
require_once __DIR__ . '/../classes/Desafio.php';
require_once __DIR__ . '/../classes/Torneio.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$desafio = new Desafio($pdo);
$torneio = new Torneio($pdo);
$torneios = $torneio->listarTodos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $desafio->adicionar($_POST['torneio_id'], $_POST['nome'], $_POST['descricao'], $_POST['pontos']);
    echo "Desafio adicionado!";
}
?>

<h2>Adicionar Desafio</h2>
<form method="POST">
    Torneio:
    <select name="torneio_id">
        <?php foreach ($torneios as $t): ?>
            <option value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
        <?php endforeach; ?>
    </select><br>
    Nome do Desafio: <input type="text" name="nome"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    Pontos Máximos: <input type="number" name="pontos"><br>
    <button type="submit">Adicionar</button>
</form>
