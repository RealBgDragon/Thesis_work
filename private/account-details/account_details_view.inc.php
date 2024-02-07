<?php

function checkAccountErrors()
{
    if (isset($_SESSION['errorsAccount'])) {
        $errors = $_SESSION['errorsAccount'];

        echo '<br>';

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        unset($_SESSION['errorsAccount']); // important to clean the session
    }
}

function outputUserInfo($userData)
{

    echo "<form action='private/account-details/account_details.inc.php' method='POST'>";
    // First Name
    echo "<label for='firstName'>First Name:</label>";
    echo "<input type='text' id='firstName' name='firstName' value='" . htmlspecialchars($userData["firstName"]) . "'>";
    // Last Name
    echo "<label for='lastName'>Last Name:</label>";
    echo "<input type='text' id='lastName' name='lastName' value='" . htmlspecialchars($userData["lastName"]) . "'>";
    // Username
    echo "<label for='username'>Username:</label>";
    echo "<input type='text' id='username' name='username' value='" . htmlspecialchars($userData["username"]) . "'>";
    // Email
    echo "<label for='email'>Email:</label>";
    echo "<input type='text' id='email' name='email' value='" . htmlspecialchars($userData["email"]) . "'>";
    // Date of creation
    echo "<label for='created_at'>Date of creation:</label>";
    echo "<input type='text' id='created_at' name='created_at' value='" . htmlspecialchars($userData["created_at"]) . "' readonly>";
    // Account type
    echo "<label for='account_type'>Account type:</label>";
    echo "<input type='text' id='account_type' name='account_type' value='" . htmlspecialchars($userData["account_type"]) . "' readonly>";

    echo "<label for='newPassword'>New password:</label>";
    echo "<input type='password' id='newPassword' name='newPassword' value=''>";

    echo "<label for='reNewPassword'>Repeat password:</label>";
    echo "<input type='password' id='reNewPassword' name='reNewPassword' value=''>";

    echo "<button id='submit'>Update</button>";

    echo "</form>";
    if (isset($_GET['update']) && $_GET['update'] == 'success')
        echo "<p style='color: green'>Update is successful</p>";
}