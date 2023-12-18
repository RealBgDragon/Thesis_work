<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="about-us/about-us.css" />
</head>

<body>
    <header>
        <img src="global-images/logo.png">
        <h1>About us</h1>
        <div class="auth-links">
            <?php if (isset($_SESSION['username'])):
                echo "<a href='user.php' class='user-link'>Profile</a>";
                echo "<a href='private/logout.php' class='user-link'>Logout</a>";
            else:
                echo "<a href='login.php' class='user-link'>Login</a>";
                echo "<a href='register.html' class='user-link'>Register</a>";
            endif; ?>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="main.php">Main</a></li>
            <li><a href="404.html">Products</a></li>
            <li><a href="about-us.php">About Us</a></li>
        </ul>
    </nav>
    <main>
        <h1>За нас</h1>

        <hr>
        <p1></p1>
    </main>
    <footer>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
        <div class="footer-logo">
            <img src="global-images/Producer.jpg" alt="Firm Logo">
            <p>Created by Martin Mihaylov</p>
        </div>
    </footer>
</body>

</html>