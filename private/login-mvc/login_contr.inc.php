<?php

function isInputEmpty($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameWrong(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}
function isPasswordWrong(string $pwd, string $hasedPwd)
{
    if (!password_verify($pwd, $hasedPwd)) {
        return true;
    } else {
        return false;
    }
}