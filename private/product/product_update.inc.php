<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'product_model.inc.php';
        require_once 'product_contr.inc.php';




        $stmt = null; // Close the statement
    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later!';
        $errors['connectionError'] = $e->getCode();
        $_SESSION['errorsProduct'] = $errors;
        header("Location: ../../admin-product.php?product_id=1");
    }

} else {
    header('Location: ../../user.php'); //TODO change later
    die();
}

