<?php

function searchProducts($pdo, $query)
{
    $sql = "SELECT * FROM products WHERE name LIKE :query OR model LIKE :query OR brand LIKE :query OR description LIKE :query";
    $stmt = $pdo->prepare($sql);
    $query = "%$query%";
    $stmt->bindParam(':query', $query, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
