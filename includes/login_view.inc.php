<?php

declare(strict_types=1);

/**
 * Checks for login errors and displays them, or confirms successful login.
 *
 * This function first checks if there are any login errors stored in the session.
 * If there are, it iterates through each error, displaying them to the user.
 * After displaying, it clears the errors from the session to prevent them from being shown again.
 * If there are no errors and the login was successful (indicated by a query parameter),
 * it displays a success message.
 */
function check_login_errors()
{
    // Check for stored login errors in the session
    if (isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];
        echo "<br>";

        // Display each error
        foreach ($errors as $error) {
            echo "<p class='form-error'>$error</p>";
        }

        // Clear the errors from the session
        unset($_SESSION["errors_login"]);
        return $errors;
    }
    // Check for a successful login via query parameter
    else if (isset($_GET["login"]) && $_GET["login"] == "success"){
        echo "<p class='form-success'>Login successful</p>";
    }
}