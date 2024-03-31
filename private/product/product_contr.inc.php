<?php
require_once 'product_model.inc.php';

function isUserAdmin($admin)
{
    return isset($admin) && $admin == "admin";
}

function areFieldsEmpty(array $productDetails)
{
    foreach ($productDetails as $value) {
        if (!isset($value) || $value == '') {
            return true;
        }
    }
    return false;
}

function areFieldsNumeric(array $productDetails, array $numericFields)
{
    foreach ($numericFields as $field) {
        if (!isset($productDetails[$field]) || !is_numeric($productDetails[$field]) || $productDetails[$field] < 0) {
            return false;
        }
    }
    return true;
}

function areFieldsInSpecificFormat(array $productDetails, array $formatFields)
{
    $pattern = '/^\d+x\d+x\d+$/';
    foreach ($formatFields as $field) {
        if (!isset($productDetails[$field]) || !preg_match($pattern, $productDetails[$field])) {
            return false;
        }
    }
    return true;
}

function isWifiFieldValid(array $productDetails)
{
    if (isset($productDetails['wifi'])) {
        $wifiValue = strtolower($productDetails['wifi']);
        return in_array($wifiValue, ['true', 'false'], true);
    }
    return false;
}

function convertWifi(string $wifi)
{
    return ($wifi == "true" || $wifi == "True") ? 1 : 0;
}

function checkFile(int $fileSize, string $fileType)
{
    return $fileSize > 10000000 || !in_array($fileType, ['jpg', 'png', 'jpeg', 'gif']);
}

function handleProductRequest()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        try {
            $errors = [];

            if (!isset($_GET['product_id'])) {
                $productId = 1;
                $errors['idNotFound'] = 'Product not found!';
            } else {
                $productId = htmlspecialchars($_GET['product_id']);
            }

            $admin = false;

            $productData = productGet($productId);

            if (!$productData) {
                $errors['idNotFound'] = 'Product not found!';
            }

            require_once 'private/config_session.inc.php';

            if ($errors) {
                $_SESSION['errorsProduct'] = $errors;
                header('Location: product.php?product_id=1');
                exit;
            }

            if (isset($_SESSION['account_type']) && isUserAdmin($_SESSION['account_type'])) {
                $admin = true;
            }

            return ['productData' => $productData, 'admin' => $admin];
        } catch (Exception $e) {
            $errors['connectionError'] = 'Connection error! Please try again later!';
            $errors['connectionError'] = $e->getCode();
            $_SESSION['errorsProduct'] = $errors;
            header("Location: product.php?product_id=1");
            exit;
        }
    } else {
        header('Location: product.php?product_id=1');
        exit;
    }
}