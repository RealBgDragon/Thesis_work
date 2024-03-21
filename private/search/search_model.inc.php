<?php
class Product
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function searchProducts($query)
    {
        $sql = "SELECT * FROM products WHERE name LIKE :query OR model LIKE :query OR brand LIKE :query OR description LIKE :query";
        $stmt = $this->conn->prepare($sql);
        $query = "%$query%";
        $stmt->bindParam(':query', $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductSuggestions($query)
    {
        $sql = "SELECT name FROM products WHERE name LIKE :query LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $query = "%$query%";
        $stmt->bindParam(':query', $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}