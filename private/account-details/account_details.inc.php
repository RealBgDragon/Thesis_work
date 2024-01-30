<?php


try {

    require_once '../dbh.inc.php';
    require_once 'account_details_model.inc.php';
    require_once 'account_details_contr.inc.php';

    $errors = [];


    if (isUserLoggedIn()) {
        $errors['userNotLoggedIn'] = 'Please log into an account!';
    }

    require_once '../config_session.inc.php';

    $userId = $_SESSION['userId'];

    $result = getUser($pdo, $userId);

    if ($errors) {
        $_SESSION['errorsAccount'] = $errors;
        header('Location: ../../user.php');
        die();
    }

    $pdo = null;
    $stmt = null;

    die();

} catch (Exception $e) {
    echo $e->getMessage();
}