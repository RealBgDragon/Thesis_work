<?php
require_once 'private/config_session.inc.php';
require_once 'private/product/product_view.inc.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="all-products/all-products.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Products</h1>
        <hr>

        <?php
        require_once 'private/products-display/all_products.inc.php';
        ?>

    </main>
    <?php include 'footer.php'; ?>
    <script src="all-products/all-products.js"></script>
</body>

</html>