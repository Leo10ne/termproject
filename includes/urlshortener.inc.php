<?php
global $pdo;
require_once 'dbh.inc.php'; // Assuming dbh.inc.php is the correct file for database connection setup.

function generateShortCode($length = 6): string
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $long_url = $_POST['long_url'];

    // Generate a unique short code
    $short_code = '';
    do {
        $short_code = generateShortCode();
        $stmt = $pdo->prepare("SELECT id FROM url_shortener WHERE short_url = ?");
        $stmt->execute([$short_code]);
        $result = $stmt->fetch();
    } while ($result);

    // Insert the long URL and short code into the database
    $stmt = $pdo->prepare("INSERT INTO url_shortener (long_url, short_url) VALUES (?, ?)");
    $stmt->execute([$long_url, $short_code]);

    // Display the shortened URL
    $baseurl = rtrim($_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/') . '/';
    echo "Short URL: <a href=\"http://{$baseurl}redirect.inc.php?code={$short_code}\">http://{$baseurl}redirect.inc.php?code={$short_code}</a>";
}
?>