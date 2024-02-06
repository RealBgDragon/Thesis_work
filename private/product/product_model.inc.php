<?php

function getProducts(object $pdo, int $product_id)
{
    /* $product_id = isset($_GET['product_id']) ? $product_id = htmlspecialchars($_GET["product_id"]) : "";  */

    $sql = "SELECT * FROM products WHERE product_id = :product_id;";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);

    $stmt->execute();

    $productData = [];
    if ($stmt->rowCount() > 0) {

        $productData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data

    }
    /* $stmt = null; */

    return $productData;

}

function createProduct(object $pdo)
{
    $query = "INSERT INTO products (name, model, brand, price, stock_quantity) VALUES('Place holder', 'Place holder', 'Place holder', '0.0', '0');";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $newProductId = $pdo->lastInsertId();
}

function updateProduct(
    object $pdo,
    int $product_id,
    string $name,
    string $model,
    string $brand,
    float $price,
    int $stock_quantity,
    string $description,
    string $power_efficiency,
    string $power_consumption_heating,
    string $power_consumption_cooling,
    string $power_output_heating,
    string $power_output_cooling,
    float $noise_inside_unit,
    float $noise_outside_unit,
    int $max_temp_heating,
    int $min_temp_heating,
    int $max_temp_cooling,
    int $min_temp_cooling,
    string $size_inside_unit,
    string $size_outside_unit,
    string $recommended_room_size,
    bool $wifi
) {
    $query = "UPDATE products SET 
    name = :name, 
    /* image_url = :image_url */
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
WHERE product_id = :product_id"; // Replace product_id with your actual identifier

    $stmt = $pdo->prepare($query);

    // Bind parameters
/* $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR); */

    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock_quantity', $stock_quantity);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':power_efficiency', $power_efficiency);
    $stmt->bindParam(':power_consumption_heating', $power_consumption_heating);
    $stmt->bindParam(':power_consumption_cooling', $power_consumption_cooling);
    $stmt->bindParam(':power_output_heating', $power_output_heating);
    $stmt->bindParam(':power_output_cooling', $power_output_cooling);
    $stmt->bindParam(':noise_inside_unit', $noise_inside_unit);
    $stmt->bindParam(':noise_outside_unit', $noise_outside_unit);
    $stmt->bindParam(':max_temp_heating', $max_temp_heating);
    $stmt->bindParam(':min_temp_heating', $min_temp_heating);
    $stmt->bindParam(':max_temp_cooling', $max_temp_cooling);
    $stmt->bindParam(':min_temp_cooling', $min_temp_cooling);
    $stmt->bindParam(':size_inside_unit', $size_inside_unit);
    $stmt->bindParam(':size_outside_unit', $size_outside_unit);
    $stmt->bindParam(':recommended_room_size', $recommended_room_size);

    $wifi = $wifi == "True" ? 1 : 0;
    $stmt->bindParam(':wifi', $wifi);




    $stmt->execute();
}

function deleteProduct(object $pdo, int $product_id)
{
    $query = "DELETE FROM products WHERE product_id = :product_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);

    $stmt->execute();
}