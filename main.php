<?php
require_once 'private/config_session.inc.php';
require_once 'private/login-mvc/login_view.inc.php';
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
    if (isset ($_GET['login']) && $_GET['login'] == 'success') {
        ?>
        <div class="login-success">Successful login!</div>
        <?php
    }
    ?>
    <main>

        <ul class="list-products">
            <li class="product">
                <a href="product.php?product_id=1" class="product-link">
                    <img src="https://osaka.bg/sites/default/files/klimatik-OSAKA-DSBL_0.JPG" alt="File not found">
                    <h2>Product Name</h2>
                    <p class="price">$100</p>
                    <ul class="characteristics">
                        <li>Characteristic 1</li>
                        <li>Characteristic 2</li>
                    </ul>
                </a>
            </li>
            <li class="product">
                <a href="product.php?product_id=2" class="product-link">
                    <img src="https://osaka.bg/sites/default/files/klimatik-OSAKA-DSBL_0.JPG" alt="File not found">
                    <h2>Product Name</h2>
                    <p class="price">$100</p>
                    <ul class="characteristics">
                        <li>Characteristic 1</li>
                        <li>Characteristic 2</li>
                    </ul>
                </a>
            </li>
            <li class="product">
                <a href="product.php?product_id=1" class="product-link">
                    <img src="https://osaka.bg/sites/default/files/klimatik-OSAKA-DSBL_0.JPG" alt="File not found">
                    <h2>Product Name</h2>
                    <p class="price">$100</p>
                    <ul class="characteristics">
                        <li>Characteristic 1</li>
                        <li>Characteristic 2</li>
                    </ul>
                </a>
            </li>
            <li class="product">
                <a href="product.php?product_id=1" class="product-link">
                    <img src="https://osaka.bg/sites/default/files/klimatik-OSAKA-DSBL_0.JPG" alt="File not found">
                    <h2>Product Name</h2>
                    <p class="price">$100</p>
                    <ul class="characteristics">
                        <li>Characteristic 1</li>
                        <li>Characteristic 2</li>
                    </ul>
                </a>
            </li>
            <li class="product">
                <a href="product.php?product_id=1" class="product-link">
                    <img src="https://osaka.bg/sites/default/files/klimatik-OSAKA-DSBL_0.JPG" alt="File not found">
                    <h2>Product Name</h2>
                    <p class="price">$100</p>
                    <ul class="characteristics">
                        <li>Characteristic 1</li>
                        <li>Characteristic 2</li>
                    </ul>
                </a>
            </li>
        </ul>
    </main>
    <?php include 'footer.php'; ?>
    <script src="main/main.js"></script>
</body>

</html>