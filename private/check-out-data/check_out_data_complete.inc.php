<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        require_once '../dbh.inc.php';
        require_once 'check_out_data_model.inc.php';
        require_once 'check_out_data_view.inc.php';
        require_once 'check_out_data_contr.inc.php';

        $order_id = $_POST['order_id'];

        updateStatus($pdo, $order_id);

        $pdo = null;
        $stmt = null;

        header("Location: ../../check-out-manager.php");

        die();

    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later';
        $_SESSION['errorSignup'] = $errors;
        header("Location: ../../user.php");

        die();
    }
}