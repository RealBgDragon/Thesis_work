<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $pwd = $_POST['newPassword'];

        require_once '../dbh.inc.php';
        require_once 'account_details_model.inc.php';
        require_once 'account_details_contr.inc.php';

        $errors = [];

        require_once '../config_session.inc.php';

        $userId = $_SESSION['userId'];


        if (!isset($userId)) {
            $errors['userNotLoggedIn'] = 'Please log into an account!';
        }

        if (isInputEmpty($username, $email, $firstName, $lastName)) {
            $errors['emptyInput'] = 'Fill in all of the fields!';
        }

        if (isEmailInvalid($email)) {
            $errors['invalidEmail'] = 'The email is invalid!';
        }

        if ($errors) {
            $_SESSION['errorsAccount'] = $errors;
            header('Location: ../../user.php');
            die();
        }

        if (isNewPasswordSet($pwd)) {
            updatePassword($pdo, $userId, $pwd);
        }
        updateUser($pdo, $userId, $username, $email, $firstName, $lastName);


        header('Location: ../../user.php?update=success');

        $pdo = null;
        $stmt = null;

        die();

    } catch (Exception $e) {
        if ($e->getCode() == 23000) { // Code for integrity constraint violation (includes unique constraint)
            $errors['takenEmail'] = 'The email is taken!';
            $_SESSION['errorsAccount'] = $errors;
            header("Location: ../../user.php");
        } else {
            $errors['connectionError'] = 'Connection error! Please try again later!';
            $errors['connectionError'] = $e->getCode();
            $_SESSION['errorsAccount'] = $errors;
            header("Location: ../../user.php");
        }
        die();
    }
} else {
    header('Location: ../../user.php');
    die();
}