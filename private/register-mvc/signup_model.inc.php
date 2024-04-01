<?php
require_once 'private/dbh.inc.php';

function setUser($username, $pwd, $email, $firstName, $lastName)
{
    global $pdo;
    $query = "INSERT INTO users (username, pwd, email, account_type, firstName, lastName) 
    VALUES (:username, :pwd, :email, :account_type, :firstName, :lastName);";

    $account_type = "client";

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":account_type", $account_type);
    $stmt->bindParam(":firstName", $firstName);
    $stmt->bindParam(":lastName", $lastName);

    $stmt->execute();
}