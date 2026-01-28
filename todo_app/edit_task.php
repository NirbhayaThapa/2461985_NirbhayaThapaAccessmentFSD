<?php
require 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch existing task
$sql = "SELECT * FROM tasks WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$task = $stmt->fetch();

if (!$task) {
    die('Task not found');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $status = $_POST['status'];

    if ($title !== '') {
        $update = "UPDATE tasks 
                   SET title = :title, status = :status 
                   WHERE id = :id";

        $stmt = $pdo->prepare($update);
        $stmt->execute([
            ':title' => $title,
            ':status' => $status,
            ':id' => $id
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
    <title>Edit Task</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">

    <h2>Edit Task</h2>

    <form method="post">
        <label for="title">Title</label><br>
        <input type="text" name="title" id="title"
               value="<?= htmlspecialchars($task['title']) ?>" required>

        <label for="status">Status</label><br>
        <select name="status" id="status">
            <option value="pending"
                <?= $task['status'] === 'pending' ? 'selected' : '' ?>>
                Pending
            </option>
            <option value="completed"
                <?= $task['status'] === 'completed' ? 'selected' : '' ?>>
                Completed
            </option>
        </select>

        <button type="submit">Save Changes</button>
    </form>

    <br>
    <a href="index.php">Back to list</a>

</div>

</body>
</html>
