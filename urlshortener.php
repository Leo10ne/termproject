<?php

// Include session configuration and ensure user is authenticated as admin
require_once "includes/config_session.inc.php";

// Check if a user is logged in and if not, or if the user is not an admin, redirect to the index page
if (!isset($_SESSION['email']) || $_SESSION['email'] !== "admin@email.com") {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Short URL</title>
    <!-- Link to the CSS file that styles the form according to the enquiry form design -->
    <link rel="stylesheet" href="assets/css/enquiryform.css">
</head>
<body>
<div class="blurred-bg"></div> <!-- Background styling -->
<div class="form-container body-content">
    <section id="urlShortenerForm">
        <h2>Create Short URL</h2> <!-- Form heading -->
        <form class="form" method="POST" action="includes/urlshortener.inc.php">
            <!-- Input for the long URL the user wants to shorten -->
            <div class="form-group">
                <input type="url" name="long_url" required placeholder="Enter Long URL">
            </div>
            <!-- Input for the desired short URL -->
            <div class="form-group">
                <input type="text" name="short_url" required placeholder="Enter Short URL">
            </div>
            <!-- Submit button for the form -->
            <div id="form-submit-btn-container">
                <button type="submit" class="form-submit-btn">Shorten URL</button>
            </div>
            <!-- Link to navigate back to the main page -->
            <div class="main-link-container">
                <a href="main.php" class="main-link">Go to Main Page</a>
            </div>
        </form>
    </section>
</div>
</body>
</html>