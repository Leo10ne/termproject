<?php
// Includes the database connection from 'dbh.inc.php'
global $pdo;
require_once __DIR__.'/includes/dbh.inc.php';

// Get the short code from the query parameter 'code'
$short_url = $_GET['code'];

// Prepare the SQL statement to select the long URL based on the short code
$stmt = $pdo->prepare("SELECT long_url FROM url_shortener WHERE short_url = ?");
$stmt->bindValue(1, $short_url);
$stmt->execute();
$result = $stmt->fetch();
$long_url = $result ? $result['long_url'] : null;

// If a long URL is found, redirect to it
if ($long_url) {
    header("Location: " . $long_url);
    exit;
} else {
    // If no long URL is found, display an error message
    echo "URL not found!";
}