<?php
class Ocorrencia {
    private $conn;
    private $table = "ocorrencias";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($aluno_id, $professor_id, $tipo, $pontos, $motivo) {
        $query = "INSERT INTO {$this->table} 
                  (aluno_id, professor_id, tipo, pontos, motivo, data_registro)
                  VALUES (:aluno_id, :professor_id, :tipo, :pontos, :motivo, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->bindParam(':professor_id', $professor_id);
        $stmt->bindParam(':tipo', $tipo); // "merito" ou "demerito"
        $stmt->bindParam(':pontos', $pontos);
        $stmt->bindParam(':motivo', $motivo);
        return $stmt->execute();
    }

    public function listarPorAluno($aluno_id) {
        $query = "SELECT * FROM {$this->table} WHERE aluno_id = :aluno_id ORDER BY data_registro DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
