<?php

function addReview($pdo, $productId, $userId, $rating, $comment)
{

    $query = "INSERT INTO users (product_id, user_id, rating, comment) 
    VALUES (:product_id, :user_id, :rating, :comment);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":product_id", $productId);
    $stmt->bindParam(":user_id", $userId);
    $stmt->bindParam(":rating", $rating);
    $stmt->bindParam(":comment", $comment);

    $stmt->execute();

}