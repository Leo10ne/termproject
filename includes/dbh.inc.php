<?php

// Database connection parameters
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "projectleone";
$tableName = "users";

try {
    // Create a new PDO connection with the database
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
        PDO::ATTR_EMULATE_PREPARES => false, // Disable emulation mode for prepared statements
    ]);

    // Ensure the database exists, or create it if it doesn't
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    // Select the database for use
    $pdo->exec("USE $dbname");
    // Ensure the users table exists, or create it if it doesn't
    $pdo->exec("CREATE TABLE IF NOT EXISTS $tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each user
        email VARCHAR(50) NOT NULL UNIQUE, -- User's email address, must be unique
        password VARCHAR(255) NOT NULL, -- User's password, stored securely
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Registration date and time
    )");

    echo "Database and table checked/created successfully.";
} catch (PDOException $e) {
    // Handle any errors during connection or table creation
    die("Could not connect or create the database/table: " . $e->getMessage());
}