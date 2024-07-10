<?php

// Set session to use only cookies for storing session ID to prevent session fixation
ini_set('session.use_only_cookies', 1);
// Enable strict mode to prevent uninitialized session ID from being used
ini_set('session.use_strict_mode', 1);
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);

// Configure session cookie parameters for security enhancements
session_set_cookie_params([
    'lifetime' => 0, // Session cookie will last until the browser is closed
    'path' => '/', // Cookie available within the entire domain
    'domain' => 'localhost', // Cookie domain
    'secure' => true, // Cookie will only be sent over secure connections
    'httponly' => true, // Cookie can only be accessed over the HTTP protocol
    'samesite' => 'Strict' // restrict cookie to same site requests
]);

// Start or resume a session
session_start();

// Check if user is logged in
if (isset($_SESSION["user_id"])) {
    // Regenerate session ID for logged in users to prevent session fixation
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_logged_in();
        $_SESSION["last_regeneration"] = time();
    } else {
        $interval = 60 * 30; // Time interval for session ID regeneration (30 minutes)
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_logged_in();
            $_SESSION["last_regeneration"] = time();
        }
    }
} else {
    // Regenerate session ID for users not logged in
    if (!isset($_SESSION["last_regeneration"])) {
        session_regenerate_id();
        $_SESSION["last_regeneration"] = time();
    } else {
        $interval = 60 * 30; // Time interval for session ID regeneration (30 minutes)
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
            $_SESSION["last_regeneration"] = time();
        }
    }
}

/**
 * Regenerates session ID for logged-in users and appends user ID to the session ID.
 * This function is used to enhance security for sessions of authenticated users.
 */
function regenerate_session_id_logged_in(): void
{
    session_regenerate_id(true); // Regenerate session ID and delete old session
    $userId = $_SESSION["user_id"]; // Retrieve user ID from session
    $new_SessionId = session_create_id(); // Create a new session ID
    $sessionId = $new_SessionId . "" . $userId; // Append user ID to session ID
    session_id($sessionId); // Set the custom session ID
    $_SESSION["last_regeneration"] = time(); // Update the last regeneration time
}

/**
 * Regenerates session ID for users not logged in.
 * This function is used to prevent session fixation attacks.
 */
function regenerate_session_id(): void
{
    session_regenerate_id(true); // Regenerate session ID and delete old session
    $_SESSION["last_regeneration"] = time(); // Update the last regeneration time
}