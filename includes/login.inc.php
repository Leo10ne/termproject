<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'dbh.inc.php'; // This includes the $conn object initialization

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
        echo "Invalid input";
        exit;
    }

    $sql = "SELECT id, email, password FROM users WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login success
            $_SESSION['userid'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("Location: ../index.php?login=success");
            exit();
        } else {
            // Password is not correct
            echo "Invalid password";
            exit();
        }
    } else {
        echo "No user found";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../index.php");
    exit();
}