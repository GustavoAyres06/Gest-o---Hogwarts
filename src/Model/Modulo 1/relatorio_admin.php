<?php
require 'Admin.php';

$pdo = new PDO("mysql:host=localhost;dbname=hogwarts", "root", "");
$admin = new Admin($pdo);

$convites = $admin->listarConvites();

foreach ($convites as $convite) {
    echo "{$convite['nome']} - {$convite['email']} - {$convite['status']}<br>";
}
