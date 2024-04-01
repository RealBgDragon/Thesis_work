<?php
function productTemplate($productData, $admin)
{
    $img = htmlspecialchars($productData["image_url"]);
    $product_id = htmlspecialchars($_GET["product_id"]);
    $wifi_status = $productData["wifi"] == 1 ? "True" : "False";
    ?>
    <div class='product-info-div'>
        <div class='image-container'>
            <!-- Image -->
            <img id='productImage' class='img-responsive' src='<?= $img ?>' alt='Product Image'>
        </div>
        <div class='price-box'>
            <!-- Price -->
            <p id='productPrice'>
                <?= htmlspecialchars($productData["price"]) ?>
            </p>

            <form action='private/add_to_cart.inc.php' method='POST'>
                <input type='hidden' name='product_id' value='<?= $product_id ?>'>
                <input type='number' name='qty' maxlength='2' min='1' value='1' max='99' required class='qty'>
                <input type='submit' value='Add to cart' name='add_to_cart' class='add-to-cart'>
            </form>
        </div>
    </div>
    <div class='product-details'>
        <!-- Product Details -->
        <p><strong>Model:</strong>
            <?= htmlspecialchars($productData["model"]) ?>
        </p>
        <p><strong>Brand:</strong>
            <?= htmlspecialchars($productData["brand"]) ?>
        </p>
        <p><strong>Price:</strong>
            <?= htmlspecialchars($productData["price"]) ?>
        </p>
        <p><strong>Description:</strong>
            <?= htmlspecialchars($productData["description"]) ?>
        </p>
        <p><strong>Stock Quantity:</strong>
            <?= htmlspecialchars($productData["stock_quantity"]) ?>
        </p>
        <p><strong>Power Efficiency:</strong>
            <?= htmlspecialchars($productData["power_efficiency"]) ?>
        </p>
        <p><strong>Power Consumption (Heating):</strong>
            <?= htmlspecialchars($productData["power_consumption_heating"]) ?>
        </p>
        <p><strong>Power Consumption (Cooling):</strong>
            <?= htmlspecialchars($productData["power_consumption_cooling"]) ?>
        </p>
        <p><strong>Power Output (Heating):</strong>
            <?= htmlspecialchars($productData["power_output_heating"]) ?>
        </p>
        <p><strong>Power Output (Cooling):</strong>
            <?= htmlspecialchars($productData["power_output_cooling"]) ?>
        </p>
        <p><strong>Noise Inside:</strong>
            <?= htmlspecialchars($productData["noise_inside_unit"]) ?>
        </p>
        <p><strong>Noise Outside:</strong>
            <?= htmlspecialchars($productData["noise_outside_unit"]) ?>
        </p>
        <p><strong>Max Temp Heating (in C):</strong>
            <?= htmlspecialchars($productData["max_temp_heating"]) ?>
        </p>
        <p><strong>Min Temp Heating:</strong>
            <?= htmlspecialchars($productData["min_temp_heating"]) ?>
        </p>
        <p><strong>Max Temp Cooling:</strong>
            <?= htmlspecialchars($productData["max_temp_cooling"]) ?>
        </p>
        <p><strong>Min Temp Cooling:</strong>
            <?= htmlspecialchars($productData["min_temp_cooling"]) ?>
        </p>
        <p><strong>Inside Size:</strong>
            <?= htmlspecialchars($productData["size_inside_unit"]) ?>
        </p>
        <p><strong>Outside Size:</strong>
            <?= htmlspecialchars($productData["size_outside_unit"]) ?>
        </p>
        <p><strong>Max Size of Room:</strong>
            <?= htmlspecialchars($productData["recommended_room_size"]) ?>
        </p>
        <p><strong>Wi-Fi:</strong>
            <?= $wifi_status ?>
        </p>
    </div>
    <?php
    if ($admin) {
        echo "<a href='admin-product.php?product_id=$product_id' id='update_product' name='update_product'>Update Product</a>";
    }
}
