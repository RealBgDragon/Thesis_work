<?php

function productAdminTemplate($productData, $name_id)
{

    $img = htmlspecialchars($productData['image_url']);

    echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($_GET['product_id']) . "'>";

    echo "<input type='hidden' id='image_url' name='image_url' value='" . htmlspecialchars($productData["image_url"]) . "'>";

    echo "<div class='image-container' id='imageDropZone'>";
    echo "<img id='image_url' class='img-responsive' src='$img' alt='Product Image'>";
    echo "</div>";



    echo "<form action='private/admin-product/product_update.inc.php' method='POST' class='product-info-form'>";

    echo "<div class='dropdown'>";
    echo "<label for='productSelect'>Select Air Conditioner:</label>";
    echo "<select id='productSelect' name='productSelect'>";
    foreach ($name_id as $product) {
        echo "<option value='{$product['product_id']}'>{$product['name']}</option>";
    }
    echo "</select>";
    echo "</div>";

    echo "<div class='form-items'>";

    echo "<div class='form-half'>";

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
    echo "<label for='price'>Price (in lev):</label>";
    echo "<input type='text' id='price' name='price' value='" . htmlspecialchars($productData["price"]) . "'>";

    // Stock quantity
    echo "<label for='stock_quantity'>Stock quantity:</label>";
    echo "<input type='text' id='stock_quantity' name='stock_quantity' value='" . htmlspecialchars($productData["stock_quantity"]) . "'>";

    // Power efficiency
    echo "<label for='power_efficiency'>Power efficiency (B, A, A+):</label>";
    echo "<input type='text' id='power_efficiency' name='power_efficiency' value='" . htmlspecialchars($productData["power_efficiency"]) . "'>";

    // Power consumption heating
    echo "<label for='power_consumption_heating'>Power Consumption (Heating in W):</label>";
    echo "<input type='text' id='power_consumption_heating' name='power_consumption_heating' value='" . htmlspecialchars($productData["power_consumption_heating"]) . "'>";

    // Power consumption cooling
    echo "<label for='power_consumption_cooling'>Power Consumption (Cooling in W):</label>";
    echo "<input type='text' id='power_consumption_cooling' name='power_consumption_cooling' value='" . htmlspecialchars($productData["power_consumption_cooling"]) . "'>";

    // Power output heating
    echo "<label for='power_output_heating'>Power Output (Heating in W):</label>";
    echo "<input type='text' id='power_output_heating' name='power_output_heating' value='" . htmlspecialchars($productData["power_output_heating"]) . "'>";

    // Power output cooling
    echo "<label for='power_output_cooling'>Power Output (Cooling in W):</label>";
    echo "<input type='text' id='power_output_cooling' name='power_output_cooling' value='" . htmlspecialchars($productData["power_output_cooling"]) . "'>";
    echo "</div>";

    echo "<div class='form-half'>";
    // Noice inside
    echo "<label for='noise_inside_unit'>Noice inside (in db):</label>";
    echo "<input type='text' id='noise_inside_unit' name='noise_inside_unit' value='" . htmlspecialchars($productData["noise_inside_unit"]) . "'>";

    // Noice outside
    echo "<label for='noise_outside_unit'>Noice outside (in db):</label>";
    echo "<input type='text' id='noise_outside_unit' name='noise_outside_unit' value='" . htmlspecialchars($productData["noise_outside_unit"]) . "'>";

    // Max temp heating
    echo "<label for='max_temp_heating'>Max temp heating (in C):</label>";
    echo "<input type='text' id='max_temp_heating' name='max_temp_heating' value='" . htmlspecialchars($productData["max_temp_heating"]) . "'>";

    // Min temp heating 
    echo "<label for='min_temp_heating'>Min temp heating (in C):</label>";
    echo "<input type='text' id='min_temp_heating' name='min_temp_heating' value='" . htmlspecialchars($productData["min_temp_heating"]) . "'>";

    // Max temp cooling
    echo "<label for='max_temp_cooling'>Max temp cooling (in C):</label>";
    echo "<input type='text' id='max_temp_cooling' name='max_temp_cooling' value='" . htmlspecialchars($productData["max_temp_cooling"]) . "'>";

    // Min temp cooling
    echo "<label for='min_temp_cooling'>Min temp cooling (in C):</label>";
    echo "<input type='text' id='min_temp_cooling' name='min_temp_cooling' value='" . htmlspecialchars($productData["min_temp_cooling"]) . "'>";

    // Size inside
    echo "<label for='size_inside_unit'>Inside size (format HHxWWxDD):</label>";
    echo "<input type='text' id='size_inside_unit' name='size_inside_unit' value='" . htmlspecialchars($productData["size_inside_unit"]) . "'>";

    // Size outside
    echo "<label for='size_outside_unit'>Outside size (format HHxWWxDD):</label>";
    echo "<input type='text' id='size_outside_unit' name='size_outside_unit' value='" . htmlspecialchars($productData["size_outside_unit"]) . "'>";

    // Max size
    echo "<label for='recommended_room_size'>Max size of room (in cm2):</label>";
    echo "<input type='text' id='recommended_room_size' name='recommended_room_size' value='" . htmlspecialchars($productData["recommended_room_size"]) . "'>";

    // Wi-Fi
    echo "<label for='wifi'>Wi-Fi (true or false, default false):</label>";
    $wifi_status = $productData["wifi"] == 1 ? "True" : "False";
    echo "<input type='text' id='wifi' name='wifi' value='" . $wifi_status . "'>";


    echo "</div>";
    echo "</div>";

    // Description
    echo "<label for='description'>Description:</label>";
    echo "<input type='text' id='description' name='description' value='" . htmlspecialchars($productData["description"]) . "'>";

    echo "</form>";
}
