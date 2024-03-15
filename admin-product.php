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
    <title>Product update</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="admin-product/admin-product.css" />
</head>

<body>
    <?php include 'header.php';
    if (!isset($_SESSION['account_type']) || $_SESSION['account_type'] != "admin") {
        echo "<p style='color:red'> You do not have premission to view this page. Please return to home page:</p>";
        echo "<a href=main.php style='color:red'>Home</a>";
        die();
    }
    ?>
    <main>
        <h1>Product Details</h1>
        <hr>

        <div class="overlay" id="overlay"></div>

        <div class="popup" id="delete-popup" style="display: none">
            <h2>Are you sure you want to delete the current product?</h2>
            <div class="popup-buttons" style="display:flex">
                <button name="close-windows" id="close-delete-popup">Cancel</button>
                <form action='private/admin-product/product_delete.inc.php' method='POST' class="product-create-form">
                    <input type='hidden' name='product_id' value='<?php echo htmlspecialchars($_GET["product_id"]); ?>'>
                    <button type="submit" name="delete_product" style="background-color: red">Delete the
                        product</button>
                </form>
            </div>
        </div>


        <div class="popup" id="create-popup" style="display: none">
            <h2>Are you sure you want to crate a new product?</h2>
            <div class="popup-buttons" style="display:flex">
                <button name="close-windows" id="close-create-popup">Cancel</button>
                <form action='private/admin-product/product_create.inc.php' method='POST' class="product-create-form">
                    <button type="submit" name="create_product">Create New Product</button>
                </form>
            </div>
        </div>



        <button id="delete-product" name="delete_product" style="background-color:red">Delete Product</button>

        <button id="create-product" name="create_product">Create New Product</button>

        <div class="product-info-div">


            <?php

            require_once 'private/admin-product/product_get_admin.inc.php';

            if (isset($_GET['update'])) {
                $updateMessage = htmlspecialchars($_GET['update']);
                echo "<div style='color: green; text-align: center;'>" . $updateMessage . "</div>";
            }

            checkProductErrors();



            // echo "<button onclick='location.href='yourpage.php?newproduct=true''>Create New Product</button>"; 
            
            ?>

        </div>

    </main>
    <?php include 'footer.php'; ?>
    <script src="admin-product/admin-product.js"></script>
</body>

</html>