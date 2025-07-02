<?php
class Notificacao {
    private $conn;
    private $table = "notificacoes";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar notificação
    public function criar($tipo, $remetente_id, $destinatario_id, $mensagem, $data_agendamento = null) {
        // Código para criar a notificação
    }

    // Enviar notificação agendada
    public function enviarNotificacoesAgendadas() {
        // Código para enviar notificações agendadas
    }

    // Enviar uma notificação
    public function enviar($notificacao_id) {
        // Código para enviar a notificação
    }

    // Listar notificações de um usuário
    public function listarNotificacoes($usuario_id) {
        // Código para listar notificações
    }
}
?>
