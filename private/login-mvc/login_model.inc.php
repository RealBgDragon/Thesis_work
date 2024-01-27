<?php

declare(strict_types=1);

function getUser(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/* function checkUser(object $pdo, string $username, string $pwd)
{
    $stmt = $pdo->prepare("SELECT id, username, pwd, account_type FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
} */