<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        include 'dbh.inc.php';

        $id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : null;
        if (!$id) {
            die("Invalid product ID, please contact IT support");
        }

        $query = "DELETE FROM products WHERE product_id = :product_id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':product_id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header('Location: ../admin-product.php?update=deleted successfully&product_id=1');
    } catch (PDOException $e) {
        header("Location: ../admin-product.php?update=error with the creation of the new product&product_id=1");
        die("Error updating record: " . $e->getMessage());
    }
    exit();
} else {
    die("Plase use post");
}