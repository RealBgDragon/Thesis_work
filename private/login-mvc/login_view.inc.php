<?php

declare(strict_types=1);

function checkLoginErrors()
{
    if (isset ($_SESSION['errorsLogin'])) {
        $errors = $_SESSION['errorsLogin'];

        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorsLogin']); // important to clean the session
    } elseif (isset ($_GET['login']) && $_GET['login'] == 'success') {
        echo "<div class='success'>Login success!</div>";
    } elseif (isset ($_GET['error'])) {
        echo "<div class='error'>" . $_GET['error'] . "</div>";
    }
}
