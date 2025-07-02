<?php
require_once __DIR__ . '/../classes/Inscricao.php';
require_once __DIR__ . '/../classes/Torneio.php';
require_once __DIR__ . '/../classes/Aluno.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$inscricao = new Inscricao($pdo);
$torneio = new Torneio($pdo);
$aluno = new Aluno($pdo);
$torneios = $torneio->listarTodos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAluno = $_POST['aluno_id'];
    $idTorneio = $_POST['torneio_id'];
    $inscricao->inscrever($idAluno, $idTorneio);
    echo "Inscrição realizada!";
}
?>

<h2>Inscrever Aluno</h2>
<form method="POST">
    ID do Aluno: <input type="number" name="aluno_id" required><br>
    Torneio:
    <select name="torneio_id">
        <?php foreach ($torneios as $t): ?>
            <option value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Inscrever</button>
</form>
