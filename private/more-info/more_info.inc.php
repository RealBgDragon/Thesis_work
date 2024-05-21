<?php
/* 
try { */

require_once 'private/dbh.inc.php';
/* require_once 'private/check-out-data/check_out_data_model.inc.php'; */
require_once 'private/check-out-data/check_out_data_model.inc.php';
require_once 'more_info_view.inc.php';
/* require_once 'check_out_data_contr.inc.php'; */

$orders = [];
$orderId = $_GET['orderId'];
$orderDetails = moreData($pdo, $orderId);
$order = orderData($pdo, $orderId);

displayUserOrders($orderDetails, $order);

$pdo = null;
$stmt = null;

die();

/* } catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later';
    $_SESSION['errorSignup'] = $errors;
    header("Location: user.php");

    die();
}
 */