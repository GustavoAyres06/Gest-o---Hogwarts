<?php
// Incluindo a conexão e a classe Desempenho
include('conexao.php');
include('Desempenho.php');

$professor_id = $_GET['professor_id']; // Pega o ID do professor

// Instanciando a classe Desempenho e listando o desempenho
$desempenho = new Desempenho($conn);
$relatorio = $desempenho->listarDesempenho($professor_id);

echo "<h2>Desempenho do Professor</h2>";
foreach ($relatorio as $atividade) {
    echo "Atividade: " . $atividade['descricao'] . "<br>";
    echo "Data: " . $atividade['data'] . "<br><hr>";
}
?>
