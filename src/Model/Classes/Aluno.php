<?php
class Aluno {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Módulo 1
    public function cadastrar($nome, $email, $idade) { /* ... */ }

    private function enviarConvite($nome, $email) { /* ... */ }

    public function confirmarRecebimento($email) { /* ... */ }

    // Módulo 2
    public function registrarCaracteristicas($email, $caracteristicas) { /* ... */ }

    public function registrarCasa($email, $casa) { /* ... */ }

    public function getAlunoPorEmail($email) { /* ... */ }
}
