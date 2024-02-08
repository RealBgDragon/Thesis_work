<?php
function productTemplate($productData)
{
    echo
        "<div class='product-info-div'>",
        "<div class='image-container'>",
        //! Image
        /*  "<img id='productImage' class='img-responsive' src='$img' alt='Product Image'>", */
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
    require_once 'private/product/product_get.inc.php';

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
}