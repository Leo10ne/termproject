<?php

global $pdo;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

//    error_log("Debug - Email: $email, Password: $password");

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";
        require_once 'config_session.inc.php';

        $errors = [];

        if (is_input_empty($email, $password)) {
            $errors["empty_input"] = "Please fill in all fields";
        } else {
            $result = get_use($pdo, $email);

            if (!$result) {
                $errors["user_not_found"] = "No user found with that email";
            } else {
                if (is_password_wrong($password, $result["password"])) {
                    $errors["password_wrong"] = "Password is incorrect";
                } else {
                    // login success logic
                    session_regenerate_id();

                    $_SESSION["user_id"] = $result["id"];
                    $_SESSION["email"] = htmlspecialchars($result["email"]);

                    $_SESSION["last_regeneration"] = time();

                    header("Location: ../index.php?login=success");
                    die();
                }
            }
        }

        if (!empty($errors)) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    die();
}