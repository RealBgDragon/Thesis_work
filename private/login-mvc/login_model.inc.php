<?php
require_once 'private/dbh.inc.php';

function getUser(string $username)
{
    global $pdo;
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}