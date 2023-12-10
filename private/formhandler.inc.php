<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //? Made with POST for security reasons

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    /*     session_start();

        if (isset($_POST['username']) && !empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            $_SESSION['error_message'] = 'Username is required.';
            header('Location: register.html');
            exit;
        }

        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }

        $requiredFields = ['username', 'pwd', 'email', 'firstName', 'lastName'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                die("Error: $field is required.");
            }
        } */


    $id = rand(1, 99999999999); // made for security reasons (not to be auto incremented by one)
    //TODO make to handle if already taken
    $username = htmlspecialchars($_POST["username"]); // prevent SQL ingection
    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT); // hasing the password
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); //TODO add a check in the js
    if (!$email) {
        die('Invalid email.');
    }
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $account_type = "client";

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (id, username, pwd, email, account_type, firstName, lastName) 
        VALUES (:id, :username, :pwd, :email, :account_type, :firstName, :lastName);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":account_type", $account_type);
        $stmt->bindParam(":firstName", $firstName);
        $stmt->bindParam(":lastName", $lastName);

        $stmt->execute();

        $pdo = null; // done for good practice
        $stmt = null;

        header("Location: ../register.html");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../register.html");
}