<?php

declare(strict_types=1);

/**
 * Retrieves a user's email from the database.
 *
 * This function queries the database for a specific email address to check if it exists.
 * It uses a prepared statement to prevent SQL injection.
 *
 * @param PDO $pdo The PDO connection object to the database.
 * @param string $email The email address to search for in the database.
 * @return array|false Returns an associative array of the user's email if found, false otherwise.
 */
function get_email(PDO $pdo, string $email): false|array
{
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Inserts a new user into the database.
 *
 * This function adds a new user with their email and password to the database.
 * The password is hashed using bcrypt for security before being inserted.
 * It uses a prepared statement to prevent SQL injection.
 * Errors during insertion are caught and logged.
 *
 * @param PDO $pdo The PDO connection object to the database.
 * @param string $email The email of the new user.
 * @param string $password The password of the new user.
 * @return void
 */
function set_user(PDO $pdo, string $email, string $password): void
{
    $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
    try {
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12,
        ];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();
    } catch (PDOException $e) {
        // Log error or handle it as per your application's requirement
        error_log("Error inserting user: " . $e->getMessage());
        // For debugging purposes only, remove or modify for production
        echo "Error inserting user: " . $e->getMessage();
    }
}