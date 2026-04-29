<?php
require 'db.php';

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$stmt = $conn->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (?, ?)");
$stmt->execute([$titulo, $descripcion]);

header("Location: index.php");