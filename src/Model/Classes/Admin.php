<?php
class Admin {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarAlunosComCasa() {
        $stmt = $this->pdo->query("SELECT nome, email, caracteristicas, casa, status FROM alunos ORDER BY casa");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
