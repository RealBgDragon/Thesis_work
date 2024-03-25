<?php

try {
    require_once 'private/manage-account/manage_model.inc.php';
    require_once 'private/manage-account/manage_view.inc.php';
    require_once 'private/manage-account/manage_contr.inc.php';
    require_once 'private/dbh.inc.php';

    $errors = [];

    $admin = false;

    $users = getUserNameAndId($pdo);

    if (!$users) {
        $errors['idNotFound'] = 'Connection issue!';
    }

    require_once 'private/config_session.inc.php';

    if ($errors) {
        $_SESSION['errorsProduct'] = $errors;
        header('Location: login.php');
        die();
    }

    if (isset ($_SESSION['account_type']) && isUserAdmin($_SESSION['account_type'])) {
        $admin = true;
    }

    if (isUserAdmin($admin)) {
        display($users);
    }

    $pdo = null;
    $stmt = null;

} catch (Exception $e) {
    $errors['connectionError'] = 'Connection error! Please try again later!';
    $errors['connectionError'] = $e->getCode();
    $_SESSION['errorsLogin'] = $errors;
    header("Location: login.php");
}