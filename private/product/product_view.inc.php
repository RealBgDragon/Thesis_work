<?php
require_once 'product_info_template.php';
require_once 'product_admin_info_template.php';

function checkProductErrors()
{
    if (isset($_SESSION['errorsProduct'])) {
        $errors = $_SESSION['errorsProduct'];

        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorsProduct']);
    }
}

function productDisplay($productData, $admin)
{
    echo "<h1 id='productName'>" . htmlspecialchars($productData['name']) . "</h1>";
    productTemplate($productData, $admin);
}

function adminProductDisplay($productData, $name_id)
{
    productAdminTemplate($productData, $name_id);
}

// views/product_view.php

function renderProductDetails($product)
{
    ?>
    <div class='product-details'>
        <h1>
            <?= $product['name'] ?>
        </h1>
        <img src='<?= $product['image_url'] ?>' alt='<?= $product['name'] ?>' />
        <p>Model:
            <?= $product['model'] ?>
        </p>
        <p>Brand:
            <?= $product['brand'] ?>
        </p>
        <p>Price:
            <?= $product['price'] ?> lev
        </p>
        <!-- Render other product details -->
    </div>
    <?php
}

function renderProductForm($product = null)
{
    $isUpdate = $product !== null;
    $formAction = $isUpdate ? 'update_product' : 'create_product';
    $submitText = $isUpdate ? 'Update Product' : 'Create Product';
    ?>

    <form method='POST' action='<?= $formAction ?>'>
        <input type='hidden' name='product_id' value='<?= $product ? $product['id'] : '' ?>' />
        <label>Name: <input type='text' name='name' value='<?= $product ? $product['name'] : '' ?>' /></label>
        <label>Model: <input type='text' name='model' value='<?= $product ? $product['model'] : '' ?>' /></label>
        <!-- Render other form fields -->
        <button type='submit'>
            <?= $submitText ?>
        </button>
    </form>

    <?php
}
