<?php

declare(strict_types=1);

/**
 * Retrieves a user's data from the database based on their email.
 *
 * This function prepares and executes a SQL query to fetch a user's information
 * from the 'users' table where the email matches the provided email parameter.
 * It uses prepared statements to prevent SQL injection attacks.
 *
 * @param PDO $pdo The PDO connection object to the database.
 * @param string $email The email address of the user to retrieve.
 * @return array|false Returns an associative array of the user's data if found, false otherwise.
 */
function get_user(PDO $pdo, string $email): false|array
{
    $sql_query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql_query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}