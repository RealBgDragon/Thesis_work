<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once '../product/product_model.inc.php';
        require_once '../product/product_contr.inc.php';

        $errors = [];

        $product_id = $_POST['product_id'];
        $name = htmlspecialchars($_POST['name']);
        $model = htmlspecialchars($_POST['model']);
        $brand = htmlspecialchars($_POST['brand']);
        $price = htmlspecialchars($_POST['price']);
        $stock_quantity = htmlspecialchars($_POST['stock_quantity']);
        $power_efficiency = htmlspecialchars($_POST['power_efficiency']);
        $power_consumption_heating = htmlspecialchars($_POST['power_consumption_heating']);
        $power_consumption_cooling = htmlspecialchars($_POST['power_consumption_cooling']);
        $power_output_heating = htmlspecialchars($_POST['power_output_heating']);
        $power_output_cooling = htmlspecialchars($_POST['power_output_cooling']);
        $noise_inside_unit = htmlspecialchars($_POST['noise_inside_unit']);
        $noise_outside_unit = htmlspecialchars($_POST['noise_outside_unit']);
        $max_temp_heating = htmlspecialchars($_POST['max_temp_heating']);
        $min_temp_heating = htmlspecialchars($_POST['min_temp_heating']);
        $max_temp_cooling = htmlspecialchars($_POST['max_temp_cooling']);
        $min_temp_cooling = htmlspecialchars($_POST['min_temp_cooling']);
        $size_inside_unit = htmlspecialchars($_POST['size_inside_unit']);
        $size_outside_unit = htmlspecialchars($_POST['size_outside_unit']);
        $recommended_room_size = htmlspecialchars($_POST['recommended_room_size']);
        $wifi = htmlspecialchars($_POST['wifi']);
        $description = htmlspecialchars($_POST['description']);

        $wifi = convertWifi($wifi);

        $fileSize = $_FILES["imageFile"]["size"];

        $fileName = $_FILES["imageFile"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (checkFile($fileSize, $fileExtension)) {
            $errors['imageError'] = 'File size or type not supported';
            $newImagePath = 'error';
        } else {
            $uploadDirectory = "../../../website_images/";
            $fileName = uniqid() . "-" . basename($_FILES['imageFile']['name']);
            $uploadPath = $uploadDirectory . $fileName;

            move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadPath);
            $newImagePath = "../../../website_images/" . $fileName;
        }


        $productDetails = [
            'name' => $name,
            'image_url' => $newImagePath,
            'model' => $model,
            'brand' => $brand,
            'price' => $price,
            'stock_quantity' => $stock_quantity,
            'power_efficiency' => $power_efficiency,
            'power_consumption_heating' => $power_consumption_heating,
            'power_consumption_cooling' => $power_consumption_cooling,
            'power_output_heating' => $power_output_heating,
            'power_output_cooling' => $power_output_cooling,
            'noise_inside_unit' => $noise_inside_unit,
            'noise_outside_unit' => $noise_outside_unit,
            'max_temp_heating' => $max_temp_heating,
            'min_temp_heating' => $min_temp_heating,
            'max_temp_cooling' => $max_temp_cooling,
            'min_temp_cooling' => $min_temp_cooling,
            'size_inside_unit' => $size_inside_unit,
            'size_outside_unit' => $size_outside_unit,
            'recommended_room_size' => $recommended_room_size,
            'wifi' => $wifi, // Make sure to convert this properly if it's expected to be a boolean in your database
            'description' => $description,
            'product_id' => $product_id

        ];

        $numericFields = [
            'price' => $price,
            'stock_quantity' => $stock_quantity,
            'power_consumption_heating' => $power_consumption_heating,
            'power_consumption_cooling' => $power_consumption_cooling,
            'power_output_heating' => $power_output_heating,
            'power_output_cooling' => $power_output_cooling,
            'noise_inside_unit' => $noise_inside_unit,
            'noise_outside_unit' => $noise_outside_unit,
            'max_temp_heating' => $max_temp_heating,
            'min_temp_heating' => $min_temp_heating,
            'max_temp_cooling' => $max_temp_cooling,
            'min_temp_cooling' => $min_temp_cooling
        ];

        $formatFields = [
            'size_inside_unit' => $size_inside_unit,
            'size_outside_unit' => $size_outside_unit,
        ];

        if (areFieldsEmpty($productDetails)) {
            $errors['emptyFields'] = 'You left a field empty';
        }

        if (areFieldsNumeric($productDetails, $numericFields)) {
            $errors['wrongData'] = 'Check all of the numeric fields';
        }

        if (areFieldsInSpecificFormat($productDetails, $formatFields)) {
            $errors['wrongData'] = 'Check spesific format requerments';
        }

        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION['errorsProduct'] = $errors;
            header('Location: ../../admin-product.php?product_id=' . $product_id);
            die();
        }

        productUpdate($pdo, $productDetails);

        header('Location: ../../admin-product.php?product_id=' . $product_id . '&update=success');


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

