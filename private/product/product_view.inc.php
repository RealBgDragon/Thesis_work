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