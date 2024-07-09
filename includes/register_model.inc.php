<?php

declare(strict_types=1);

function get_email($pdo ,$email)
{
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function set_user($pdo, $email, $password): void
{
    $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
    try {
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12,
        ];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        // Log error or handle it as per your application's requirement
        error_log("Error inserting user: " . $e->getMessage());
        // For debugging purposes only, remove or modify for production
        echo "Error inserting user: " . $e->getMessage();
    }
}