<?php
include 'dbh.inc.php';

$sql = "SELECT * FROM products";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$productData = [];
if ($stmt->rowCount() > 0) {

    $productData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data

}
$stmt = null; // Close the statement

return $productData;
