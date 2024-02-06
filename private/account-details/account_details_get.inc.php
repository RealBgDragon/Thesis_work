<?php

require_once 'private/account-details/account_details_model.inc.php';
require_once 'private/account-details/account_details_contr.inc.php';


require_once 'private/config_session.inc.php';
require_once 'private/dbh.inc.php';

$userId = $_SESSION['userId'];

$userData = getUser($pdo, $userId);