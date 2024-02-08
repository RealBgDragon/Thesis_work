<?php

require_once 'product_info_template.php';

function checkProductErrors()
{
    if (isset($_SESSION['errorsProduct'])) {
        $errors = $_SESSION['errorsProduct'];

        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorsProduct']); // important to clean the session
    }
}

function productDisplay($productData)
{
    //! check it
    /* if (!empty($productData)) {
        $img = $productData['image_url'];
        echo "<h1 id='productName'>" . htmlspecialchars($productData['name']) . "</h1>";
    } */
    productTemplate($productData);
}

