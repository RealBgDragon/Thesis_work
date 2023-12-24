<?php
session_start();
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
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="product/product.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Product Details</h1>
        <hr>
        <div class="product-info-div">
            <div class="image-container" id="imageDropZone">
                <?php
                $productData = include 'private/product-details.inc.php'; // Replace with your actual include path
                if (!empty($productData)) {
                    $img = $productData['image_url'];
                    echo "<img src='$img' id='productImage' class='img-responsive'>";
                }
                ?>
            </div>
            <form action='update-product-dbh.inc.php' method='POST' class="product-info-form">
                <?php
                $productData = include 'private/product-details.inc.php'; // Replace with your actual include path
                if (!empty($productData)) {
                    echo "<label for='name'>Name:</label>";
                    echo "<input type='text' id='name' name='name' value='" . htmlspecialchars($productData["name"]) . "'>";

                    echo "<label for='model'>Model:</label>";
                    echo "<input type='text' id='model' name='model' value='" . htmlspecialchars($productData["model"]) . "'>";

                    // ... Add more fields for brand, price, stock_quantity, description, etc.
                
                    // Detailed specifications
                    echo "<label for='power_consumption_heating'>Power Consumption (Heating):</label>";
                    echo "<input type='text' id='power_consumption_heating' name='power_consumption_heating' value='" . htmlspecialchars($productData["power_consumption_heating"]) . "'>";

                    // ... Add more fields for each specification like power_consumption_cooling, power_output_heating, etc.
                
                    echo "<button type='submit' id='update_product' name='update_product'>Update Product</button>";
                } else {
                    echo "<p>No product information found.</p>";
                }
                ?>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script src="product/product.js"></script>
</body>

</html>