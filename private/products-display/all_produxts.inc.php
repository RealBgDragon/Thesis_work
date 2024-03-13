<?php

try {
    require_once 'private/dbh.inc.php';
    require_once 'private/product/product_model.inc.php';
    require_once 'private/product-display/all_product_view.inc.php';
    require_once 'private/product/product_contr.inc.php';

    $errors = [];

    $productData = allProductsGet($pdo);

    if (!$productData) {
        $errors['idNotFound'] = 'Connection error!';
    }

    require_once 'private/config_session.inc.php';

    if ($errors) {
        $_SESSION['errorsProduct'] = $errors;
        header('Location: product.php?product_id=1');
        die();
    }
    /* header("Location: product.php?product_id=" . $productData['product_id']); */

    if (isset($_SESSION['account_type']) && isUserAdmin($_SESSION['account_type'])) {
        $admin = true;
    }

    /* productDisplay($productData); */

    $pdo = null;
    $stmt = null;

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later!';
    $errors['connectionError'] = $e->getCode();
    $_SESSION['errorsProduct'] = $errors;
    header("Location: product.php?product_id=1");
}