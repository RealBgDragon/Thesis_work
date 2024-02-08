<?php

require_once 'private/account-details/account_details_model.inc.php';
require_once 'private/account-details/account_details_view.inc.php';
require_once 'private/account-details/account_details_contr.inc.php';

try {
    require_once 'private/config_session.inc.php';
    require_once 'private/dbh.inc.php';

    $errors = [];

    $userId = $_SESSION['userId'];



    if (isNotUserLoggedIn($userId)) {
        $errors['userNotLoggedIn'] = 'You need to login to an account to acces your data!';
    }

    if ($errors) {
        $_SESSION['errorsLogin'] = $errors;
        header('Location: login.php');
        die();
    }

    $userData = getUser($pdo, $userId);

    outputUserInfo($userData);

    $pdo = null;
    $stmt = null;

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later!';
    $errors['connectionError'] = $e->getCode();
    $_SESSION['errorsLogin'] = $errors;
    header("Location: login.php");
}