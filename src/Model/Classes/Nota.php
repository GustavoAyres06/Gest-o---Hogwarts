<?php
class Nota {
    private $conn;
    private $table = "notas";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($aluno_id, $disciplina_id, $nota) {
        $query = "INSERT INTO {$this->table} (aluno_id, disciplina_id, nota, data_registro)
                  VALUES (:aluno_id, :disciplina_id, :nota, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->bindParam(':disciplina_id', $disciplina_id);
        $stmt->bindParam(':nota', $nota);
        return $stmt->execute();
    }

    public function boletim($aluno_id) {
        $query = "SELECT d.nome AS disciplina, n.nota, n.data_registro 
                  FROM notas n
                  JOIN disciplinas d ON n.disciplina_id = d.id
                  WHERE n.aluno_id = :aluno_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
