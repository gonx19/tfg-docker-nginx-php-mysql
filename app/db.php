<?php
$host = "db";
$db = getenv('MYSQL_DATABASE') ?: 'tfgdb';
$user = "root";
$pass = getenv('MYSQL_ROOT_PASSWORD') ?: '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>