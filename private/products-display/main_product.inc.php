<?php
require_once 'private/config_session.inc.php';
require_once 'private/dbh.inc.php';
require_once 'private/product/product_model.inc.php';
require_once 'private/products-display/all_products_view.php';
require_once 'private/product/product_contr.inc.php';

try {
    $errors = [];

    // Get all the product data
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

    // Shuffle the product data to get 5 random products
    shuffle($productData);
    $randomProducts = array_slice($productData, 0, 5);

    if (isset($_SESSION['account_type']) && isUserAdmin($_SESSION['account_type'])) {
        $admin = true;
    }

    // Display the 5 random products
    foreach ($randomProducts as $product) {
        productCard($product);
    }

    $pdo = null;
    $stmt = null;

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later!';
    $errors['connectionError'] = $e->getCode();
    $_SESSION['errorsProduct'] = $errors;
    header("Location: product.php?product_id=1");
}
?>