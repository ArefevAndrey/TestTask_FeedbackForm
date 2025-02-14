<?php
define('USER', 'root');
define('PASSWORD', 'root');
define('HOST', 'localhost');
define('DATABASE', 'feedbacks');
try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>