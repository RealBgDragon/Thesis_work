<?php
require_once 'login_model.inc.php';

function isInputEmpty($username, $pwd)
{
    return empty ($username) || empty ($pwd);
}

function isUsernameWrong($result)
{
    return !$result;
}

function isPasswordWrong(string $pwd, string $hashedPwd)
{
    return !password_verify($pwd, $hashedPwd);
}

function handleLogin()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];

        $errors = [];

        if (isInputEmpty($username, $pwd)) {
            $errors['emptyInput'] = 'Fill in all of the fields!';
        }

        $result = getUser($username);

        if (isUsernameWrong($result)) {
            $errors["login_incorrect"] = "Wrong username or password";
        } elseif (isPasswordWrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Wrong username or password";
        } else {
            require_once 'private/config_session.inc.php';

            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["id"];
            session_id($sessionId);

            $_SESSION["userId"] = $result["id"];
            $_SESSION["username"] = htmlspecialchars($result["username"]);
            $_SESSION["account_type"] = $result["account_type"];

            $_SESSION["last_regeneration"] = time();
            header("Location: main.php?login=success");
            exit;
        }

        return $errors;
    }

    return [];
}