<?php
include('conexao.php');
include('Notificacao.php');

$tipo = 'administrador'; // Tipo: aluno, professor, administrador
$remetente_id = 1; // ID do administrador
$destinatario_id = 2; // ID do aluno
$mensagem = "Férias começam em 1 semana!";
$data_agendamento = '2025-12-10 09:00:00'; // Data de agendamento

$notificacao = new Notificacao($conn);
if ($notificacao->criar($tipo, $remetente_id, $destinatario_id, $mensagem, $data_agendamento)) {
    echo "Notificação agendada com sucesso!";
} else {
    echo "Erro ao agendar notificação.";
}
?>
