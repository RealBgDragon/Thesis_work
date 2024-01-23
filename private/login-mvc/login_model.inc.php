<?php

declare(strict_types=1);

function checkUser(object $pdo, string $username, string $pwd)
{
    $stmt = $pdo->prepare("SELECT id, username, pwd, account_type FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}