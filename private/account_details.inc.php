<?php
session_start();
include 'dbh.inc.php'; // Include your database connection

$userData = [];

if (isset($_SESSION['userId'])) {
    $user_id = $_SESSION['userId'];

    $sql = "SELECT username ,firstName, lastName, created_at FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $userData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data
    }
    $stmt = null; // Close the statement
} else {
    echo "User not logged in.";
    return []; // Return an empty array if not logged in
}

return $userData;