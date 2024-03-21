<?php

function checkCartErrors()
{
    if (isset ($_SESSION['errorsProduct'])) {
        $errors = $_SESSION['errorsProduct'];

        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorsProduct']); // important to clean the session
    }
}

function cartProduct($product, $qty)
{

    echo "
    <a href='product.php?product_id= " . htmlspecialchars($product['product_id']) . "'>
    <div class='item'>
    
        <img src='" . htmlspecialchars($product['image_url']) . "' alt=''>
        <div class='info'>
            <input type='text' class='name' value='" . htmlspecialchars($product['name']) . "' readonly>
            <input type='text' class='model' value='" . htmlspecialchars($product['model']) . "' readonly>
            <input type='text' class='brand' value='" . htmlspecialchars($product['brand']) . "' readonly>
            <input type='text' class='price' value='" . htmlspecialchars($product['price']) . "' readonly>
            </a>
            <form action='private/remove_from_cart.inc.php' method='POST'>
                <input type='hidden' name='product_id' value='" . $product['product_id'] . "'>
                <input type='number' name='qty' maxlengt='2' min='1' value='" . $qty . "' max='99' requered class='qty'>
                <input type='submit' value='Remove from cart' name='add_to_cart' class='action-button'>
            </form>
        </div>
    </div>
    ";
}

function displayTotalPrice()
{
    $totalPrice = $_SESSION['totalCartPrice'];
    echo "<p class='total_price'>Total price:" . $totalPrice . " € </p>";
}