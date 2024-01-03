<?php
session_start();
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
        $productData = include 'private/product-details.inc.php'; // Replace with your actual include path
        $img = $productData['image_url'];
        echo "<h1 id='productName'>" . htmlspecialchars($productData['name']) . "</h1>";
        ?>
        <hr>
        <?php
        if (!empty($productData)) {
            // Display product details
            echo
                "<div class='product-info-div'>",
                "<div class='image-container'>",
                // Image
                "<img id='productImage' class='img-responsive' src='$img' alt='Product Image'>",
                "</div>",
                "<div class='price-box'>",
                // Price
                "<p id='productPrice'>" . htmlspecialchars($productData["price"]) . "</p>",
                "</div>",
                "</div>";
            echo "<div class='product-details'>";
            // Model
            echo "<p><strong>Model:</strong> " . htmlspecialchars($productData["model"]) . "</p>";

            // Brand
            echo "<p><strong>Brand:</strong> " . htmlspecialchars($productData["brand"]) . "</p>";

            // Price
            echo "<p><strong>Price:</strong> " . htmlspecialchars($productData["price"]) . "</p>";

            // Description
            echo "<p><strong>Description:</strong> " . htmlspecialchars($productData["description"]) . "</p>";

            // Stock quantity
            echo "<p><strong>Stock Quantity:</strong> " . htmlspecialchars($productData["stock_quantity"]) . "</p>";

            // Power efficiency
            echo "<p><strong>Power Efficiency:</strong> " . htmlspecialchars($productData["power_efficiency"]) . "</p>";

            // Power consumption heating
            echo "<p><strong>Power Consumption (Heating):</strong> " . htmlspecialchars($productData["power_consumption_heating"]) . "</p>";

            // Power consumption cooling
            echo "<p><strong>Power Consumption (Cooling):</strong> " . htmlspecialchars($productData["power_consumption_cooling"]) . "</p>";

            // Power output heating
            echo "<p><strong>Power Output (Heating):</strong> " . htmlspecialchars($productData["power_output_heating"]) . "</p>";

            // Power output cooling
            echo "<p><strong>Power Output (Cooling):</strong> " . htmlspecialchars($productData["power_output_cooling"]) . "</p>";

            // Noise inside
            echo "<p><strong>Noise Inside:</strong> " . htmlspecialchars($productData["noise_inside_unit"]) . "</p>";

            // Noise outside
            echo "<p><strong>Noise Outside:</strong> " . htmlspecialchars($productData["noise_outside_unit"]) . "</p>";

            // Max temp heating
            echo "<p><strong>Max Temp Heating (in C):</strong> " . htmlspecialchars($productData["max_temp_heating"]) . "</p>";

            // Min temp heating
            echo "<p><strong>Min Temp Heating:</strong> " . htmlspecialchars($productData["min_temp_heating"]) . "</p>";

            // Max temp cooling
            echo "<p><strong>Max Temp Cooling:</strong> " . htmlspecialchars($productData["max_temp_cooling"]) . "</p>";

            // Min temp cooling
            echo "<p><strong>Min Temp Cooling:</strong> " . htmlspecialchars($productData["min_temp_cooling"]) . "</p>";

            // Size inside
            echo "<p><strong>Inside Size:</strong> " . htmlspecialchars($productData["size_inside_unit"]) . "</p>";

            // Size outside
            echo "<p><strong>Outside Size:</strong> " . htmlspecialchars($productData["size_outside_unit"]) . "</p>";

            // Max size of room
            echo "<p><strong>Max Size of Room:</strong> " . htmlspecialchars($productData["recommended_room_size"]) . "</p>";

            // Wi-Fi
            $wifi_status = $productData["wifi"] == 1 ? "True" : "False";
            echo "<p><strong>Wi-Fi:</strong> " . $wifi_status . "</p>";

            echo "</div>";

            if ($_SESSION['account_type'] == "admin") {
                echo "<a href='admin-product.php' id='update_product' name='update_product'>Update Product</a>";
            }

        } else {
            echo "<p>No product information found.</p>";
        }
        ?>

        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>