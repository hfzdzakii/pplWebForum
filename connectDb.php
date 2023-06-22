<?php
$host = 'localhost';
$dbname = 'webforumppl';
$username = 'root';
$password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
?>