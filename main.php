<?php
require_once 'private/config_session.inc.php';
require_once 'private/login-mvc/login_view.inc.php';
require_once 'private/products-display/all_products_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- For the cart -->
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="main/main.css" />
</head>

<body>
    <?php include 'header.php';
    checkLoginErrors(); ?>

    <main>
        <h1 style="margin-left: 20px">Trending items</h1>
        <hr>
        <ul class="list-products">
            <?php
            require 'private/products-display/main_product.inc.php';
            ?>
        </ul>
    </main>
    <?php include 'footer.php'; ?>
    <script src="main/main.js"></script>
</body>

</html>