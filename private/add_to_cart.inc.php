<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $productId = $_POST['product_id'];
    $qty = $_POST['qty'];

    require_once './config_session.inc.php';

    if ($_SESSION['selectedProduct'] == $productId) {
        $qty = $_SESSION['qty'] + $qty;
    }

    $_SESSION['selectedProduct'] = $productId;

    $_SESSION['qty'] = $qty;

    header('Location: ../all-products.php?error=success');
    exit();
}