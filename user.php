<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="user/user.css" />
</head>

<body>
    <header>
        <img src="global-images/logo.png">
        <h1>Account</h1>
        <div class="auth-links">
            <a href="user.php" class="user-link">Account</a>
            <a href="private/logout.php" class="user-link">Logout</a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="main.php">Main</a></li>
            <li><a href="404.html">Products</a></li>
            <li><a href="about-us.php">About Us</a></li>
        </ul>
    </nav>

    <div class="user-info-form">
        <h1>Account</h1>
        <hr>
        <?php
        $userData = include 'private/account_details.inc.php';
        if (!empty($userData)) {
            echo "<form action='dbh.inc.php' method='POST'>";
            echo "<label for='firstName'>First Name:</label>";
            echo "<input type='text' id='firstName' name='firstName' value='" . htmlspecialchars($userData["firstName"]) . "'>";
            echo "<label for='lastName'>Last Name:</label>";
            echo "<input type='text' id='lastName' name='lastName' value='" . htmlspecialchars($userData["lastName"]) . "'>";
            echo "<label for='username'>Username:</label>";
            echo "<input type='text' id='username' name='username' value='" . htmlspecialchars($userData["username"]) . "'>";
            echo "<label for='created_at'>Date of creation:</label>";
            echo "<input type='text' id='created_at' name='created_at' value='" . htmlspecialchars($userData["created_at"]) . "' readonly>";
            echo "</form>";
        } else {
            echo "<p>No user information found or user not logged in.</p>";
        }
        ?>
    </div>

    <footer>
        <div class="footer-links">
            <a href="404.html">Privacy Policy</a>
            <a href="404.html">Terms of Service</a>
        </div>
        <div class="footer-logo">
            <img src="global-images/Producer.jpg" alt="Firm Logo">
            <p>Created by Martin Mihaylov</p>
        </div>
    </footer>

</body>

</html>