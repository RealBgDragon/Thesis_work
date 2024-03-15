<?php
require_once 'private/config_session.inc.php';
require_once 'private/register-mvc/signup_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="register/register.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Register</h1>
        <hr>
        <div class="container">
            <form action="private/register-mvc/signup.inc.php" method="post" class="login">
                <h3>Username</h3>
                <input id="username" name="username" type="text">
                <h3>Email</h3>
                <input id="email" name="email" type="text">
                <h3>Password</h3>
                <input id="password" name="pwd" type="password">
                <div class="modal-body">
                    <ul>
                        <li id="capitalLetter">Contains a capital letter</li>
                        <li id="number">Contains a number</li>
                        <li id="letters">At least 8 letters</li>
                    </ul>
                </div>
                <h3>Repeat password</h3>
                <input id="repassword" type="password">
                <span id="passwordError" class="error-message"></span>
                <h3>First Name</h3>
                <input id="first_name" name="firstName" type="text">
                <h3>Last Name</h3>
                <input id="last_name" name="lastName" type="text">
                <button id="submit">Submit</button>

                <?php
                checkSignupErrors();

                ?>

            </form>
            <div class="register">
                <h2>Already have an account?</h2>
                <a href="login.php">Log in</a>
                <h2>Why should I register?</h2>
                <p>Having an account allows you to more easily check out and purchase our products!</p>
                <p>We can provide you with better support!</p>
                <p>And much more! Come to find out!</p>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script src="register/register.js"></script>
</body>

</html>