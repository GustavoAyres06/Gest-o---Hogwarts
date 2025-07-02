<?php
// Incluindo a conexão e a classe Disciplina e Professor
include('conexao.php');
include('Professor.php');
include('Disciplina.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $professor_id = $_POST['professor_id'];
    $disciplina_id = $_POST['disciplina_id'];

    // Instanciando a classe Professor e associando à disciplina
    $professor = new Professor($conn);
    if ($professor->atribuirDisciplina($professor_id, $disciplina_id)) {
        echo "Professor associado à disciplina com sucesso!";
    } else {
        echo "Erro ao associar professor à disciplina!";
    }
}
?>

<form method="POST" action="associar_professor_disciplina.php">
    Professor ID: <input type="text" name="professor_id" required><br>
    Disciplina ID: <input type="text" name="disciplina_id" required><br>
    <input type="submit" value="Associar">
</form>
