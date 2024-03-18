<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $qty = $_POST['qty'];

    require_once './config_session.inc.php';

    // Remove the current product from the cart

    unset($_SESSION['cart'][$productId]);

    // Redirect with a success message
    header('Location: ../cart.php?error=success');
    exit();
}