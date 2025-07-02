<?php
require 'Aluno.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$aluno = new Aluno($pdo);

// Dados do formulario (exemplo)
$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];

try {
    $aluno->cadastrar($nome, $email, $idade);
    echo "Carta enviada com sucesso!";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
