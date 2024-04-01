<?php
require_once 'private/config_session.inc.php';
require_once 'private/check-out/check_out_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="check-out/check-out.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Checkout</h1>
        <hr>
        <?php
        if (!isset($_SESSION['userId'])) {
            header('Location: login.php?error=Please create an account for checkout!');
            die();
        }
        ?>

        <h2>Shipping Information</h2>
        <form action="private/check-out/check_out.inc.php" method="POST">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="state">State/Province:</label>
                <input type="text" id="state" name="state" required>

                <label for="zip">Zip/Postal Code:</label>
                <input type="text" id="zip" name="zip" required>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" required>
            </div>

            <h2>Payment Information</h2>
            <div>
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" name="card-number" required>

                <label for="expiry-date">Expiry Date:</label>
                <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>

                <button type="submit">Place Order</button>
            </div>
        </form>
        <?php
        checkCheckOutErrors();
        ?>
    </main>
    <?php include 'footer.php'; ?>
    <script src="cart/cart.js"></script>
</body>

</html>