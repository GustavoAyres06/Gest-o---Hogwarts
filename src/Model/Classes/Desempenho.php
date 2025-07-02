<?php
class Desempenho {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registrarPontuacao($inscricaoId, $desafioId, $pontuacao) {
        $stmt = $this->pdo->prepare("INSERT INTO desempenhos (inscricao_id, desafio_id, pontuacao) VALUES (?, ?, ?)");
        $stmt->execute([$inscricaoId, $desafioId, $pontuacao]);
    }

    public function listarPorInscricao($inscricaoId) {
        $stmt = $this->pdo->prepare("SELECT * FROM desempenhos WHERE inscricao_id = ?");
        $stmt->execute([$inscricaoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
