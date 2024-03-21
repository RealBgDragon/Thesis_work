<?php
try {
    require_once 'private/dbh.inc.php';
    require_once 'private/product/product_model.inc.php';
    require_once 'private/cart/cart_view.php';
    require_once 'private/product/product_contr.inc.php';

    require_once 'private/config_session.inc.php';

    $errors = [];

    if (!isset ($_SESSION['cart']) || empty ($_SESSION['cart'])) {
        $errors['idNotFound'] = 'You haven\'t added any products yet';
    }

    if ($errors) {
        $_SESSION['errorsProduct'] = $errors;
        header("Location: all-products.php?error=select");
        die();
    }

    $productData = [];

    foreach ($_SESSION['cart'] as $productId => $item) {
        $product = productGet($pdo, $productId);
        $product['qty'] = $item['qty'];
        $productData[] = $product;
    }
    $totalPrice = 0;

    foreach ($productData as $product) {
        cartProduct($product, $product['qty']);
        $totalPrice += $product['price'] * $product['qty'];
    }

    $_SESSION['totalCartPrice'] = $totalPrice;
    $pdo = null;
    $stmt = null;

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later!';
    $errors['connectionError'] = $e->getCode();
    $_SESSION['errorsProduct'] = $errors;
    header("Location: product.php?product_id=1");
}