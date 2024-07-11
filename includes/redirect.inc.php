<?php
// This script is responsible for redirecting a user from a short URL to its original long URL.
// It includes the database connection setup and performs a lookup for the short URL in the database.

// Include the database connection script from the 'includes' directory.
global $pdo;
require_once __DIR__ . '/../includes/dbh.inc.php';

// Retrieve the 'code' query parameter from the URL, which represents the short URL code.
$short_url = $_GET['code'];

// Prepare a SQL statement to select the corresponding long URL from the 'url_shortener' table.
$stmt = $pdo->prepare("SELECT long_url FROM url_shortener WHERE short_url = ?");
$stmt->bindValue(1, $short_url);
$stmt->execute(); // Execute the prepared statement.
$result = $stmt->fetch(); // Fetch the result row from the statement execution.
$long_url = $result ? $result['long_url'] : null; // Extract the long URL if available.

// Check if a long URL was found for the given short URL code.
if ($long_url) {
    // If found, redirect the user to the long URL.
    header("Location: " . $long_url);
    exit; // Terminate the script execution after redirection.
} else {
    // If no corresponding long URL is found, display an error message.
    echo "URL not found!";
}
