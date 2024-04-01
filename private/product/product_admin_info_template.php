<?php
function productAdminTemplate($productData, $name_id)
{
    $img = htmlspecialchars($productData['image_url']);
    ?>

    <form action="private/admin-product/product_update.inc.php" method="POST" class="product-info-form"
        enctype="multipart/form-data">

        <div class="image-container" id="imageDropZone">
            <img id="displayedImage" class="img-responsive" src="<?= $img ?>" alt="Product Image"
                style="max-width: 100%; display: block;">
            <input type="file" id="imageFile" name="imageFile" style="display: none;">
        </div>

        <input type="hidden" name="product_id" id="product_id" value="<?= htmlspecialchars($_GET['product_id']) ?>">
        <input type="hidden" id="image_url" name="image_url" value="<?= htmlspecialchars($productData["image_url"]) ?>">

        <div class="dropdown">
            <label for="productSelect">Select Air Conditioner:</label>
            <select id="productSelect" name="productSelect">
                <?php foreach ($name_id as $product): ?>
                    <option value="<?= $product['product_id'] ?>">
                        <?= $product['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-items">
            <div class="form-half">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($productData["name"]) ?>">

                <label for="model">Model:</label>
                <input type="text" id="model" name="model" value="<?= htmlspecialchars($productData["model"]) ?>">

                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand" value="<?= htmlspecialchars($productData["brand"]) ?>">

                <label for="price">Price (in lev):</label>
                <input type="text" id="price" name="price" value="<?= htmlspecialchars($productData["price"]) ?>">

                <label for="stock_quantity">Stock quantity:</label>
                <input type="text" id="stock_quantity" name="stock_quantity"
                    value="<?= htmlspecialchars($productData["stock_quantity"]) ?>">

                <label for="power_efficiency">Power efficiency (B, A, A+):</label>
                <input type="text" id="power_efficiency" name="power_efficiency"
                    value="<?= htmlspecialchars($productData["power_efficiency"]) ?>">

                <label for="power_consumption_heating">Power Consumption (Heating in W):</label>
                <input type="text" id="power_consumption_heating" name="power_consumption_heating"
                    value="<?= htmlspecialchars($productData["power_consumption_heating"]) ?>">

                <label for="power_consumption_cooling">Power Consumption (Cooling in W):</label>
                <input type="text" id="power_consumption_cooling" name="power_consumption_cooling"
                    value="<?= htmlspecialchars($productData["power_consumption_cooling"]) ?>">

                <label for="power_output_heating">Power Output (Heating in W):</label>
                <input type="text" id="power_output_heating" name="power_output_heating"
                    value="<?= htmlspecialchars($productData["power_output_heating"]) ?>">

                <label for="power_output_cooling">Power Output (Cooling in W):</label>
                <input type="text" id="power_output_cooling" name="power_output_cooling"
                    value="<?= htmlspecialchars($productData["power_output_cooling"]) ?>">
            </div>

            <div class="form-half">
                <label for="noise_inside_unit">Noise inside (in db):</label>
                <input type="text" id="noise_inside_unit" name="noise_inside_unit"
                    value="<?= htmlspecialchars($productData["noise_inside_unit"]) ?>">

                <label for="noise_outside_unit">Noise outside (in db):</label>
                <input type="text" id="noise_outside_unit" name="noise_outside_unit"
                    value="<?= htmlspecialchars($productData["noise_outside_unit"]) ?>">

                <label for="max_temp_heating">Max temp heating (in C):</label>
                <input type="text" id="max_temp_heating" name="max_temp_heating"
                    value="<?= htmlspecialchars($productData["max_temp_heating"]) ?>">

                <label for="min_temp_heating">Min temp heating (in C):</label>
                <input type="text" id="min_temp_heating" name="min_temp_heating"
                    value="<?= htmlspecialchars($productData["min_temp_heating"]) ?>">

                <label for="max_temp_cooling">Max temp cooling (in C):</label>
                <input type="text" id="max_temp_cooling" name="max_temp_cooling"
                    value="<?= htmlspecialchars($productData["max_temp_cooling"]) ?>">

                <label for="min_temp_cooling">Min temp cooling (in C):</label>
                <input type="text" id="min_temp_cooling" name="min_temp_cooling"
                    value="<?= htmlspecialchars($productData["min_temp_cooling"]) ?>">

                <label for="size_inside_unit">Inside size (format HHxWWxDD):</label>
                <input type="text" id="size_inside_unit" name="size_inside_unit"
                    value="<?= htmlspecialchars($productData["size_inside_unit"]) ?>">

                <label for="size_outside_unit">Outside size (format HHxWWxDD):</label>
                <input type="text" id="size_outside_unit" name="size_outside_unit"
                    value="<?= htmlspecialchars($productData["size_outside_unit"]) ?>">

                <label for="recommended_room_size">Max size of room (in cm2):</label>
                <input type="text" id="recommended_room_size" name="recommended_room_size"
                    value="<?= htmlspecialchars($productData["recommended_room_size"]) ?>">

                <label for="wifi">Wi-Fi (true or false, default false):</label>
                <input type="text" id="wifi" name="wifi" value="<?= $productData["wifi"] == 1 ? "True" : "False" ?>">
            </div>
        </div>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?= htmlspecialchars($productData["description"]) ?>">

        <button type="submit" id="update_product" name="update_product">Update Product</button>

    </form>
    <?php
}
