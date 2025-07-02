<?php
class Inscricao {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function inscrever($alunoId, $torneioId) {
        $stmt = $this->pdo->prepare("INSERT INTO inscricoes (aluno_id, torneio_id) VALUES (?, ?)");
        $stmt->execute([$alunoId, $torneioId]);
    }

    public function listarInscricoes($torneioId) {
        $stmt = $this->pdo->prepare("SELECT * FROM inscricoes WHERE torneio_id = ?");
        $stmt->execute([$torneioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
