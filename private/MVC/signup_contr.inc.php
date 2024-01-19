<?php

declare(strict_types=1);

function isInputEmpty($username, $pwd, $email, $firstName, $lastName)
{
    if (empty($username) || empty($pwd) || empty($email) || empty($firstName) || empty($lastName)) {
        return true;
    } else {
        return false;
    }
}

function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}