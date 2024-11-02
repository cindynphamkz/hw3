<?php
// db.php
$host = '138.197.17.168'; // Replace with 'localhost' if it's hosted locally
$dbname = 'cindypha_hw3'; // Database name as provided
$username = 'cindypha'; // Your username
$password = 'YES'; // Replace with your actual password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
