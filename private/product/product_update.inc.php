<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'account_details_model.inc.php';
        require_once 'account_details_contr.inc.php';




        $stmt = null; // Close the statement
    } catch (Exception $e) {
        if ($e->getCode() == 23000) { // Code for integrity constraint violation (includes unique constraint)
            $errors['takenname'] = 'The product name is taken!';
            $_SESSION['errorsProduct'] = $errors;
            header("Location: ../../user.php");
        } else {
            $errors['connectionError'] = 'Connection error! Please try again later!';
            $errors['connectionError'] = $e->getCode();
            $_SESSION['errorsProduct'] = $errors;
            header("Location: ../../user.php");
        }
        die();
    }

} else {
    header('Location: ../../user.php'); //TODO change later
    die();
}

