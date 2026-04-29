<?php
// Conexión a la base de datos
$pdo = new PDO("mysql:host=db;dbname=tfgdb;charset=utf8", "root", "rootpass");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ELIMINAR TAREA
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];

    $stmt = $pdo->prepare("DELETE FROM tareas WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}

// AÑADIR TAREA
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    $stmt = $pdo->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (?, ?)");
    $stmt->execute([$titulo, $descripcion]);
}

// OBTENER TAREAS — ordenado ASC
$stmt = $pdo->query("SELECT * FROM tareas ORDER BY id ASC");
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de tareas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 80px;
            resize: none;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a67d8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #667eea;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Títulos en negrita */
        td.titulo {
            font-weight: bold;
        }

        /* X centrada */
        td.accion {
            text-align: center;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .delete-btn {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        .delete-btn:hover {
            color: darkred;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Lista de tareas</h1>

    <form method="POST">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <button type="submit">Añadir tarea</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>

        <?php foreach ($tareas as $tarea): ?>
        <tr>
            <td><?= $tarea['id'] ?></td>
            <td class="titulo"><?= $tarea['titulo'] ?></td>
            <td><?= $tarea['descripcion'] ?></td>
            <td class="accion">
                <a class="delete-btn" 
                   href="?eliminar=<?= $tarea['id'] ?>"
                   onclick="return confirm('¿Eliminar esta tarea?')">
                   ❌
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</div>

</body>
</html>