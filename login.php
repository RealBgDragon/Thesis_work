<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="login/login.css" />
</head>

<body>
    <header>
        <img src="global-images/logo.png">
        <h1>Login</h1>
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
        <h2>Login</h2>
        <hr>
        <div class="container">
            <form action="private/login.inc.php" method="post" class="login">
                <h2>Login</h2>
                <h3>Username</h3>
                <input type="text" name="username">
                <h3>Password</h3>
                <input type="password" name="pwd">
                <button id="submit">Submit</button>
                <?php
                if (isset($_GET['error'])) {
                    $errorMessage = htmlspecialchars($_GET['error']);
                    echo "<div style='color: red;'>" . $errorMessage . "</div>";
                }
                ?>
            </form>
            <div class="register">
                <h2>Don`t have an account?</h2>
                <a href="register.html">Register</a>
                <h2>Why should I register?</h2>
                <p>Having an account allows you to more easily check out and pucrchus our products</p>
                <p>Allows you to have better support</p>
                <p>And much more! Come to find out!</p>
            </div>
        </div>
    </main>
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