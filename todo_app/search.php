<?php
require 'db.php';


$query = isset($_GET['q']) ? trim($_GET['q']) : '';


$sql = "SELECT * FROM tasks WHERE title LIKE :query ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':query' => '%' . $query . '%'
]);


$tasks = $stmt->fetchAll();


if (count($tasks) === 0) {
echo '<p>No results found</p>';
}
foreach ($tasks as $task) {
echo '<p>' . htmlspecialchars($task['title']) . '</p>';
}
?>