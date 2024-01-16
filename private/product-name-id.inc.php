<?php
try {
    include("dbh.inc.php");

    $query = "SELECT product_id, name FROM products;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $productNames = [];
    if ($stmt->rowCount() > 0) {

        $productNames = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data

    }
    $stmt = null; // Close the statement
    return $productNames;

} catch (PDOException $e) {
    die($e->getMessage());
}