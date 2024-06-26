<?php

function renderSearchResults($results)
{
    if (!empty($results)) {
        echo '<main>';
        echo '<div class="search">';
        echo '<h2>Search Results</h2>';
        foreach ($results as $product) {
            echo '<div class="search-results">';

            echo '<a href="product.php?product_id= ' . htmlspecialchars($product['product_id']) . '">';
            echo '<div class="item">';
            echo '<img src="' . $product['image_url'] . '" alt="">';
            echo '<div class="info">';
            echo '<input type="text" class="name" value="' . htmlspecialchars($product['name']) . '" readonly>';
            echo '<input type="text" class="model" value="' . htmlspecialchars($product['model']) . '" readonly>';
            echo '<input type="text" class="brand" value="' . htmlspecialchars($product['brand']) . '" readonly>';
            echo '<input type="text" class="price" value="' . htmlspecialchars($product['price']) . '" readonly>';
            echo '</div>';
            echo '</div>';
            echo '</a>';

            echo '</div>';
        }
        echo '</div>';
        echo '</main>';
    }
}
