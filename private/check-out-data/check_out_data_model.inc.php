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

function moreData(object $pdo, string $orderId)
{

    $sql = "SELECT name, email, address, city, country FROM orders WHERE order_id=:orderId;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $orders;

}

function orderData(object $pdo, string $orderId)
{

    $sql = "SELECT name, email, address, city, country FROM orders WHERE order_id=:orderId;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $order;

}