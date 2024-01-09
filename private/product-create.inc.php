<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        include 'dbh.inc.php';

        $query = "INSERT INTO products (name, model, brand, price, stock_quantity) VALUES('Place holder', 'Place holder', 'Place holder', '0.0', '0');";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $newProductId = $pdo->lastInsertId();

        $pdo = null;
        $stmt = null;
        header('Location: ../admin-product.php?update=successfuly created new product&product_id=' . $newProductId);
    } catch (PDOException $e) {
        header("Location: ../admin-product.php?update=error with the creation of the new product" . $stmt->errorInfo()[2] . "&product_id=$newProductId");
        die("Error updating record: " . $e->getMessage());
    }


    exit();
} else {
    die("Plase use post");
}