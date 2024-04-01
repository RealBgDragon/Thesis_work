<?php

require_once '../product/product_model.inc.php';

function checkOut($pdo, $userId, $orderDate, $totalPrice, $status, $checkOutInfo, $products, $cardInfo)
{

    $stmt = $pdo->prepare("INSERT INTO orders (userId, orderDate, totalPrice, status, name, email, address, city, state, zip, country) VALUES (:userId, :orderDate, :totalPrice, :status, :name, :email, :address, :city, :state, :zip, :country)");

    // Binding common parameters
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':orderDate', $orderDate, PDO::PARAM_STR);
    $stmt->bindValue(':totalPrice', $totalPrice, PDO::PARAM_STR);
    $stmt->bindValue(':status', $status, PDO::PARAM_STR);
    foreach ($checkOutInfo as $key => $value) {
        $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();


    $orderId = $pdo->lastInsertId();
    $paymentStatus = 'pending';

    $stmt = $pdo->prepare("INSERT INTO payment_info (order_id, card_number, card_expiry, cvv, payment_status) VALUES (:orderId, :cardNumber, :expiryDate, :cvv, :paymentStatus)");
    $stmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->bindValue(':cardNumber', $cardInfo['cardNumber'], PDO::PARAM_STR);
    $stmt->bindValue(':expiryDate', $cardInfo['expiryDate'], PDO::PARAM_STR);
    $stmt->bindValue(':cvv', $cardInfo['cvv'], PDO::PARAM_STR);
    $stmt->bindValue(':paymentStatus', $paymentStatus, PDO::PARAM_STR);
    $stmt->execute();

    // Insert into the order_details table
    foreach ($_SESSION['cart'] as $productId => $item) {
        $product = productGet($pdo, $productId);
        $quantity = $item['qty'];
        $price = $product['price'];

        $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:orderId, :productId, :quantity, :price)");
        $stmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->execute();
    }
}