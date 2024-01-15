<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "dbh.inc.php";

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try {
        $stmt = $pdo->prepare("SELECT id, username, pwd, account_type FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pwd, $user["pwd"])) {
                // Password is correct, start a new session
                $_SESSION['userId'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['account_type'] = $user['account_type'];

                // Redirect to a new page (e.g., dashboard)
                header("Location: ../login.php");
                exit();
            } else {
                // Password is not correct
                header("Location: ../login.php?error=Ivalid password");
            }
        } else {
            header("Location: ../login.php?error=Ivalid password or username");
        }
    } catch (PDOException $e) {
        header("Location: ../login.php?error=Connection issue, Please try again");
    }

    // Close connection
    $pdo = null;
} else {
    /* header("Location: login.php?error=invalidcredentials"); */
    exit();
}
?>