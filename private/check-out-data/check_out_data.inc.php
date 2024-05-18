<?php

try {

    require_once 'private/dbh.inc.php';
    require_once 'check_out_data_model.inc.php';
    require_once 'check_out_data_view.inc.php';
    require_once 'check_out_data_contr.inc.php';

    $orders = [];

    $orders = ordersGet($pdo);

    displayOrders($orders);

    $pdo = null;
    $stmt = null;

    die();

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later';
    $_SESSION['errorSignup'] = $errors;
    header("Location: ../../user.php");

    die();
}
