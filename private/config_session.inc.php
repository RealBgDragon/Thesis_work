<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'path' => '/',
    'secure' => false, //change to false for presentation purposes
    'httponly' => true,
]);


session_start();

if (isset($_SESSION['userId'])) {

    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id_loggedin();
    } else {
        $interva = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interva) {
            regenerate_session_id_loggedin();
        }
    }
} else {
    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id();
    } else {
        $interva = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interva) {
            regenerate_session_id();
        }
    }
}

function regenerate_session_id_loggedin()
{
    session_regenerate_id(true);

    $userId = $_SESSION['userId'];

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id()
{
    session_regenerate_id();
    $_SESSION['last_regeneration'] = time();

}