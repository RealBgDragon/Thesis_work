<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*  try { */
    require_once 'check_out_contr.inc.php';
    require_once 'check_out_view.inc.php';
    require_once 'check_out_model.inc.php';
    require_once '../dbh.inc.php';

    $errors = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $cardNumber = $_POST['card-number'];
    $expiryDate = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];

    $checkOutInfo = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
        'country' => $country,
    ];
    $cardInfo = [
        'cardNumber' => $cardNumber,
        'expiryDate' => $expiryDate,
        'cvv' => $cvv,
    ];

    if (isInputEmpty($checkOutInfo)) {
        $errors['emptyFields'] = 'Please fill all of the fields!';
    }

    if (isEmailInvalid($checkOutInfo['email'])) {
        $errors['ivalidEmail'] = 'Please enter a valid email!';
    }

    if (!isCardNumberValid($cardInfo['cardNumber'])) {
        $errors['invalidCard'] = 'Please enter a valid Card!';
    }
    if (!isExpiryDateValid($cardInfo['expiryDate'])) {
        $errors['invalidCard'] = 'Please enter a valid expiry date!';
    }
    if (!isCvvValid($cardInfo['cvv'])) {
        $errors['invalidCard'] = 'Please enter a valid cvv!';
    }
    require_once '../config_session.inc.php';

    if ($errors) {
        $_SESSION['errorCheckOut'] = $errors;
        header('Location: ../../check-out.php');
        die();
    }

    $productIds = array_keys($_SESSION['cart']);

    $userId = $_SESSION['userId'];
    $orderDate = date('Y-m-d H:i:s');
    $totalPrice = $_SESSION['totalCartPrice'];
    $status = 'pending';

    checkOut($pdo, $userId, $orderDate, $totalPrice, $status, $checkOutInfo, $productIds, $cardInfo);
    header('Location: ../../check-out.php?check-out=success');

    unset($_SESSION['cart']);

    $pdo = null;
    $stmt = null;

    die();
    /*     } catch (Exception $e) {
            $errors['connectionError'] = $e;
            $_SESSION['errorCheckOut'] = $errors;
            header("Location: ../../check-out.php");
            die();
        } */
}