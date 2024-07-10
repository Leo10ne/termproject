<?php

global $pdo;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "dbh.inc.php";
    require_once "register_model.inc.php";
    require_once "register_contr.inc.php";
    require_once 'config_session.inc.php';

    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = [];

    if (is_input_empty($email, $password)) {
        $errors["empty_input"] = "Please fill in all fields";
    } elseif (is_email_invalid($email)) {
        $errors["invalid_email"] = "Please enter a valid email";
    } elseif (is_email_taken($pdo, $email)) {
        $errors["email_taken"] = "Email is already taken";
    } else {
        register_user($pdo, $email, $password);
        header("Location: ../index.php?signup=success");
        die();
    }

    if ($errors) {
        $_SESSION["errors_signup"] = $errors;

        header("Location: ../index.php");
        die();
    }
} else {
    header("Location: ../index.php");
    die();
}