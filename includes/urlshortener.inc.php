<?php
global $pdo;
require_once __DIR__.'/../includes/dbh.inc.php'; // Database connection
require_once __DIR__.'/../includes/config_session.inc.php';

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['email'] == 'admin@email.com') {
        // Check for form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['long_url'], $_POST['short_url'])) { // Corrected to 'short_url'
            $longUrl = trim($_POST['long_url']);
            $shortCode = trim($_POST['short_url']); // Corrected to 'short_url'

            // Insert into database
            $stmt = $pdo->prepare("INSERT INTO url_shortener (long_url, short_url) VALUES (?, ?)");
            if ($stmt->execute([$longUrl, $shortCode])) {
                echo "Short URL created: " . "https://localhost/termproject/" . $shortCode;
            } else {
                // Consider providing more detailed error information
                echo "An error occurred during the database operation.";
            }
        }
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    // Redirect if not logged in
    header('Location: login.php');
    exit();
}
