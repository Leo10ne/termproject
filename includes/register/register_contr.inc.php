<?php

declare(strict_types=1);

/**
 * Checks if either email or password input is empty.
 *
 * @param string $email The email input from the user.
 * @param string $password The password input from the user.
 * @return bool Returns true if either email or password is empty, false otherwise.
 */
function is_input_empty(string $email, string $password): bool
{
    if (empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Validates the email format.
 *
 * @param string $email The email input from the user.
 * @return bool Returns true if the email is invalid, false otherwise.
 */
function is_email_invalid(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks if the provided email is already taken/exists in the database.
 *
 * @param PDO $pdo The PDO connection object to the database.
 * @param string $email The email to check in the database.
 * @return bool Returns true if the email is already taken, false otherwise.
 */
function is_email_taken(PDO $pdo, string $email): bool
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Validates the password based on specific criteria.
 *
 * This function checks if the password meets the following conditions:
 * - It must be more than 5 characters long.
 * - It must contain at least one numeric character.
 *
 * @param string $password The password to validate.
 * @return bool Returns true if the password meets the criteria, false otherwise.
 */
function is_password_valid(string $password): bool
{
    $lengthCondition = strlen($password) > 5; // Check if password is more than 5 characters
    $numberCondition = preg_match('/\d/', $password) === 1; // Check if password contains at least one number

    return $lengthCondition && $numberCondition; // Return true if both conditions are met
}

/**
 * Registers a new user with the provided email and password.
 *
 * @param PDO $pdo The PDO connection object to the database.
 * @param string $email The email of the new user.
 * @param string $password The password of the new user.
 * @return void
 */
function register_user(PDO $pdo, string $email, string $password): void
{
    set_user($pdo, $email, $password);
}