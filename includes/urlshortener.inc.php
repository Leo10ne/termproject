<?php
global $pdo;
require_once __DIR__.'/../includes/dbh.inc.php'; // Database connection
require_once __DIR__.'/../includes/config_session.inc.php'; // Session configuration

// Check if a user is logged in and if they are an admin
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['email'] == 'admin@email.com') {
        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['long_url'], $_POST['short_url'])) {
            $longUrl = trim($_POST['long_url']); // Sanitize the long URL input
            $shortCode = trim($_POST['short_url']); // Sanitize the short URL code input

            // Prepare and execute the SQL statement to insert the new URL mapping
            $stmt = $pdo->prepare("INSERT INTO url_shortener (long_url, short_url) VALUES (?, ?)");
            if ($stmt->execute([$longUrl, $shortCode])) {
                // Success: Display the newly created short URL
                echo "Short URL created: " . "https://localhost/termproject/" . $shortCode;
            } else {
                // Failure: Inform the user of a database operation error
                echo "An error occurred during the database operation.";
            }
        }
    } else {
        // Redirect non-admin users to the index page
        header('Location: index.php');
        exit();
    }
} else {
    // Redirect unauthenticated users to the login page
    header('Location: login.php');
    exit();
}
