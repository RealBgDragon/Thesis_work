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

        $productData = productGet($pdo, $productId);
        $name_id = getProductNamesAndId($pdo);

        if (!$productData) {
            $errors['idNotFound'] = 'Product not found!';
        }

        if (!isUserAdmin($_SESSION['account_type'])) {
            $errors['ivalidPermissions'] = 'You are not logged in as an admin!';
        }

        require_once 'private/config_session.inc.php';

        if ($errors) {
            $_SESSION['errorsProduct'] = $errors;
            header('Location: product.php?product_id=1');
            die();
        }

        productAdminTemplate($productData, $name_id);

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