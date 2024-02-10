<?php

declare(strict_types=1);

require_once 'private/config_session.inc.php';

function isUserAdmin()
{
    if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == "admin") {
        return true;
    } else {
        return false;
    }
}

function areFieldsEmpty()
{

    $fields = [
        'name',
        'model',
        'brand',
        'price',
        'stock_quantity',
        'power_efficiency',
        'power_consumption_heating',
        'power_consumption_cooling',
        'power_output_heating',
        'power_output_cooling',
        'noise_inside_unit',
        'noise_outside_unit',
        'max_temp_heating',
        'min_temp_heating',
        'max_temp_cooling',
        'min_temp_cooling',
        'size_inside_unit',
        'size_outside_unit',
        'recommended_room_size',
        'wifi',
        'description'
    ];

    foreach ($fields as $field) {
        if (empty($data[$field]))
            return false;

        if (in_array($field, ['price', 'stock_quantity', 'power_efficiency', 'power_consumption_heating', 'power_consumption_cooling', 'power_output_heating', 'power_output_cooling', 'noise_inside_unit', 'noise_outside_unit', 'max_temp_heating', 'min_temp_heating', 'max_temp_cooling', 'min_temp_cooling', 'recommended_room_size'])) {
            if (!is_numeric($data[$field]) || $data[$field] < 0)
                return false;
        }

        if (in_array($field, ['size_inside_unit', 'size_outside_unit'])) {
            if (!preg_match('/^\d+x\d+x\d+$/', $data[$field]))
                return false;
        }

        if ($field === 'wifi') {
            if (!in_array(strtolower($data[$field]), ['true', 'false']))
                return false;
        }
    }

    return true;

}