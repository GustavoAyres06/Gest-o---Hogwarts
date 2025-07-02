<?php
class Torneio {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criar($nome, $descricao, $regras, $data, $local) {
        $stmt = $this->pdo->prepare("INSERT INTO torneios (nome, descricao, regras, data_inicio, local) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $regras, $data, $local]);
    }

    public function listarTodos() {
        return $this->pdo->query("SELECT * FROM torneios")->fetchAll(PDO::FETCH_ASSOC);
    }
}
