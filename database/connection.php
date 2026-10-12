<?php
require_once __DIR__ . '/../config/database.php';

function getDatabaseConnection() {
    $host = DB_HOST;
    $db_name = DB_NAME;
    $username = DB_USER;
    $password = DB_PASS;

    try {
        $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        return false;
    }
}

