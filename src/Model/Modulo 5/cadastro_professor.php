<?php
// Incluindo a conexão e a classe Professor
include('conexao.php');
include('Professor.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados recebidos do formulário
    $usuario_id = $_POST['usuario_id'];

    // Instanciando a classe Professor e cadastrando o professor
    $professor = new Professor($conn);
    if ($professor->criar($usuario_id)) {
        echo "Professor cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o professor!";
    }
}
?>

<form method="POST" action="cadastro_professor.php">
    Usuario ID: <input type="text" name="usuario_id" required><br>
    <input type="submit" value="Cadastrar Professor">
</form>
