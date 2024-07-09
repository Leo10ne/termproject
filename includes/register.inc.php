<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "dbh.inc.php";
        require_once "register_model.inc.php";
        require_once "register_contr.inc.php";

        // Error handlers
        $errors = [];

        if (is_input_empty($email, $password)) {
            $errors["empty_input"] = "Please fill in all fields";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Please enter a valid email";
        }
        if (is_email_taken($pdo, $email)) {
            $errors["email_taken"] = "Email is already taken";
        }
        require_once 'config_session.inc.php';
        if ($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

    } catch (Exception $e) {
        die("Connection failed: " . $e->getMessage());

    }
} else {
    header("Location: ../index.php");
    die();
}