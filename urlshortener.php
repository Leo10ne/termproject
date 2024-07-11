<?php

require_once "includes/config_session.inc.php";

if (!isset($_SESSION['email']) || $_SESSION['email'] !== "admin@email.com"){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Short URL</title>
</head>
<body>
    <form method="POST" action="includes/urlshortener.inc.php">
        <input type="url" name="long_url" required placeholder="Enter Long URL">
        <input type="text" name="short_url" required placeholder="Enter Short URL">
        <button type="submit">Shorten URL</button>
    </form>
</body>
</html>