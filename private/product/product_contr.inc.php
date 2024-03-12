<?php

declare(strict_types=1);

/* require_once '../private/config_session.inc.php'; */

function isUserAdmin($admin)
{
    if (isset($admin) && $admin == "admin") {
        return true;
    } else {
        return false;
    }
}

function areFieldsEmpty(array $productDetails)
{
    foreach ($productDetails as $key => $value) {
        if (!isset($value) || $value == '') {
            return true;
        }
    }
    return false;
}

function areFieldsNumeric($productDetails, $numericFields)
{
    foreach ($numericFields as $field) {
        if (!isset($productDetails[$field]) || !is_numeric($productDetails[$field]) || $productDetails[$field] < 0) {
            return false;
        }
    }
    return true;
}

function areFieldsInSpecificFormat($productDetails, $formatFields)
{
    $pattern = '/^\d+x\d+x\d+$/';
    foreach ($formatFields as $field) {
        if (!isset($productDetails[$field]) || !preg_match($pattern, $productDetails[$field])) {
            return false;
        }
    }
    return true;
}

function isWifiFieldValid($productDetails)
{
    if (isset($productDetails['wifi'])) {
        $wifiValue = strtolower($productDetails['wifi']);
        return in_array($wifiValue, ['true', 'false'], true);
    }
    return false;
}

function convertWifi(string $wifi)
{
    if ($wifi == "true" || $wifi == "True") {
        $wifi = 1;
    } else {
        $wifi = 0;
    }
    return $wifi;
}

function checkFile(int $fileSize, string $fileType)
{
    if ($fileSize > 5000000 || !in_array($fileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        return true;
    } else {
        return false;
    }
}