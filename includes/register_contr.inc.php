<?php

declare(strict_types=1);

function is_input_empty($email, $password)
{
    if (empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}function is_email_invalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function is_email_taken($pdo, $email){

    if (get_email($pdo, $email)){
        return true;
    } else {
        return false;
    }
}

