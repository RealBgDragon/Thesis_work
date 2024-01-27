<?php

declare(strict_types=1);

function checkLoginErrors()
{
    if (isset($_SESSION['errorLogin'])) {
        $errors = $_SESSION['errorLogin'];

        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorLogin']); //! important to clean the session
    } else if (isset($_GET['login']) && $_GET['login'] == 'success') {
        echo "<p style='color: green;'>Login success!</p>";
    }
}