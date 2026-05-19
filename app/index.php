<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Task Manager 2</h1>

        <form action="add_task.php" method="POST">

            <input
                type="text"
                name="title"
                placeholder="Enter task"
                required
            >

            <button type="submit">
                Add
            </button>

        </form>

        <ul>

            <?php foreach($tasks as $task): ?>

                <li>

                    <?= htmlspecialchars($task['title']) ?>

                    <a href="delete_task.php?id=<?= $task['id'] ?>">
                        Delete
                    </a>

                </li>

            <?php endforeach; ?>

        </ul>

    </div>

</body>
</html>