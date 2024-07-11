<?php
// Start session and check if the user is an admin
global $pdo;
require_once "includes/config_session.inc.php";
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Include your database connection file
require_once 'includes/dbh.inc.php';

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['long_url'])) {
    $longUrl = $_POST['long_url'];
    // Generate a unique short code
    $shortCode = substr(md5(uniqid(rand(), true)), 0, 6); // Example short code generation

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO url_shortener (long_url, short_code) VALUES (?, ?)");
    if ($stmt->execute([$longUrl, $shortCode])) {
        echo "Short URL created: " . "https://yourdomain.com/s/" . $shortCode;
    } else {
        echo "An error occurred.";
    }
}

