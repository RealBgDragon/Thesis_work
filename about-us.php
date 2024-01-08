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
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="about-us/about-us.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>За нас</h1>

        <hr>
        <p1></p1>
        <?php
        if (isset($_SESSION['account_type']) && $_SESSION['account_type'] = 'admin') {
            echo "<button>Update</button>"; //! have to add the about us to the db or scrap the idea!
        }
        ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>