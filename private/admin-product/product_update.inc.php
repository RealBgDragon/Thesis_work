<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once '../product/product_model.inc.php';
        require_once '../product/product_contr.inc.php';


        $name = htmlspecialchars('name');
        $model = htmlspecialchars('model');
        $brand = htmlspecialchars('brand');
        $price = htmlspecialchars('price');
        $stock_quantity = htmlspecialchars('stock_quantity');
        $power_efficiency = htmlspecialchars('power_efficiency');
        $power_consumption_heating = htmlspecialchars('power_consumption_heating');
        $power_consumption_cooling = htmlspecialchars('power_consumption_cooling');
        $power_output_heating = htmlspecialchars('power_output_heating');
        $power_output_cooling = htmlspecialchars('power_output_cooling');
        $noise_inside_unit = htmlspecialchars('noise_inside_unit');
        $noise_outside_unit = htmlspecialchars('noise_outside_unit');
        $max_temp_heating = htmlspecialchars('max_temp_heating');
        $min_temp_heating = htmlspecialchars('min_temp_heating');
        $max_temp_cooling = htmlspecialchars('max_temp_cooling');
        $min_temp_cooling = htmlspecialchars('min_temp_cooling');
        $size_inside_unit = htmlspecialchars('size_inside_unit');
        $size_outside_unit = htmlspecialchars('size_outside_unit');
        $recommended_room_size = htmlspecialchars('recommended_room_size');
        //! delete only if done
        $wifi = htmlspecialchars('wifi'); //TODO remmember to convert to 1 or 0
        $description = htmlspecialchars('description');



        productUpdate(
            $pdo,
            $product_id,
            $name,
            $model,
            $brand,
            $price,
            $stock_quantity,
            $description,
            $power_efficiency,
            $power_consumption_heating,
            $power_consumption_cooling,
            $power_output_heating,
            $power_output_cooling,
            $noise_inside_unit,
            $noise_outside_unit,
            $max_temp_heating,
            $min_temp_heating,
            $max_temp_cooling,
            $min_temp_cooling,
            $size_inside_unit,
            $size_outside_unit,
            $recommended_room_size,
            $wifi
        );

        $pdo = null;
        $stmt = null;

    } catch (Exception $e) {
        $errors['connectionError'] = 'Connection error! Please try again later!';
        $errors['connectionError'] = $e->getCode();
        $_SESSION['errorsProduct'] = $errors;
        header("Location: ../../admin-product.php?product_id=1");
    }

} else {
    header('Location: ../../admin-product.php?product_id=1');
    die();
}

