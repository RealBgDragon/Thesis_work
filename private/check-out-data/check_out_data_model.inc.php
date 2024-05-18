<?php

function ordersGet(object $pdo)
{

    $sql = "SELECT * FROM orders;";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $orders = [];

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $orders;

}

function updateStatus(object $pdo, int $order_id)
{
    $sql = "UPDATE orders SET status='Finished' WHERE order_id=:order_id;";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);

    $stmt->execute();
}

function getAllProducts($pdo)
{
    $allProducts = [];
    require_once 'private/product/product_model.inc.php';
    $allProducts = getProductBrands($pdo);
    $pdo = null;
    $stmt = null;
    return $allProducts;
}