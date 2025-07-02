<?php
class Turma {
    private $conn;
    private $table = "turmas";
    private $relacaoTable = "turmas_professores"; // Tabela de relação entre professores e turmas

    public function __construct($db) {
        $this->conn = $db;
    }

    // Cria uma nova turma
    public function criar($nome, $horario, $periodo) {
        $query = "INSERT INTO {$this->table} (nome, horario, periodo) VALUES (:nome, :horario, :periodo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':periodo', $periodo);
        return $stmt->execute();
    }

    // Lista todas as turmas
    public function listar() {
        $query = "SELECT id, nome, horario, periodo FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lista as turmas de um professor
    public function listarTurmasPorProfessor($professor_id) {
        $query = "SELECT t.id, t.nome, t.horario, t.periodo 
                  FROM turmas t
                  JOIN {$this->relacaoTable} tp ON t.id = tp.turma_id
                  WHERE tp.professor_id = :professor_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':professor_id', $professor_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Atualiza informações de uma turma
    public function atualizar($turma_id, $nome, $horario, $periodo) {
        $query = "UPDATE {$this->table} 
                  SET nome = :nome, horario = :horario, periodo = :periodo 
                  WHERE id = :turma_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':turma_id', $turma_id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':periodo', $periodo);
        return $stmt->execute();
    }

    // Deleta uma turma
    public function deletar($turma_id) {
        $query = "DELETE FROM {$this->table} WHERE id = :turma_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':turma_id', $turma_id);
        return $stmt->execute();
    }

    // Associa um professor a uma turma
    public function associarProfessor($professor_id, $turma_id) {
        $query = "INSERT INTO {$this->relacaoTable} (professor_id, turma_id) 
                  VALUES (:professor_id, :turma_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':professor_id', $professor_id);
        $stmt->bindParam(':turma_id', $turma_id);
        return $stmt->execute();
    }
}
?>
