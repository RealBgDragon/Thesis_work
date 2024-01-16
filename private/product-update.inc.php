<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbh.inc.php'; // Replace with your actual database connection file

    // Sanitize and validate input
    $image_url = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $stock_quantity = filter_input(INPUT_POST, 'stock_quantity', FILTER_SANITIZE_NUMBER_INT);
    $power_efficiency = filter_input(INPUT_POST, 'power_efficiency', FILTER_SANITIZE_STRING);
    $power_consumption_heating = filter_input(INPUT_POST, 'power_consumption_heating', FILTER_SANITIZE_STRING);
    $power_consumption_cooling = filter_input(INPUT_POST, 'power_consumption_cooling', FILTER_SANITIZE_STRING);
    $power_output_heating = filter_input(INPUT_POST, 'power_output_heating', FILTER_SANITIZE_STRING);
    $power_output_cooling = filter_input(INPUT_POST, 'power_output_cooling', FILTER_SANITIZE_STRING);
    $noise_inside_unit = filter_input(INPUT_POST, 'noise_inside_unit', FILTER_SANITIZE_STRING);
    $noise_outside_unit = filter_input(INPUT_POST, 'noise_outside_unit', FILTER_SANITIZE_STRING);
    $max_temp_heating = filter_input(INPUT_POST, 'max_temp_heating', FILTER_SANITIZE_NUMBER_INT);
    $min_temp_heating = filter_input(INPUT_POST, 'min_temp_heating', FILTER_SANITIZE_NUMBER_INT);
    $max_temp_cooling = filter_input(INPUT_POST, 'max_temp_cooling', FILTER_SANITIZE_NUMBER_INT);
    $min_temp_cooling = filter_input(INPUT_POST, 'min_temp_cooling', FILTER_SANITIZE_NUMBER_INT);
    $size_inside_unit = filter_input(INPUT_POST, 'size_inside_unit', FILTER_SANITIZE_STRING);
    $size_outside_unit = filter_input(INPUT_POST, 'size_outside_unit', FILTER_SANITIZE_STRING);
    $recommended_room_size = filter_input(INPUT_POST, 'recommended_room_size', FILTER_SANITIZE_NUMBER_INT);
    $wifi = filter_input(INPUT_POST, 'wifi', FILTER_SANITIZE_STRING); // Assuming 'wifi' is a text field indicating 'true' or 'false'
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // Prepare SQL statement
    $query = "UPDATE products SET 
                name = :name, 
                image_url = :image_url
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
    $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':model', $model, PDO::PARAM_STR);
    $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock_quantity', $stock_quantity, PDO::PARAM_INT);
    $stmt->bindParam(':power_efficiency', $power_efficiency, PDO::PARAM_STR);
    $stmt->bindParam(':power_consumption_heating', $power_consumption_heating, PDO::PARAM_STR);
    $stmt->bindParam(':power_consumption_cooling', $power_consumption_cooling, PDO::PARAM_STR);
    $stmt->bindParam(':power_output_heating', $power_output_heating, PDO::PARAM_STR);
    $stmt->bindParam(':power_output_cooling', $power_output_cooling, PDO::PARAM_STR);
    $stmt->bindParam(':noise_inside_unit', $noise_inside_unit, PDO::PARAM_STR);
    $stmt->bindParam(':noise_outside_unit', $noise_outside_unit, PDO::PARAM_STR);
    $stmt->bindParam(':max_temp_heating', $max_temp_heating, PDO::PARAM_INT);
    $stmt->bindParam(':min_temp_heating', $min_temp_heating, PDO::PARAM_INT);
    $stmt->bindParam(':max_temp_cooling', $max_temp_cooling, PDO::PARAM_INT);
    $stmt->bindParam(':min_temp_cooling', $min_temp_cooling, PDO::PARAM_INT);
    $stmt->bindParam(':size_inside_unit', $size_inside_unit, PDO::PARAM_STR);
    $stmt->bindParam(':size_outside_unit', $size_outside_unit, PDO::PARAM_STR);
    $stmt->bindParam(':recommended_room_size', $recommended_room_size, PDO::PARAM_INT);

    $wifi = $wifi == "True" ? 1 : 0;

    $stmt->bindParam(':wifi', $wifi, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    // Assuming you have a hidden input field in your form for product_id
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../admin-product.php?update=successful&product_id=$product_id");
    } else {
        header("Location: ../admin-product.php?update=error" . $stmt->errorInfo()[2] . "&product_id=$product_id");
        echo "Error updating record: " . $stmt->errorInfo()[2];
    }

    $stmt = null; // Close the statement
}
?>