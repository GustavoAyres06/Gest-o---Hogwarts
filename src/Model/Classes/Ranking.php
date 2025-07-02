<?php
class Ranking {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Pontuação total por casa (ranking das casas)
    public function rankingCasas() {
        $sql = "
        SELECT a.casa, SUM(d.pontuacao) as total
        FROM desempenhos d
        JOIN inscricoes i ON d.inscricao_id = i.id
        JOIN alunos a ON i.aluno_id = a.id
        GROUP BY a.casa
        ORDER BY total DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ranking individual dos alunos
    public function rankingAlunos() {
        $sql = "
        SELECT a.nome, a.casa, SUM(d.pontuacao) as total
        FROM desempenhos d
        JOIN inscricoes i ON d.inscricao_id = i.id
        JOIN alunos a ON i.aluno_id = a.id
        GROUP BY a.id
        ORDER BY total DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
