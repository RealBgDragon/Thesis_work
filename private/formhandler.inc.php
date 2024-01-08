<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //? Made with POST for security reasons

    session_start();

    $requiredFields = ['username', 'pwd', 'email', 'firstName', 'lastName'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            header("Location: ../register.php?error= $field is requered");
            die();
        }
    }

    //TODO make to handle if already taken
    $username = htmlspecialchars($_POST["username"]); // prevent SQL ingection
    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT); // hasing the password
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); //TODO add a check in the js
    if (!$email) {
        header("Location: ../register.php?error=Invalid email");
        die();
    }
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $account_type = "client";

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pwd, email, account_type, firstName, lastName) 
        VALUES (:username, :pwd, :email, :account_type, :firstName, :lastName);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":account_type", $account_type);
        $stmt->bindParam(":firstName", $firstName);
        $stmt->bindParam(":lastName", $lastName);

        $stmt->execute();

        $pdo = null; // done for good practice
        $stmt = null;

        header("Location: ../register.php?success=Account successfully created");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../register.php?error='There was an error'");
}