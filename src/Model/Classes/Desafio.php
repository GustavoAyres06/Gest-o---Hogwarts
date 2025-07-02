<?php
class Desafio {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionar($torneioId, $nome, $descricao, $pontosMax) {
        $stmt = $this->pdo->prepare("INSERT INTO desafios (torneio_id, nome, descricao, pontos_max) VALUES (?, ?, ?, ?)");
        $stmt->execute([$torneioId, $nome, $descricao, $pontosMax]);
    }

    public function listarPorTorneio($torneioId) {
        $stmt = $this->pdo->prepare("SELECT * FROM desafios WHERE torneio_id = ?");
        $stmt->execute([$torneioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
