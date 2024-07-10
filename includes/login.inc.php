<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

// Debugging: Log the email and password to error log
    error_log("Debug - Email: $email, Password: $password");

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // Error handlers
        $errors = [];

        if (is_input_empty($email, $password)) {
            $errors["empty_input"] = "Please fill in all fields";
        }

        $result = get_user($pdo, $email);

        if (is_password_wrong($password, $result["password"])) {
            $errors["password_wrong"] = "Password is incorrect";
        }

        require_once 'config_session.inc.php';

        if ($errors) {

            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . " " . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["email"] = $result["email"];

        $_SESSION["last_regeneration"] = time();

        header("Location: ../index.php?login=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

} else {
    header("Location: ../index.php");
    die();
}