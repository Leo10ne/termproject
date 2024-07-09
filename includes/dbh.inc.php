<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "termproject";
$tableName = "users"; // Example table name

try {
    // Step 1: Connect to MySQL server
    $pdo = new PDO("mysql:host=$servername", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 2: Check if the database exists, if not, create it
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname")
        or die(print_r($pdo->errorInfo(), true));

    // Step 3: Connect to the database
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 4: Check if the table exists, if not, create it
    $query = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
    )";

    $pdo->exec($query);
    echo "Database and table checked/created successfully.";
} catch (PDOException $e) {
    die("Could not connect or create the database/table: " . $e->getMessage());
}