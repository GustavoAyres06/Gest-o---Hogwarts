<?php
// Incluindo a conexão e a classe Professor
include('conexao.php');
include('Professor.php');

$professor_id = $_GET['professor_id']; // Pega o ID do professor

// Instanciando a classe Professor e consultando o cronograma
$professor = new Professor($conn);
$cronograma = $professor->listarTurmas($professor_id);

echo "<h2>Cronograma de Aulas</h2>";
foreach ($cronograma as $turma) {
    echo "Turma: " . $turma['nome'] . "<br>";
    echo "Horário: " . $turma['horario'] . "<br>";
    echo "Período: " . $turma['periodo'] . "<br><hr>";
}
?>
