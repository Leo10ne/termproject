<?php

declare(strict_types=1);

function is_input_empty($email, $password): bool
{
    if (empty($email) || empty($password)) {
        error_log("Inputs are empty");
        return true;
    } else {
        error_log("Inputs are not empty");
        return false;
    }
}


function is_password_wrong($password, $hashed_password): bool
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