<?php

$host = getenv('DB_HOST') ?: 'db';
$dbname = getenv('DB_NAME') ?: 'tasks';
$user = getenv('DB_USER') ?: 'admin';
$pass = getenv('DB_PASSWORD') ?: 'admin123456789';

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL
        )
    ");

} catch (PDOException $e) {

    die("Database Error: " . $e->getMessage());
}
?>