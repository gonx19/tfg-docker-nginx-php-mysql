<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM tareas WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");