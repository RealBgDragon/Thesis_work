<?php
require_once 'signup_model.inc.php';

function isInputEmpty($username, $pwd, $email, $firstName, $lastName)
{
    return empty($username) || empty($pwd) || empty($email) || empty($firstName) || empty($lastName);
}

function isEmailInvalid($email)
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function handleSignup()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST["username"];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];

        $errors = [];

        if (isInputEmpty($username, $pwd, $email, $firstName, $lastName)) {
            $errors['emptyInput'] = 'Fill in all of the fields!';
        }

        if (isEmailInvalid($email)) {
            $errors['invalidEmail'] = 'The email is invalid!';
        }

        require_once 'private/config_session.inc.php';

        if ($errors) {
            $_SESSION['errorSignup'] = $errors;
            header('Location: register.php');
            exit;
        }

        try {
            setUser($username, $pwd, $email, $firstName, $lastName);
            header('Location: register.php?signup=success');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Code for integrity constraint violation (includes unique constraint)
                $errors['takenEmail'] = 'The email is taken!';
                $_SESSION['errorSignup'] = $errors;
                header("Location: register.php");
                exit;
            } else {
                $errors['connectionError'] = 'Connection error! Please try again later!';
                $_SESSION['errorSignup'] = $errors;
                header("Location: register.php");
                exit;
            }
        }
    }

    return [];
}