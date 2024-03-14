<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $productId = $_POST['product_id'];
    $qty = $_POST['qty'];

    // Add the item to the cart or perform any other necessary operations
    // ...

    // Redirect back to the same page using the GET method
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>