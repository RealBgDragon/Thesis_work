<?php

function checkCheckOutErrors()
{
    if (isset($_SESSION['errorCheckOut'])) {
        $errors = $_SESSION['errorCheckOut'];


        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorCheckOut']);
    } else if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
        echo "<p style='color: green;'>Signup success!</p>";
    }
}