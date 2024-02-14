<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once '../product/product_model.inc.php';
        require_once '../product/product_contr.inc.php';

        $newProductId = productCreate($pdo);

        header("Location: ../../admin-product.php?product_id=" . $newProductId . "&success=Product created successfully!");

        $pdo = null;
        $stmt = null;

    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later!';
        $errors['connectionError'] = $e->getCode();
        $_SESSION['errorsProduct'] = $errors;
        header("Location: ../../admin-product.php?product_id=1");
    }
} else {
    header('Location: ../../admin-product.php?product_id=1');
    die();
}