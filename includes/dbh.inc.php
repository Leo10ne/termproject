<?php

// Database connection parameters
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "projectleone";

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
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        email VARCHAR(50) NOT NULL UNIQUE, 
        password VARCHAR(255) NOT NULL, 
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    )");

    // Ensure the url_shortener table exists, or create it if it doesn't
    $pdo->exec("CREATE TABLE IF NOT EXISTS url_shortener (
        id INT AUTO_INCREMENT PRIMARY KEY,
        long_url VARCHAR(2048) NOT NULL,
        short_url VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    echo "Database and tables checked/created successfully.";
} catch (PDOException $e) {
    // Handle any errors during connection or table creation
    die("Could not connect or create the database/table: " . $e->getMessage());
}