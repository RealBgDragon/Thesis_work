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
                // Image
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
                    // Name
                    echo "<label for='name'>Name:</label>";
                    echo "<input type='text' id='name' name='name' value='" . htmlspecialchars($productData["name"]) . "'>";

                    // Model
                    echo "<label for='model'>Model:</label>";
                    echo "<input type='text' id='model' name='model' value='" . htmlspecialchars($productData["model"]) . "'>";

                    // Brand
                    echo "<label for='brand'>Brand:</label>";
                    echo "<input type='text' id='brand' name='brand' value='" . htmlspecialchars($productData["brand"]) . "'>";

                    // Price
                    echo "<label for='price'>Price:</label>";
                    echo "<input type='text' id='price' name='price' value='" . htmlspecialchars($productData["price"]) . "'>";

                    // Stock quantity
                    echo "<label for='stock_quantity'>Stock quantity:</label>";
                    echo "<input type='text' id='stock_quantity' name='stock_quantity' value='" . htmlspecialchars($productData["stock_quantity"]) . "'>";

                    // Description
                    echo "<label for='description'>Description:</label>";
                    echo "<input type='text' id='description' name='description' value='" . htmlspecialchars($productData["description"]) . "'>";

                    // Power efficiency
                    echo "<label for='power_efficiency'>Power efficiency:</label>";
                    echo "<input type='text' id='power_efficiency' name='power_efficiency' value='" . htmlspecialchars($productData["power_efficiency"]) . "'>";

                    // Power consumption heating
                    echo "<label for='power_consumption_heating'>Power Consumption (Heating):</label>";
                    echo "<input type='text' id='power_consumption_heating' name='power_consumption_heating' value='" . htmlspecialchars($productData["power_consumption_heating"]) . "'>";

                    // Power consumption cooling
                    echo "<label for='power_consumption_cooling'>Power Consumption (Cooling):</label>";
                    echo "<input type='text' id='power_consumption_cooling' name='power_consumption_cooling' value='" . htmlspecialchars($productData["power_consumption_cooling"]) . "'>";

                    // Power output heating
                    echo "<label for='power_output_heating'>Power Output (Heating):</label>";
                    echo "<input type='text' id='power_output_heating' name='power_output_heating' value='" . htmlspecialchars($productData["power_output_heating"]) . "'>";

                    // Power output cooling
                    echo "<label for='power_output_cooling'>Power Output (Cooling):</label>";
                    echo "<input type='text' id='power_output_cooling' name='power_output_cooling' value='" . htmlspecialchars($productData["power_output_cooling"]) . "'>";

                    // Noice inside
                    echo "<label for='noise_inside_unit'>Noice inside:</label>";
                    echo "<input type='text' id='noise_inside_unit' name='noise_inside_unit' value='" . htmlspecialchars($productData["noise_inside_unit"]) . "'>";

                    // Noice outside
                    echo "<label for='noise_outside_unit'>Noice outside:</label>";
                    echo "<input type='text' id='noise_outside_unit' name='noise_outside_unit' value='" . htmlspecialchars($productData["noise_outside_unit"]) . "'>";

                    // Max temp heating
                    echo "<label for='max_temp_heating'>Max temp heating (in C):</label>";
                    echo "<input type='text' id='max_temp_heating' name='max_temp_heating' value='" . htmlspecialchars($productData["max_temp_heating"]) . "'>";
                    //! Noice outside
                    echo "<label for='noise_outside_unit'>Noice outside:</label>";
                    echo "<input type='text' id='noise_outside_unit' name='noise_outside_unit' value='" . htmlspecialchars($productData["noise_outside_unit"]) . "'>";
                    // Noice outside
                    echo "<label for='noise_outside_unit'>Noice outside:</label>";
                    echo "<input type='text' id='noise_outside_unit' name='noise_outside_unit' value='" . htmlspecialchars($productData["noise_outside_unit"]) . "'>";
                    // Noice outside
                    echo "<label for='noise_outside_unit'>Noice outside:</label>";
                    echo "<input type='text' id='noise_outside_unit' name='noise_outside_unit' value='" . htmlspecialchars($productData["noise_outside_unit"]) . "'>";


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