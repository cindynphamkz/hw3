<?php
// db.php
$host = '138.197.17.168'; // Use 'localhost' if applicable
$dbname = 'cindypha_hw3'; // Database name as provided
$username = 'cindypha'; // Replace with your actual username if different
$password = 'Otis649kazuha'; // Replace with your actual password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
