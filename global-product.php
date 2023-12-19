<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="product/product.css" />
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="product-info-form">

        <h1>Product Details</h1>
        <hr>
        <form action='update-product-dbh.inc.php' method='POST' class="product-info-container">
            <?php
            $productData = include 'private/product-details.inc.php'; // Replace with your actual include path
            if (!empty($productData)) {

                // Basic product information
                echo "<label for='name'>Name:</label>";
                echo "<input type='text' id='name' name='name' value='" . htmlspecialchars($productData["name"]) . "'>";

                echo "<label for='model'>Model:</label>";
                echo "<input type='text' id='model' name='model' value='" . htmlspecialchars($productData["model"]) . "'>";

                // ... Add more fields for brand, price, stock_quantity, description, etc.
            
                // Detailed specifications
                echo "<label for='power_consumption_heating'>Power Consumption (Heating):</label>";
                echo "<input type='text' id='power_consumption_heating' name='power_consumption_heating' value='" . htmlspecialchars($productData["power_consumption_heating"]) . "'>";

                // ... Add more fields for each specification like power_consumption_cooling, power_output_heating, etc.
            
                echo "<button type='submit' name='update_product'>Update Product</button>";
            } else {
                echo "<p>No product information found.</p>";
            }
            ?>
        </form>
    </div>


    <?php include 'footer.php'; ?>
</body>

</html>