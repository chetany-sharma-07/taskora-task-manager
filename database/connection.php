<?php

function getDatabaseConnection() {
    $host = 'localhost';
    $db_name = 'taskora';
    $username = 'root';
    $password = '';

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

