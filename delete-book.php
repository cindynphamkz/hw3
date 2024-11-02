<?php
require_once("model-books.php");

$bookid = $_GET['id'];
deleteBook($bookid);
echo "<script>alert('Book deleted successfully!'); window.location.href='books.php';</script>";
?>
