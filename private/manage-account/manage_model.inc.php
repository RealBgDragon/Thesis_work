<?php
function getUserAccountType(object $pdo, int $user_id)
{

    $sql = "SELECT account_type FROM user WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

    $stmt->execute();

    $productData = [];

    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    return $productData;

}

function getUserNameAndId(object $pdo)
{
    $query = "SELECT user_id, name FROM users;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $name_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $name_id;
}