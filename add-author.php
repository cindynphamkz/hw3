<?php
require_once("model-authors.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    addAuthor($name, $bio);
    echo "<script>alert('Author added successfully!'); window.location.href='authors.php';</script>";
}
?>
