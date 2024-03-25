<?php

declare(strict_types=1);

function getUser(object $pdo, int $userId)
{
    $query = "SELECT * FROM users WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $userId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function updateUser(object $pdo, int $userId, string $username, string $email, string $firstName, string $lastName)
{

    $query = "UPDATE users SET username = :username, email = :email, firstName = :firstName, lastName = :lastName WHERE id = :userId;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":firstName", $firstName);
    $stmt->bindParam(":lastName", $lastName);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);

    $stmt->execute();
}

function updatePassword(object $pdo, int $userId, string $pwd)
{
    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $query = "UPDATE users SET pwd=:hashedPwd WHERE id= :userId;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":hashedPwd", $hashedPwd);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);

    $stmt->execute();
}

function getUserNameAndId(object $pdo)
{
    $query = "SELECT user_id, name FROM users;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $name_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $name_id;
}