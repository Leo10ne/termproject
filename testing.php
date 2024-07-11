<?php
// Enhanced function to test redirection with detailed logging
function testRedirection($url): string
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Log the response headers for debugging
    $headers = substr($response, 0, strpos($response, "\r\n\r\n"));
    logDebugInfo($url, $httpCode, $headers);

    if ($httpCode == 301 || $httpCode == 302) {
        return "Redirection successful with status code: $httpCode";
    } elseif ($httpCode == 404) {
        return "404 Not Found as expected.";
    } else {
        return "Unexpected status code: $httpCode";
    }
}

// Function to log debugging information
function logDebugInfo($url, $httpCode, $headers) {
    $logMessage = sprintf("[%s] Testing URL: %s, HTTP Code: %s, Headers: %s\n", date('Y-m-d H:i:s'), $url, $httpCode, $headers);
    file_put_contents('debug_log.txt', $logMessage, FILE_APPEND);
}

// Test existing short URL
echo testRedirection("http://localhost:63342/main.php") . PHP_EOL;

// Test non-existent short URL
echo testRedirection("http://localhost:63342/index.php") . PHP_EOL;

// Test invalid URL pattern
echo testRedirection("http://localhost/test") . PHP_EOL;