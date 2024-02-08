<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'product_model.inc.php';
        require_once 'product_contr.inc.php';




        $stmt = null; // Close the statement
    } catch (Exception $e) {

    }

} else {
    header('Location: ../../user.php'); //TODO change later
    die();
}

