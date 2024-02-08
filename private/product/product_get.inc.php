<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'product_model.inc.php';
        //require_once 'product_view.inc.php';
        require_once 'product_contr.inc.php';

        $productId = htmlspecialchars($_GET['product_id']);

        $errors = [];

        $productData = productGet($pdo, $productId);

        if (!$productData) {
            $errors['idNotFound'] = 'Id is not found';
        }

        if ($errors) {
            $_SESSION['errorsLogin'] = $errors;
            header('Location: ../../admin-product.php?product_id=1');
            die();
        }
        header("Location: ../../admin-product.php?product_id=" . $productData['product_id']);

        /* require_once '../config_session.inc.php'; */

        $pdo = null;
        $stmt = null;

    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later!';
        $errors['connectionError'] = $e->getCode();
        $_SESSION['errorsAccount'] = $errors;
        header("Location: ../../admin-product.php?product_id=1");
    }
} else {
    header('Location: ../../admin-product.php?product_id=1');
    die();
}