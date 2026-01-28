<?php
require 'db.php';


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$sql = "DELETE FROM tasks WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);


header('Location: index.php');
exit;
?>