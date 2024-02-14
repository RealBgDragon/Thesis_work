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
    <title>Product Details</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="product/product.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <?php
        // Image
        /* $productData = include 'private/product-details.inc.php'; */// Replace with your actual include path
        
        ?>
        <hr>
        <?php

        require_once 'private/product/product_get.inc.php';

        checkProductErrors();

        ?>

        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>