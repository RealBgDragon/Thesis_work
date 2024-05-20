<?php
require_once 'private/config_session.inc.php';
require_once 'private/check-out-data/check_out_data_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="check-out-manager/check-out-manager.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>

        <?php
        if ($_SESSION['account_type'] != 'admin') {
            header('Location: user.php?error=You dont have premissions to view this page!');
        }
        require_once 'private/more-info/more_info.inc.php';
        ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>