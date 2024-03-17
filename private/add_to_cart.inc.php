<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $qty = $_POST['qty'];

    require_once './config_session.inc.php';

    // Check if the product is already in the session
    if (isset ($_SESSION['cart'][$productId])) {
        // If it is, update the quantity
        $_SESSION['cart'][$productId]['qty'] += $qty;
    } else {
        // If not, add the product to the session
        $_SESSION['cart'][$productId] = array(
            'qty' => $qty
        );
    }

    // Redirect with a success message
    header('Location: ../all-products.php?error=success');
    exit();
}