<?php
function getAllProducts()
{
    $allProducts = [];
    require_once 'private/product/product_model.inc.php';
    require_once 'private/dbh.inc.php';
    $allProducts = getProductBrands($pdo);
    $pdo = null;
    $stmt = null;
    return $allProducts;
}