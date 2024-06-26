<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        require_once 'private/dbh.inc.php';
        require_once 'private/product/product_model.inc.php';
        require_once 'private/product/product_view.inc.php';
        require_once 'private/product/product_contr.inc.php';

        $errors = [];

        if (!isset($_GET['product_id'])) {
            $productId = 1;
            $errors['idNotFound'] = 'Product not found!';
        } else {
            $productId = htmlspecialchars($_GET['product_id']);
        }

        $admin = false;

        $productData = productGet($pdo, $productId);

        if (!$productData) {
            $errors['idNotFound'] = 'Product not found!';
        }

        require_once 'private/config_session.inc.php';

        if ($errors) {
            $_SESSION['errorsProduct'] = $errors;
            header('Location: product.php?product_id=1');
            die();
        }

        if (isset($_SESSION['account_type']) && isUserAdmin($_SESSION['account_type'])) {
            $admin = true;
        }

        productDisplay($productData, $admin);

        $pdo = null;
        $stmt = null;

    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later!';
        $errors['connectionError'] = $e->getCode();
        $_SESSION['errorsProduct'] = $errors;
        header("Location: product.php?product_id=1");
    }
} else {
    header('Location: product.php?product_id=1');
    die();
}