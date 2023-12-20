<?php

$dsn = "mysql:host=localhost;dbname=air_conditioners";
$dbusername = "site";
$dbpassword = "vx)ZS62CBdCs!sB]"; //change couz new pass

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}