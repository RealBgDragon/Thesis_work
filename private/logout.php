<?php
session_start();
session_unset();
session_destroy();

$redirect = '../login.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $redirect = $_SERVER['HTTP_REFERER'];
}

header('Location: ' . $redirect);
exit();