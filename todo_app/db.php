<?php
// Database connection file

$host = 'localhost';
$dbname = 'np03cs4a240109';
$username = 'np03cs4a240109';
$password = 'F6uxO6GbdI';


try {
$pdo = new PDO(
"mysql:host=$host;dbname=$dbname;charset=utf8mb4",
$username,
$password
);


// Throw exceptions if something goes wrong
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {

die('Database connection error');
}
?>