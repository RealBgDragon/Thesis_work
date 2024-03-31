<?php
require_once 'private/config_session.inc.php';
require_once 'private/login-mvc/login_contr.inc.php';
require_once 'private/login-mvc/login_view.inc.php';

$errors = handleLogin();
renderLoginForm($errors);