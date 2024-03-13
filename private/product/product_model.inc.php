<?php

declare(strict_types=1);

function productGet(object $pdo, int $product_id)
{

    $sql = "SELECT * FROM products WHERE product_id = :product_id;";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);

    $stmt->execute();

    $productData = [];

    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    return $productData;

}

function productCreate(object $pdo)
{
    $query = "INSERT INTO products (name, model, brand, price, stock_quantity) VALUES('Place holder', 'Place holder', 'Place holder', '0.0', '0');";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $newProductId = $pdo->lastInsertId();

    return $newProductId;
}

function productUpdate(object $pdo, array $productDetails)
{
    $query = "UPDATE products SET 
    name = :name, 
    image_url = :image_url,
    model = :model, 
    brand = :brand, 
    price = :price, 
    stock_quantity = :stock_quantity, 
    power_efficiency = :power_efficiency, 
    power_consumption_heating = :power_consumption_heating, 
    power_consumption_cooling = :power_consumption_cooling, 
    power_output_heating = :power_output_heating, 
    power_output_cooling = :power_output_cooling, 
    noise_inside_unit = :noise_inside_unit, 
    noise_outside_unit = :noise_outside_unit, 
    max_temp_heating = :max_temp_heating, 
    min_temp_heating = :min_temp_heating, 
    max_temp_cooling = :max_temp_cooling, 
    min_temp_cooling = :min_temp_cooling, 
    size_inside_unit = :size_inside_unit, 
    size_outside_unit = :size_outside_unit, 
    recommended_room_size = :recommended_room_size, 
    wifi = :wifi, 
    description = :description 
    WHERE product_id = :product_id";

    $stmt = $pdo->prepare($query);

    foreach ($productDetails as $key => $value) {
        $stmt->bindParam(':' . $key, $productDetails[$key]);
    }

    $stmt->execute();
}

function productDelete(object $pdo, int $product_id)
{
    $query = "DELETE FROM products WHERE product_id = :product_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);

    $stmt->execute();
}

function allProductsGet(object $pdo)
{
    $query = "SELECT * FROM products";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}

function getProductNamesAndId(object $pdo)
{
    $query = "SELECT product_id, name FROM products;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $name_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $name_id;
}