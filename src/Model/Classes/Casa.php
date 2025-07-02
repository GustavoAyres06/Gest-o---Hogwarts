<?php
class Casa {
    private $conn;
    private $table = "casas";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function atualizarPontos($casa_id, $pontos) {
        $query = "UPDATE {$this->table} SET pontos = pontos + :pontos WHERE id = :casa_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pontos', $pontos);
        $stmt->bindParam(':casa_id', $casa_id);
        return $stmt->execute();
    }

    public function listarCasas() {
        $query = "SELECT * FROM {$this->table} ORDER BY pontos DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
