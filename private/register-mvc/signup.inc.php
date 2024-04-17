<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = htmlspecialchars($_POST["username"]);
    $pwd = htmlentities($_POST['pwd']);
    $email = htmlentities($_POST['email']);
    $firstName = htmlentities($_POST['firstName']);
    $lastName = htmlentities($_POST['lastName']);

    try {

        require_once '../dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS 

        $errors = [];

        if (isInputEmpty($username, $pwd, $email, $firstName, $lastName)) {
            $errors['emptyInput'] = 'Fill in all of the fields!';
        }

        if (isEmailInvalid($email)) {
            $errors['invalidEmail'] = 'The email is invalid!';
        }

        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION['errorSignup'] = $errors;
            header('Location: ../../register.php');
            die();
        }

        createUser($pdo, $username, $pwd, $email, $firstName, $lastName);
        header('Location: ../../register.php?signup=success');

        $pdo = null;
        $stmt = null;

        die();
    } catch (Exception $e) {
        if ($e->getCode() == 23000) { // Code for integrity constraint violation (includes unique constraint)
            $errors['takenEmail'] = 'The email is taken!';
            $_SESSION['errorSignup'] = $errors;
            header("Location: ../../register.php");
        } else {
            $errors['connectionError'] = 'Connection error! Please try again later!';
            $_SESSION['errorSignup'] = $errors;
            header("Location: ../../register.php");
        }
        die();
    }

} else {
    header("../../register.php");
    die();
}