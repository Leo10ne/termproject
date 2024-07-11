<?php
/**
 * This script enhances the functionality of testing URL redirections by providing detailed logging.
 * It includes functions for testing redirections and logging debug information.
 */

/**
 * Tests the redirection of a given URL and logs the response.
 *
 * This function initializes a cURL session for the given URL, sets options to return the transfer
 * as a string, include the header in the output, and not follow any `Location:` header. It executes
 * the session, retrieves the HTTP status code, and logs the response headers for debugging purposes.
 * Based on the HTTP status code, it returns a message indicating the result of the redirection test.
 *
 * @param string $url The URL to test for redirection.
 * @return string A message indicating the result of the redirection test.
 */
function testRedirection(string $url): string
{
    $ch = curl_init($url); // Initialize a cURL session.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string.
    curl_setopt($ch, CURLOPT_HEADER, true); // Include the header in the output.
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // Do not follow "Location:" header.
    $response = curl_exec($ch); // Execute the cURL session.
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Retrieve the HTTP status code.
    curl_close($ch); // Close the cURL session.

    // Extract and log the response headers for debugging.
    $headers = substr($response, 0, strpos($response, "\r\n\r\n"));
    logDebugInfo($url, $httpCode, $headers);

    // Return a message based on the HTTP status code.
    if ($httpCode == 301 || $httpCode == 302) {
        return "Redirection successful with status code: $httpCode";
    } elseif ($httpCode == 404) {
        return "404 Not Found as expected.";
    } else {
        return "Unexpected status code: $httpCode";
    }
}

/**
 * Logs debugging information to a file.
 *
 * This function formats a log message with the current date and time, the tested URL,
 * the HTTP status code, and the response headers. It appends this log message to a file
 * named 'debug_log.txt'.
 *
 * @param string $url The URL that was tested.
 * @param int $httpCode The HTTP status code received.
 * @param string $headers The response headers.
 */
function logDebugInfo(string $url, int $httpCode, string $headers): void
{
    $logMessage = sprintf("[%s] Testing URL: %s, HTTP Code: %s, Headers: %s\n", date('Y-m-d H:i:s'), $url, $httpCode, $headers);
    file_put_contents('debug_log.txt', $logMessage, FILE_APPEND); // Append the log message to the file.
}

// Example usage of the testRedirection function.
echo testRedirection("http://localhost:63342/main.php") . PHP_EOL;
echo testRedirection("http://localhost:63342/index.php") . PHP_EOL;
echo testRedirection("http://localhost/test") . PHP_EOL;
