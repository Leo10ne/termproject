<?php

declare(strict_types=1);

/**
 * Displays signup errors or a success message.
 *
 * This function checks if there are any signup errors stored in the session and displays them.
 * If there are no errors and the signup was successful, it displays a success message.
 * After displaying errors, it clears them from the session to prevent them from being shown again.
 * If the signup was successful, it displays a success message based on a query parameter.
 */
function check_signup_errors()
{
    $result = null; // Initialize a variable to hold potential return values

    if (isset($_SESSION['errors_signup'])){
        echo "<br>";
        foreach ($_SESSION['errors_signup'] as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }
        $result = $_SESSION['errors_signup']; // Assign errors to result
        unset($_SESSION['errors_signup']); // Clear the errors from the session
    }
    else if (isset($_GET['signup']) && $_GET['signup'] == 'success'){
        echo '<p class="form-success">Signup successful!</p>';
    }

    return $result; // Return the result, which will be null if no errors or signup success
}