<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try {
        require_once('../dbh.inc.php');
        require_once('login_model.inc.php');
        require_once('login_contr.inc.php');

        $errors = [];

        if (isInputEmpty($username, $pwd)) {
            $errors['emptyInput'] = 'Fill in all of the fields!';
        }

        $result = getUser($pdo, $username);

        if (isUsernameWrong($result)) {
            $errors["login_incorrect"] = "Wrong username or password";
        }

        if (!isUsernameWrong($result) && isPasswordWrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Wrong username or password";
        }

        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION["errorsLogin"] = $errors;
            header("Location: ../../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["userId"] = $result["id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);
        $_SESSION["account_type"] = $result["account_type"];

        $_SESSION["last_regeneration"] = time();
        header("Location: ../../main.php?login=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later';
        $_SESSION['errorSignup'] = $errors;
        header("Location: ../../register.php");

        die();
    }
} else {
    header("Location: ../../login.php");
    die();
}