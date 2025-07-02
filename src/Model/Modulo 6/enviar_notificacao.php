<?php
include('conexao.php');
include('Notificacao.php');

$tipo = 'aluno'; // Tipo: aluno, professor, administrador
$remetente_id = 1; // ID do remetente
$destinatario_id = 2; // ID do destinatário
$mensagem = "Atenção: Aula de Matemática foi adiada!";
$data_agendamento = null; // Enviado em tempo real

$notificacao = new Notificacao($conn);
if ($notificacao->criar($tipo, $remetente_id, $destinatario_id, $mensagem, $data_agendamento)) {
    echo "Notificação enviada com sucesso!";
} else {
    echo "Erro ao enviar notificação.";
}
?>
