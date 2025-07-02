<?php
include('conexao.php');
include('Notificacao.php');

$usuario_id = 2; // ID do usuário (aluno)

$notificacao = new Notificacao($conn);
$notificacoes = $notificacao->listarNotificacoes($usuario_id);

foreach ($notificacoes as $not) {
    echo "Mensagem: " . $not['mensagem'] . "<br>";
    echo "Data de Envio: " . $not['data_envio'] . "<br><hr>";
}
?>
