<?php
require 'Aluno.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$aluno = new Aluno($pdo);

if (!isset($_GET['email'])) {
    die("Link invalido.");
}

$email = $_GET['email'];
$dados = $aluno->getAlunoPorEmail($email);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $caracteristicas = $_POST['caracteristicas'] ?? '';
    $casa = $_POST['casa'] ?? '';

    try {
        $aluno->registrarCaracteristicas($email, $caracteristicas);
        if ($casa) {
            $aluno->registrarCasa($email, $casa);
            echo "<p>Casa registrada com sucesso!</p>";
        } else {
            echo "<p>Caracteristicas atualizadas!</p>";
        }
        // Atualiza os dados para exibir no formulario
        $dados = $aluno->getAlunoPorEmail($email);
    } catch (Exception $e) {
        echo "<p>Erro: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Moderar Aluno: <?= htmlspecialchars($dados['nome']) ?></h2>

<form method="POST">
    <label>Caracteristicas principais (ajuda para sugestao da casa):</label><br>
    <textarea name="caracteristicas" rows="5" cols="50"><?= htmlspecialchars($dados['caracteristicas'] ?? '') ?></textarea><br><br>

    <label>Casa escolhida pelo Chapeu Seletor:</label><br>
    <select name="casa">
        <option value="">-- Selecione --</option>
        <?php
        $casas = ['Grifinoria', 'Sonserina', 'Corvinal', 'Lufa-Lufa'];
        foreach ($casas as $c) {
            $selected = ($dados['casa'] === $c) ? 'selected' : '';
            echo "<option value=\"$c\" $selected>$c</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>
