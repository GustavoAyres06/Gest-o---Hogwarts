<?php
require 'Aluno.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$aluno = new Aluno($pdo);

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $aluno->confirmarRecebimento($email);
    echo "Obrigado por confirmar! Nos vemos em Hogwarts!";
} else {
    echo "Link invalido.";
}
