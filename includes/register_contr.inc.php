<?php

declare(strict_types=1);

function is_input_empty($email, $password): bool
{
    if (empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}function is_email_invalid($email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function is_email_taken(object $pdo, string $email): bool
{

    if (get_email($pdo, $email)){
        return true;
    } else {
        return false;
    }
}

function register_user($pdo, $email, $password): void
{
    set_user($pdo, $email, $password);
}
