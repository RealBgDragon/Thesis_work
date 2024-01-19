<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $account_type = $_POST['account_type'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    try {

        require_once '../dbh.inc.php';
        require_once 'signup_model.inc.php';
        //require_once 'signup_view.inc.php';
        require_once 'signup_contr.inc.php';

        // ERRPR HANDLERS 

        $errors = [];

        if (isInputEmpty($username, $pwd, $email, $firstName, $lastName)) {
            $errors['emptyInput'] = 'Fill in all of the fields!';
            die();
        }

        if (isEmailInvalid($email)) {
            $errors['invalidEmail'] = 'The email is invalid!';
            die('');
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errorSignup'] = $errors;
            header('../../register.php');
        }

        //TODO don't forget about the user error handling from the server (add the user responce)

    } catch (Exception $e) {
        die('Query failed: ' . $e->getMessage());
    }

} else {
    header("../../register.php");
    die();
}