<?php

declare(strict_types=1);

/**
 * Checks if the provided email and password inputs are empty.
 *
 * This function logs the state of the inputs (empty or not) and returns a boolean value.
 * It is used to validate that the user has entered both an email and a password before attempting to log in.
 *
 * @param string $email The user's email input.
 * @param string $password The user's password input.
 * @return bool Returns true if either the email or password is empty, false otherwise.
 */
function is_input_empty(string $email, string $password): bool
{
    if (empty($email) || empty($password)) {
        error_log("Inputs are empty");
        return true;
    } else {
        error_log("Inputs are not empty");
        return false;
    }
}

/**
 * Verifies if the provided password matches the hashed password.
 *
 * This function uses PHP's password_verify function to check if the provided password matches the hashed password.
 * It logs the result of the verification for debugging purposes.
 *
 * @param string $password The plain text password input by the user.
 * @param string $hashed_password The hashed password retrieved from the database.
 * @return bool Returns true if the password does not match the hashed password, false if it matches.
 */
function is_password_wrong(string $password, string $hashed_password): bool
{
    // Debugging: Log the password and hashed password
    error_log("Password: $password");
    error_log("Hashed: $hashed_password");

    if (!password_verify($password, $hashed_password)) {
        error_log("Password is wrong");
        return true;
    } else {
        error_log("Password is correct");
        return false;
    }
}