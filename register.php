<?php
require_once 'private/config_session.inc.php';
require_once 'private/register-mvc/signup_contr.inc.php';
require_once 'private/register-mvc/signup_view.inc.php';

$errors = handleSignup();
renderSignupForm($errors);