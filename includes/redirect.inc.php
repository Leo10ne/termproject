<?php
global $pdo;
require_once 'dbh.inc.php';

// Extract the short code from the URL
$shortCode = $_GET['code'];

// Retrieve the long URL from the database
$stmt = $pdo->prepare("SELECT long_url FROM url_shortener WHERE short_url = ?");
$stmt->execute([$shortCode]);
$urlRow = $stmt->fetch();

if ($urlRow) {
    // Redirect to the long URL
    header("Location: " . $urlRow['long_url']);
    exit;
} else {
    echo "Invalid Short URL";
}
