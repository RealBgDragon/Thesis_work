<?php

require_once 'private/account-details/account_details_model.inc.php';
require_once 'private/account-details/account_details_view.inc.php';
require_once 'private/account-details/account_details_contr.inc.php';

try {
    require_once 'private/config_session.inc.php';
    require_once 'private/dbh.inc.php';

    $errors = [];

    $userId = $_SESSION['userId'];
    $users = [];
    $admin = false;

    if (isNotUserLoggedIn($userId)) {
        $errors['userNotLoggedIn'] = 'You need to login to an account to acces your data!';
    }

    if ($errors) {
        $_SESSION['errorsLogin'] = $errors;
        header('Location: login.php');
        die();
    }

    if (isset ($_SESSION['account_type']) && isUserAdmin($_SESSION['account_type'])) {
        $admin = true;
        $users = getUserNameAndId($pdo);
    }

    $userData = getUser($pdo, $userId);

    outputUserInfo($userData, $admin, $users);

    $pdo = null;
    $stmt = null;

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later!';
    $errors['connectionError'] = $e->getCode();
    $_SESSION['errorsLogin'] = $errors;
    header("Location: login.php");
}