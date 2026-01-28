<?php
require 'db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $priority = $_POST['priority'];

    if ($title === '') {
        $error = 'Title is required';
    } else {
        $sql = "INSERT INTO tasks (title, priority) VALUES (:title, :priority)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':priority' => $priority
        ]);

        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">

    <h2>Add New Task</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="title">Title</label><br>
        <input type="text" name="title" id="title" required>

        <label for="priority">Priority</label><br>
        <select name="priority" id="priority">
            <option value="low">Low</option>
            <option value="normal" selected>Normal</option>
            <option value="high">High</option>
        </select>

        <button type="submit">Add Task</button>
    </form>

    <br>
    <a href="index.php">Back to list</a>

</div>

</body>
</html>
