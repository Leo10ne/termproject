<?php

// Include global PDO object for database connection
global $pdo;

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from POST data
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Include necessary files for database connection and login logic
        require_once "../dbh.inc.php"; // Database connection file
        require_once "login_model.inc.php"; // Model functions for login
        require_once "login_contr.inc.php"; // Controller functions for login
        require_once '../config_session.inc.php'; // Session configuration settings

        // Initialize an array to store potential errors
        $errors = [];

        // Check if either email or password input is empty
        if (is_input_empty($email, $password)) {
            // Add error message for empty input fields
            $errors["empty_input"] = "Please fill in all fields";
        } else {
            // Attempt to retrieve user data from database
            $result = get_user($pdo, $email);

            // Check if user was found
            if (!$result) {
                // Add error message if no user found
                $errors["user_not_found"] = "No user found with that email";
            } else {
                // Verify if the provided password matches the stored hashed password
                if (is_password_wrong($password, $result["password"])) {
                    // Add error message if password is incorrect
                    $errors["password_wrong"] = "Password is incorrect";
                } else {
                    // Logic for successful login
                    session_regenerate_id(); // Regenerate session ID for security

                    // Set session variables for user
                    $_SESSION["user_id"] = $result["id"];
                    $_SESSION["email"] = htmlspecialchars($result["email"]);
                    $_SESSION["last_regeneration"] = time(); // Update last regeneration time

                    // Redirect to main page
                    header("Location: ../../main.php");
                    die();
                }
            }
        }

        // Check if there are any errors
        if (!empty($errors)) {
            // Store errors in session and redirect to index page
            $_SESSION["errors_login"] = $errors;
            header("Location: ../../index.php");
            die();
        }

    } catch (PDOException $e) {
        // Catch and display any PDO exceptions
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // Redirect to index page if accessed without POST method
    header("Location: ../../index.php");
    die();
}