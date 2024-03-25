<?php

function isInputEmpty($username, $email, $firstName, $lastName)
{
    return empty ($username) || empty ($email) || empty ($firstName) || empty ($lastName);
}

function isNewPasswordSet($pwd)
{
    return !empty ($pwd);
}

function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isNotUserLoggedIn($userId)
{
    return !isset ($userId);
}

function isUserAdmin($admin)
{
    if (isset ($admin) && $admin == "admin") {
        return true;
    } else {
        return false;
    }
}