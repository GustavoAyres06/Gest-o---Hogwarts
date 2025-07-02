<?php
class Professor {
    private $conn;
    private $table = "professores";
    private $relacaoTable = "disciplinas_professores";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Cadastra um usuário como professor
    public function criar($usuario_id) {
        $query = "INSERT INTO {$this->table} (usuario_id) VALUES (:usuario_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id);
        return $stmt->execute();
    }

    // Atribui uma disciplina ao professor
    public function atribuirDisciplina($professor_id, $disciplina_id) {
        $query = "INSERT INTO {$this->relacaoTable} (professor_id, disciplina_id)
                  VALUES (:professor_id, :disciplina_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':professor_id', $professor_id);
        $stmt->bindParam(':disciplina_id', $disciplina_id);
        return $stmt->execute();
    }

    // Verifica se o professor leciona uma determinada disciplina
    public function lecionaDisciplina($professor_id, $disciplina_id) {
        $query = "SELECT COUNT(*) FROM {$this->relacaoTable}
                  WHERE professor_id = :professor_id AND disciplina_id = :disciplina_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':professor_id', $professor_id);
        $stmt->bindParam(':disciplina_id', $disciplina_id);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Lista disciplinas do professor
    public function listarDisciplinas($professor_id) {
        $query = "SELECT d.id, d.nome 
                  FROM disciplinas d
                  JOIN {$this->relacaoTable} dp ON d.id = dp.disciplina_id
                  WHERE dp.professor_id = :professor_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':professor_id', $professor_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
