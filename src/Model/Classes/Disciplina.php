<?php
class Disciplina {
    private $conn;
    private $table = "disciplinas";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar($nome) {
        $query = "INSERT INTO {$this->table} (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function listar() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
