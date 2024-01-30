<?php
require_once 'private/config_session.inc.php';
require_once 'private/dbh.inc.php';
require_once 'private/account-details/account_details_model.inc.php';
require_once 'private/account-details/account_details_contr.inc.php';
require_once 'private/account-details/account_details_view.inc.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="user/user.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="user-info-form">
            <h1>Account</h1>
            <hr>
            <?php
            $userId = $_SESSION['userId'] ?? null;
            if ($userId) {
                displayUser($pdo, $userId);
            } else {
                checkAccountErrors();
            }
            ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>