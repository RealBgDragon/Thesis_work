<?
include 'dbh.inc.php';

$query = "INSERT INTO products";
$stmt = $pdo->prepare($sql);

$stmt->execute();