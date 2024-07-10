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
function check_signup_errors(): void
{
    // Check if there are any signup errors stored in the session
    if (isset($_SESSION['errors_signup'])){
        echo "<br>";
        // Iterate through each error and display it
        foreach ($_SESSION['errors_signup'] as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }
        // Clear the errors from the session
        unset($_SESSION['errors_signup']);
    }
    // Check if the signup was successful based on a query parameter
    else if (isset($_GET['signup']) && $_GET['signup'] == 'success'){
        // Display a success message
        echo '<p class="form-success">Signup successful!</p>';
    }
}