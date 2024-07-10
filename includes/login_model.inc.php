<?php

declare(strict_types=1);

function get_use($pdo, $email)
{
    $sql_query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql_query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
