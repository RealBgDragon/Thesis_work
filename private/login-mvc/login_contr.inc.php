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







/* function isDataCorrect(object $pdo, string $username, string $pwd)
{
    $userData = checkUser($pdo, $username, $pwd);
    if ($userData->rowCount() > 0) {
        if (password_verify($pwd, $userData['pwd'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function createSession(object $pdo, string $username, string $pwd)
{
    $userData = checkUser($pdo, $username, $pwd);

    require_once '../config_session.inc.php'; //TODO only for now

    $_SESSION['userId'] = $userData['id'];
    $_SESSION['username'] = $userData['username'];
    $_SESSION['account_type'] = $userData['account_type'];

} */