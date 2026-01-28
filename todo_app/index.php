<?php
require'db.php';


// Fetch all tasks
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$tasks = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>To-Do List</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>


<h1>To-Do List</h1>


<a href="add_task.php">Add New Task</a>


<br><br>


<input type="text" id="search" placeholder="Search tasks by title">


<div id="results">
<table>
<tr>
<th>Title</th>
<th>Status</th>
<th>Priority</th>
<th>Actions</th>
</tr>


<?php foreach ($tasks as $task): ?>
<tr>
<td><?= htmlspecialchars($task['title']) ?></td>
<td><?= htmlspecialchars($task['status']) ?></td>
<td><?= htmlspecialchars($task['priority']) ?></td>
<td>
<a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a> |
<a href="delete_task.php?id=<?= $task['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>


<script src="assets/script.js"></script>
</body>
</html>