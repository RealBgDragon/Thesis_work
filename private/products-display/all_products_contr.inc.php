<?php
function getAllProducts($pdo)
{
    $allProducts = [];
    require_once 'private/product/product_model.inc.php';
    $allProducts = getProductBrands($pdo);
    $pdo = null;
    $stmt = null;
    return $allProducts;
}