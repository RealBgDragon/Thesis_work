<?php
require_once 'private/config_session.inc.php';
require_once 'private/product/product_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="all-products/all-products.css" />
</head>

<body>
    <?php
    include 'header.php';
    if (isset ($_GET['error']) && $_GET['error'] == 'select') {
        echo "<p class='error'>You haven't selected any products yet!</p>";
    } elseif (isset ($_GET['error']) && $_GET['error'] == 'success') {
        echo "<p class='success'>Successfully added to cart!</p>";
    }
    ?>
    <div class="filter-container">
        <form id="filter-form">
            <label for="price-filter">Price Range:</label>
            <input type="range" id="price-filter" name="price-filter" min="0" max="1000" value="1000"
                oninput="updatePriceRange(this.value)">
            <span id="price-range">0 - 1000</span>

            <label for="brand-filter">Brand:</label>
            <select id="brand-filter" name="brand-filter">
                <option value="">All Brands</option>
                <!-- Add options for available brands dynamically -->
            </select>

            <label for="stock-filter">In Stock:</label>
            <select id="stock-filter" name="stock-filter">
                <option value="">All</option>
                <option value="1">In Stock</option>
                <option value="0">Out of Stock</option>
            </select>

            <label for="power-filter">Power Consumption:</label>
            <input type="range" id="power-filter" name="power-filter" min="0" max="1000" value="1000"
                oninput="updatePowerRange(this.value)">
            <span id="power-range">0 - 1000</span>

            <label for="wifi-filter">Wi-Fi:</label>
            <select id="wifi-filter" name="wifi-filter">
                <option value="">All</option>
                <option value="1">With Wi-Fi</option>
                <option value="0">Without Wi-Fi</option>
            </select>

            <button type="button" onclick="filterProducts()">Filter</button>
        </form>
    </div>
    <main>
        <h1>Products</h1>
        <hr>
        <div class="items-container">
            <?php
            require_once 'private/products-display/all_products.inc.php';
            ?>
        </div>

    </main>
    <?php include 'footer.php'; ?>
    <script src="all-products/all-products.js"></script>
</body>

</html>