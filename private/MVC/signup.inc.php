<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $account_type = $_POST['account_type'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

} else {
    header("../../register.php");
    die();
}