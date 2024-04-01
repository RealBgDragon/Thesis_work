<?php
function isInputEmpty($checkOutInfo)
{

    foreach ($checkOutInfo as $field) {
        if (empty($field)) {
            return true;
        } else {
            return false;
        }
    }
}

function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isCardNumberValid($cardNumber)
{
    $cardNumber = preg_replace('/\D/', '', $cardNumber); // Remove any non-numeric characters

    if (empty($cardNumber) || strlen($cardNumber) < 13 || strlen($cardNumber) > 19) {
        return false; // Card number is invalid due to length or being empty
    } else {
        return true;
    }
}

function isExpiryDateValid($expiryDate)
{
    $currentYear = date('y');
    $currentMonth = date('m');

    list($expMonth, $expYear) = explode('/', $expiryDate);

    if ($expYear > $currentYear || ($expYear == $currentYear && $expMonth >= $currentMonth)) {
        return true; // Expiry date is valid
    } else {
        return false; // Expiry date is invalid
    }
}

function isCvvValid($cvv)
{
    return preg_match('/^[0-9]{3,4}$/', $cvv); // Returns true if CVV is 3 or 4 digits long
}
