<?php
require_once("model-books.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $authorid = $_POST["authorid"];
    addBook($title, $genre, $authorid);
    echo "<script>alert('Book added successfully!'); window.location.href='books.php';</script>";
}
?>
