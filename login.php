<?php
require_once 'private/config_session.inc.php';
require_once 'private/login-mvc/login_view.inc.php';
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
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="login/login.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Login</h1>
        <hr>
        <div class="container">
            <form action="private/login-mvc/login.inc.php" method="post" class="login">
                <h3>Username</h3>
                <input type="text" name="username">
                <h3>Password</h3>
                <input type="password" name="pwd">
                <button id="submit">Submit</button>

                <?php
                checkLoginErrors();
                ?>

            </form>
            <div class="register">
                <h2>Don`t have an account?</h2>
                <a href="register.php">Register</a>
                <h2>Why should I register?</h2>
                <p>Having an account allows you to more easily check out and purchase our products!</p>
                <p>We can provide you with better support!</p>
                <p>And much more! Come to find out!</p>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>