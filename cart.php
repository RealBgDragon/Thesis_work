<?php
require_once 'private/config_session.inc.php';
require_once 'private/product/product_view.inc.php';
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
    <link rel="stylesheet" href="cart/cart.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>

        <?php
        require_once 'private/cart/cart.inc.php';
        checkCartErrors();
        ?>

    </main>
    <?php include 'footer.php'; ?>
    <script src="cart/cart.js"></script>
</body>

</html>