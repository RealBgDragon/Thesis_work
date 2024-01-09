<?php
include 'dbh.inc.php';

$product_id = isset($_GET['product_id']) ? $product_id = htmlspecialchars($_GET["product_id"]) : ""; //TODO add error handlin to this line

$sql = "SELECT * FROM products WHERE product_id = :product_id;";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);

$stmt->execute();

$productData = [];
if ($stmt->rowCount() > 0) {

    $productData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data

}
$stmt = null; // Close the statement

return $productData;
