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
                <form action='private/product-delete.inc.php' method='POST' class="product-create-form">
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
                <form action='private/product-create.inc.php' method='POST' class="product-create-form">
                    <button type="submit" name="create_product">Create New Product</button>
                </form>
            </div>
        </div>

        <button id="delete-product" name="delete_product" style="background-color:red">Delete Product</button>

        <button id="create-product" name="create_product">Create New Product</button>

        <div class="product-info-div">
            <div class="image-container" id="imageDropZone">
                <?php
                // Image
                $productData = include 'private/product-details.inc.php'; // Replace with your actual include path
                if (!empty($productData)) {
                    $img = $productData['image_url'];
                    echo "<img src='$img' type='file' name='image' id='productImage' class='img-responsive'>";
                }
                ?>
            </div>
            <form action='private/product-update.inc.php' method='POST' class="product-info-form">
                <?php
                $productData = include 'private/product-details.inc.php'; // Replace with your actual include path
                if (!empty($productData)) {

                    echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($productData["product_id"]) . "'>";


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

                    if (isset($_GET['update'])) {
                        $updateMessage = htmlspecialchars($_GET['update']);
                        echo "<div style='color: green; text-align: center;'>" . $updateMessage . "</div>";
                    }

                    echo "<button type='submit' id='update_product' name='update_product'>Update Product</button>";

                    // echo "<button onclick='location.href='yourpage.php?newproduct=true''>Create New Product</button>"; 
                    //? it will create a new empty product and get its info, and then fill it 
                
                } else {
                    echo "<p>No product information found.</p>";
                }
                ?>
            </form>
        </div>

    </main>
    <?php include 'footer.php'; ?>
    <script src="admin-product/admin-product.js"></script>
</body>

</html>