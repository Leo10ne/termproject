<?php

// Include global PDO object for database connection
global $pdo;

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include necessary files for database connection, model, controller, and session configuration
    require_once "../dbh.inc.php"; // Database connection file
    require_once "register_model.inc.php"; // Model file for registration logic
    require_once "register_contr.inc.php"; // Controller file for registration logic
    require_once '../config_session.inc.php'; // Session configuration file

    // Retrieve email and password from POST request
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Initialize an array to store potential errors
    $errors = [];

    // Validate input fields and perform registration if valid
    if (is_input_empty($email, $password)) {
        // Add error message if any input field is empty
        $errors["empty_input"] = "Please fill in all fields";
    } elseif (is_email_invalid($email)) {
        // Add error message if email format is invalid
        $errors["invalid_email"] = "Please enter a valid email";
    } elseif (is_email_taken($pdo, $email)) {
        // Add error message if email is already taken
        $errors["email_taken"] = "Email is already taken";
    } elseif (!is_password_valid($password)) {
        // Add error message if password is invalid
        $errors["invalid_password"] = "Password must be at least 6 characters long and contain a number";
    }

    else {
        // Register user if all validations pass
        register_user($pdo, $email, $password);
        // Redirect to index page with success message and terminate script
        header("Location: ../../index.php?signup=success");
        die();
    }

    // Check if there are any errors and store them in session
    if ($errors) {
        $_SESSION["errors_signup"] = $errors;
        // Redirect back to index page to display errors and terminate script
        header("Location: ../../index.php");
        die();
    }
} else {
    // Redirect to index page if form was not submitted via POST and terminate script
    header("Location: ../../index.php");
    die();
}