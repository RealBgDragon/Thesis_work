<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'product_model.inc.php';
        require_once 'product_contr.inc.php';

        $product_id = $_POST['product_id'];

        productDelete($pdo, $product_id);

        require_once '../config_session.inc.php';
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