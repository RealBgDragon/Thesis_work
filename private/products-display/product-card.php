<?php

function productCard($product)
{
    echo "
    <div class='item'>
        <img src='' alt=''>
        <div class='info'>
            <input type='text' class='name' value='" . htmlspecialchars($product['name']) . "' readonly>
            <input type='text' class='model' value='" . htmlspecialchars($product['model']) . "' readonly>
            <input type='text' class='brand' value='" . htmlspecialchars($product['brand']) . "' readonly>
            <input type='text' class='price' value='" . htmlspecialchars($product['price']) . "' readonly>
        </div>
    </div>";
}

?>