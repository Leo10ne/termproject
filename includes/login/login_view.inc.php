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
    // Initialize a variable to hold potential return values
    $result = null;

    // Check for stored login errors in the session
    if (isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        // Display each error
        foreach ($errors as $error) {
            echo "<p class='form-error' style='display:none;'>$error</p>";
        }

        // Clear the errors from the session
        unset($_SESSION["errors_login"]);

        // Assign errors to result
        $result = $errors;
    }
    // Check for a successful login via query parameter
    else if (isset($_GET["login"]) && $_GET["login"] == "success"){
        echo "<p class='form-success'>Login successful</p>";
    }

    // Return the result, which will be null if no errors or login success
    return $result;
}

function output_email(): void
{
    if(isset($_SESSION['user_id'])){
        echo "You are logged in as ".$_SESSION['email'];
    } else{
        echo "You are not logged in";
    }
}